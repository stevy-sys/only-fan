<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\Config;
use App\Models\CouvertureHome;
use App\Models\Live;
use App\Models\Product;
use App\Models\ReseauSocio;
use App\Models\Storie;
use App\Models\Subscription;
use App\Models\Texte;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $countImage = Media::where('type','image')->get()->count();
        $countVideo = Media::where('type','video')->get()->count();
        $productSlide = Product::take(3)->get();
        $subscriptions = Subscription::all();
        $config = Config::first();
        $text = Texte::first();
        $couverturesHome = CouvertureHome::where('active',true)->get();
        $liveDispo = Live::where('status',1)->first();
        $stories = Storie::with(['media','collectionStorie.mediable'])->get();
        $reseauSocios = ReseauSocio::orderBy('order','asc')->get();
        view()->share('countImage', $countImage);
        view()->share('productSlide', $productSlide);
        view()->share('reseauSocios', $reseauSocios);
        view()->share('countVideo', $countVideo);
        view()->share('subscriptions', $subscriptions);
        view()->share('config', $config);
        view()->share('text', $text);
        view()->share('couverturesHome', $couverturesHome);
        view()->share('liveDispo', $liveDispo);
        view()->share('stories', $stories);
    }
}
