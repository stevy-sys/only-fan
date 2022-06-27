<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\Config;
use App\Models\Subscription;
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
        $subscriptions = Subscription::all();
        $config = Config::first();

        view()->share('countImage', $countImage);
        view()->share('countVideo', $countVideo);
        view()->share('subscriptions', $subscriptions);
        view()->share('config', $config);
    }
}
