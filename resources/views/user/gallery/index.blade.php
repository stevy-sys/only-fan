@extends('layouts.layout')

@section('style')
<link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />
<link
    rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen"
/>
    <style>
    /*gallery*/
    #demo {
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .green {
        background-color: #6fb936;
    }
    .thumb {
        margin-bottom: 30px;
    }

    .page-top {
        margin-top: 85px;
    }

    img.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
    }

    .transition {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }
    .modal-header {
        border-bottom: none;
    }
    .modal-title {
        color: #000;
    }
    .modal-footer {
        display: none;
    }
    </style>
@endsection
@section('body')
<div class="container page-top">
    <div class="row">
        @foreach ($medias as $media)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                @if ($media->type == 'image')
                <a
                    href="{{ route('media.show',['media' => $media->id]) }}"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="{{ asset('storage/media').'/'.$media->name}}"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            @else
                <div class="">
                    <video onclick="playVideo()" 
                        src="{{ asset('storage/media').'/'.$media->name}}" 
                        id="my-video" 
                        class=""
                        width="250" 
                        height="264">
                       
                    </video>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function () {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none",
        });

        $(".zoom").hover(
            function () {
                $(this).addClass("transition");
            },
            function () {
                $(this).removeClass("transition");
            }
        );
    });
    function playVideo() {
        const video = document.getElementById('my-video');
        video.currentTime = 5;
        video.play();
    }
    
    var video = document.getElementById('my-video');
    const start = 3;
    const end = 7;
    let isPlaying = false;

    video.addEventListener('timeupdate', () => {
    if (video.currentTime >= end && isPlaying) {
        video.pause();
        isPlaying = false;
    } else if (video.currentTime < start && isPlaying) {
        video.currentTime = start;
    }
    });

    // Lance la lecture de la vidéo
    // video.play();

    // Permet de relancer la vidéo une fois qu'elle a été bloquée
    video.addEventListener('click', () => {
        if (!isPlaying) {
            video.currentTime = start;
            video.play();
            isPlaying = true;
        }
    });
    


</script>
@endsection