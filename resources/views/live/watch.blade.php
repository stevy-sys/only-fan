<html>
<head>
    {{-- <input id="{{ $request->input('username') }}" type="text"> --}}
    <title>Video Livestream</title>
</head>
<body>
    <div id="video-container"></div>

    <script src="https://unpkg.com/peerjs@1.4.7/dist/peerjs.min.js"></script>
    <script>
        const peer = new Peer();
    
        peer.on('open', function(userId) {
            // Display user ID
            console.log('User ID: ' + userId);
        });
    
        peer.on('call', function(call) {
            // Answer call and display video
            navigator.mediaDevices.getUserMedia({video: true, audio: true})
                .then(function(stream) {
                    call.answer(stream);
                    const video = document.createElement('video');
                    video.srcObject = stream;
                    video.play();
                    document.querySelector('#video-container').appendChild(video);
                });
        });
    
        const username = '{{ $request->username }}';
        console.log(username)
        const call = peer.call(username, null);
        navigator.mediaDevices.getUserMedia({video: true, audio: true})
            .then(function(stream) {
                const video = document.createElement('video');
                video.srcObject = stream;
                video.play();
                document.querySelector('#video-container').appendChild(video);
                call.on('stream', function(remoteStream) {
                    console.log('stream')
                    const remoteVideo = document.createElement('video');
                    remoteVideo.srcObject = remoteStream;
                    remoteVideo.play();
                    document.querySelector('#video-container').appendChild(remoteVideo);
                });
            });
    </script>
</body>
</html>
