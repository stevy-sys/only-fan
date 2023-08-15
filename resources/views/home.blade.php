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
                                {{__('messages.Tableau_de_bord')}}
                            </h3>
                            <p class="subtitle-a ">
                                {{__('messages.Bienvenue')}} <b>{{ auth()->guard('web')->user()->name }}</b>
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
                                <h2 class="s-title">{{__('messages.Chat')}}</h2>
                                <p class="s-description text-center">
                                    {{__("messages.Discuter_a_l'infinie_dans_le_plateforme")}}
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
                                <h2 class="s-title">{{__('messages.gallery')}}</h2>
                                <p class="s-description text-center">
                                    {{__('messages.Voir_tout_les_gallery_vos_photos_et_video_en_exclusivite')}}
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
                                    <h2 class="s-title">{{__('messages.Live')}}</h2>
                                    <p class="s-description text-center">
                                        {{__('messages.Regarder_des_video_en_streaming_a_tout_moment')}}
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
                                <h2 class="s-title">{{__('messages.Profile')}}</h2>
                                <p class="s-description text-center">
                                   {{__('messages.Modifier_votre_profile')}}
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
                                <h2 class="s-title">{{__('messages.Abonnement')}}</h2>
                                <p class="s-description text-center">
                                    {{__('messages.Abonnee_vous_en_regardant_des_photo_et_video_et_voir_des_lives')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
