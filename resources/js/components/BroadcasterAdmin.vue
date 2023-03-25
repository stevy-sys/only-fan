<template>
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <button class="btn btn-success" @click="startStream">Start Stream</button><br />
          <p v-if="isVisibleLink" class="my-5">
            Share the following streaming link: {{ streamLink }}
          </p>
          <video autoplay ref="broadcaster"></video>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import Peer from "simple-peer";
  import { getPermissions } from "../helpers";
  export default {
    name: "Broadcaster",
    props: [
      "auth_user_id",
      "env",
      "turn_url",
      "turn_username",
      "turn_credential",
      "url"
    ],
    data() {
      return {
        isVisibleLink: false,
        streamingPresenceChannel: null,
        streamingUsers: [],
        currentlyContactedUser: null,
        allPeers: [], // this will hold all dynamically created peers using the 'ID' of users who just joined as keys
      };
    },
  
    computed: {
      streamId() {
        // you can improve streamId generation code. As long as we include the
        // broadcaster's user id, we are assured of getting unique streamiing link everytime.
        // the current code just generates a fixed streaming link for a particular user.
        return `${this.auth_user_id + this.url}`;
      },
  
      streamLink() {
        // just a quick fix. can be improved by setting the app_url
        if (this.env === "production") {
          return `https://ww.rubycorp.fr/en/streaming/${this.streamId}`;
        } else {
          return `http://127.0.0.1:8000/en/streaming/${this.streamId}`;
        }
      },
    },
  
    methods: {
      async startStream() {
        axios
          .get("/admin/start-stream")
          .then((res) => {
            console.log('utilisateur sont pret');
          })
          .catch((err) => {
            console.log(err);
          });
        // const stream = await navigator.mediaDevices.getUserMedia({
        //   video: true,
        //   audio: true,
        // });
        // microphone and camera permissions
        const stream = await getPermissions();
        this.$refs.broadcaster.srcObject = stream;
          console.log('strem',stream)
        this.initializeStreamingChannel();
        this.initializeSignalAnswerChannel(); // a private channel where the broadcaster listens to incoming signalling answer
        this.isVisibleLink = true;
      },
  
      peerCreator(stream, user, signalCallback) {
        let peer;
        return {
          create: () => {
            peer = new Peer({
              initiator: true,
              trickle: false,
              stream: stream,
              config: {
                iceServers: [
                  { urls: ["stun:bn-turn1.xirsys.com"] },
                  {
                    username: "LpTQzzNnOhyCNV2c-XzFWdQLfX9rjGUb_8A9FR82F59dG-y2bjDkk8hIxh5aEboqAAAAAGHaoB1rYXZpbg==",
                    credential: "2c2be25c-7128-11ec-b2b6-0242ac140004",
                    urls: [
                      "turn:bn-turn1.xirsys.com:80?transport=udp",
                      "turn:bn-turn1.xirsys.com:3478?transport=udp",
                      "turn:bn-turn1.xirsys.com:80?transport=tcp",
                      "turn:bn-turn1.xirsys.com:3478?transport=tcp",
                      "turns:bn-turn1.xirsys.com:443?transport=tcp",
                      "turns:bn-turn1.xirsys.com:5349?transport=tcp",
                    ],
                  },
                ],
              },
            });
          },
  
          getPeer: () => peer,
  
          initEvents: () => {
            peer.on("signal", (data) => {
              console.log('send offer')
              // send offer over here.
              signalCallback(data, user);
            });
  
            peer.on("stream", (stream) => {
              console.log("onStream");
            });
  
            peer.on("track", (track, stream) => {
              console.log("onTrack");
            });
  
            peer.on("connect", () => {
              console.log("Broadcaster Peer connected");
            });
  
            peer.on("close", () => {
              console.log("Broadcaster Peer closed");
            });
  
            peer.on("error", (err) => {
              console.log("handle error gracefully",err);
            });
          },
        };
      },
  
      initializeStreamingChannel() {
        console.log('initialisation channel')
        this.streamingPresenceChannel = window.Echo.join(
          `streaming-channel.${this.streamId}`
        );
  
        this.streamingPresenceChannel.here((user) => {
          console.log('userrrr',user)
          this.streamingUsers = user;
        });
  
        this.streamingPresenceChannel.joining((user) => {
          console.log("New User joined", user);
          // if this new user is not already on the call, send your stream offer
          const joiningUserIndex = this.streamingUsers.findIndex(
            (data) => data.id === user.id
          );
          if (joiningUserIndex < 0) {
            this.streamingUsers.push(user);
  
            // A new user just joined the channel so signal that user
            this.currentlyContactedUser = user.id;
            console.log(this.$set)
            this.$set(
              this.allPeers,
              `${user.id}`,
              this.peerCreator(
                this.$refs.broadcaster.srcObject,
                user,
                this.signalCallback
              )
            );
            console.log('fin $set')
  
            // Create Peer
            this.allPeers[user.id].create();
  
            // Initialize Events
            this.allPeers[user.id].initEvents();
            console.log('allPeers',this.allPeers)
  
          }
        });
  
        this.streamingPresenceChannel.leaving((user) => {
          console.log(user.name, "Left");
          console.log( this.allPeers[user.id], "all peers");
          // destroy peer
          this.allPeers[user.id].getPeer().destroy();
  
          // delete peer object
          delete this.allPeers[user.id];
  
          // if one leaving is the broadcaster set streamingUsers to empty array
          if (user.id === this.auth_user_id) {
            this.streamingUsers = [];
          } else {
            // remove from streamingUsers array
            const leavingUserIndex = this.streamingUsers.findIndex(
              (data) => data.id === user.id
            );
            this.streamingUsers.splice(leavingUserIndex, 1);
          }
        });
      },
  
      initializeSignalAnswerChannel() {
        
        window.Echo.private(`stream-signal-channel.${this.auth_user_id}`).listen(
          "StreamAnswer",
          ({ data }) => {
            console.log("Signal Answer from private channel");
  
            if (data.answer.renegotiate) {
              console.log("renegotating");
            }
  
            if (data.answer.sdp) {
              const updatedSignal = {
                ...data.answer,
                sdp: `${data.answer.sdp}\n`,
              };
  
              this.allPeers[this.currentlyContactedUser]
                .getPeer()
                .signal(updatedSignal);
            }
          }
        );
      },
  
      signalCallback(offer, user) {
        axios
          .post("/stream-offer", {
            broadcaster: this.auth_user_id,
            receiver: user,
            offer,
          })
          .then((res) => {
            console.log(res);
          })
          .catch((err) => {
            console.log(err);
          });
      },
    },
    mounted() {
      console.log(this.url)
      console.log("envvv",this.env)
    },
  };
  </script>
  
  <style scoped></style>