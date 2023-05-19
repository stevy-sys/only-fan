@extends('layouts.layout_front')


@section('style')
@endsection
@section('content')
    <div class="col-lg-12 dashboard">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services-mf pt-5 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Tableau de bord
                            </h3>
                            <p class="subtitle-a ">
                                Bienvenue <b>{{ auth()->guard('web')->user()->name }}</b>
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="service-box">
                            <div class="service-ico">
                                <a href="{{ route('chat.index', ['locale' => session('locale')]) }}">
                                    <span class="ico-circle"><i class="bi bi-chat-left-dots"></i></span>
                                </a>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Chat</h2>
                                <p class="s-description text-center">
                                    Discuter a l'infinie dans le plateforme
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-box">
                            <div class="service-ico">
                                <a href="{{ route('gallery.index', ['locale' => session('locale')]) }}">
                                    <span class="ico-circle"><i class="bi bi-images"></i></span>
                                </a>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">gallery</h2>
                                <p class="s-description text-center">
                                    Voir tout les gallery vos photos et video en exclusivite
                                </p>
                            </div>
                        </div>
                    </div>
                    @if ($config->active_live == true)
                        <div class="col-lg-4">
                            <div class="service-box">
                                <div class="service-ico">
                                    <a
                                        href="{{ route('live.consumer', ['locale' => session('locale'), 'streamId' => '212acde2']) }}">
                                        <span class="ico-circle"><i class="bi bi-camera-reels-fill"></i></span>
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h2 class="s-title">Live</h2>
                                    <p class="s-description text-center">
                                        Regarder des video en streaming a tout moment
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-4">
                        <div class="service-box">
                            <div class="service-ico">
                                <a
                                    href="{{ route('profile.index', ['locale' => session('locale')]) }}">
                                    <span class="ico-circle"><i class="bi bi-camera-reels-fill"></i></span>
                                </a>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Profile</h2>
                                <p class="s-description text-center">
                                   Modifier votre profile
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="service-box">
                            <div class="service-ico">
                                <a href="{{ route('subscribe.index', ['locale' => session('locale')]) }}">
                                    <span class="ico-circle"><i class="bi bi-credit-card"></i></span>
                                </a>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Abonee</h2>
                                <p class="s-description text-center">
                                    Abonnee vous en regardant des photo et video et voir des lives
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
