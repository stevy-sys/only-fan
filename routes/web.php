<?php

use Illuminate\Http\Request;
use App\Http\Middleware\SetLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\LivestreamController;
use App\Http\Controllers\Admin\MediaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GallerieController;
use App\Http\Controllers\Admin\UserController;

Route::get('/test','App\Http\Controllers\IndexController@index');
Route::get('/testBoutique','App\Http\Controllers\IndexController@testBoutique');


// WebRTC Group Call Endpoints
// Initiate Stream, Get a shareable broadcast link
Route::get('/admin/streaming', 'App\Http\Controllers\WebrtcStreamingController@index')->name('admin.live.streaming');
Route::get('/admin/start-stream', 'App\Http\Controllers\WebrtcStreamingController@startStream')->name('admin.live.start.streaming');
Route::post('/stream-offer', 'App\Http\Controllers\WebrtcStreamingController@makeStreamOffer');
Route::post('/stream-answer', 'App\Http\Controllers\WebrtcStreamingController@makeStreamAnswer');




// Route::any('/live/customer', [LivestreamController::class, 'customer'])->name('livestream.customer');
// Route::get('/live/user/{username}', [LivestreamController::class, 'user'])->name('livestream.user');
// Route::post('/handshake-user', [LivestreamController::class, 'handshakeUser'])->name('handshake.user');
// Route::get('/handshake-customer', [LivestreamController::class, 'handshakeCustomer'])->name('handshake.customer');


Route::get('/', 'App\Http\Controllers\IndexController@index')->name('accueil')->middleware('setLanguage');
Route::get('/boutique', 'App\Http\Controllers\IndexController@boutique')->name('boutique')->middleware('setLanguage');
Route::post('/boutique/payment/process', 'App\Http\Controllers\IndexController@process')->name('payment.boutique.process')->middleware('setLanguage');
Route::get('/boutique/detail', 'App\Http\Controllers\IndexController@getDetailPaiment')->name('boutique.getDetailPaiment')->middleware(['setLanguage','auth']);
Route::get('/boutique/{product}', 'App\Http\Controllers\IndexController@addToCart')->name('boutique.add')->middleware(['setLanguage','auth']);

// Route::get('admin/login', 'App\Http\Controllers\CustomerAuthController@showLoginForm')->name('customer.login');
// Route::get('admin/create', 'App\Http\Controllers\CustomerAuthController@create')->name('customer.create');
Route::get('admin/logout', 'App\Http\Controllers\CustomerAuthController@logout')->name('customer.logout');
//Route::post('admin/login', 'App\Http\Controllers\CustomerAuthController@login')->name('customer.authenticate');
Route::post('admin/store', 'App\Http\Controllers\CustomerAuthController@store')->name('customer.store');

Route::middleware(['customer'])->prefix('admin/')->group(function () {
    
    Route::controller(ConfigController::class)->group(function () {
        Route::get('config', 'index')->name('admin.config.index');
        Route::post('config/update', 'store')->name('admin.config.store');
        Route::post('config/reset', 'reset')->name('admin.config.reset');
        Route::get('config/texte', 'texte')->name('admin.config.texte');
        Route::get('config/couverture', 'couverture')->name('admin.config.couverture');
        // Route::post('config/couverture', 'setCouverture')->name('admin.config.setcouverture');
        Route::post('config/texte', 'update')->name('admin.config.texte.update');
    });

    Route::controller(CustomerAuthController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('customer.dashboard');
        Route::get('newdashboard', 'new')->name('customer.newdashboard');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('user/list', 'index')->name('admin.user.index');
    });

    Route::controller(MediaController::class)->group(function () {
        Route::get('media', 'index')->name('admin.media.index');
        Route::post('media', 'store')->name('admin.media.store');
        Route::get('setMediaHome/{id}', 'setActiveMediaHome')->name('admin.media.set');
        Route::get('homeGallerie', 'allGalleryHome')->name('admin.home.gallerie');
    }); 

    Route::controller(GallerieController::class)->group(function () {
        Route::get('gallerie', 'index')->name('admin.gallerie.index');
        Route::get('gallerie/media', 'show')->name('admin.gallerie.show');
        Route::get('storie', 'allStorie')->name('admin.storie.index');
        Route::get('activeMedia/{media}', 'activeMedia')->name('admin.media.active');
        Route::get('activeStorie/{media}', 'postStorie')->name('admin.storie.store');
        Route::get('delete/storie/{storie}', 'deleteStorie')->name('admin.storie.delete');

        Route::get('addCouverture/{media}', 'addCouverture')->name('admin.media.addCouverture');
        Route::get('couverture', 'getAllCouverture')->name('admin.home.couverture');
        Route::get('couverture/viewActive/{couvertureHome}', 'viewCouverture')->name('admin.home.view.couverture');
        Route::post('couverture/setDescription', 'setCouverture')->name('admin.home.set.couverture');
        Route::get('couverture/setActive/{couverture}', 'setCouvertureActive')->name('admin.home.set.couverture.active');
    });

    Route::controller(ChatController::class)->group(function () {
        Route::get('conversation', 'index')->name('admin.chat.index');
        Route::post('conversation', 'store')->name('admin.chat.store');
    });
    
    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index')->name('admin.product.index');
        Route::get('product/create', 'create')->name('admin.product.create');
        Route::get('product/create/{product}', 'beforeUpdate')->name('admin.product.set');
        Route::post('product/create', 'store')->name('admin.product.store');
        Route::post('product/update', 'update')->name('admin.product.update');
        Route::get('product/{product}', 'active')->name('admin.product.active');
    });
});


Route::group(['prefix' => '{locale}', 'middleware' => ['auth','setLanguage']], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/profile', 'App\Http\Controllers\User\ProfileController@index')->name('profile.index');
    Route::post('/profile/update', 'App\Http\Controllers\User\ProfileController@updateProfile')->name('profile.update');

    Route::get('/chat', 'App\Http\Controllers\User\ChatController@index')->name('chat.index')->middleware('subscriber');
    Route::post('/chat', 'App\Http\Controllers\User\ChatController@store')->name('chat.store')->middleware('subscriber');

    Route::get('/streaming/{streamId}', 'App\Http\Controllers\WebrtcStreamingController@consumer')->name('live.consumer');

    Route::get('/live', 'App\Http\Controllers\User\LiveController@index')->name('live.index')->middleware('subscriber');

    Route::get('/subscribe', 'App\Http\Controllers\User\SubscribeController@index')->name('subscribe.index');
    Route::get('/subscribe/{type}', 'App\Http\Controllers\User\SubscribeController@show')->name('subscribe.payment.show');
    Route::post('/payment/process', 'App\Http\Controllers\User\SubscribeController@process')->name('payment.process');


    Route::get('/gallery', 'App\Http\Controllers\User\GalleryController@index')->name('gallery.index')->middleware('subscriber');
    Route::post('/media/like', 'App\Http\Controllers\User\GalleryController@like')->name('media.like')->middleware('subscriber');
    Route::get('/media/{media}', 'App\Http\Controllers\User\GalleryController@show')->name('media.show')->middleware('subscriber');
});

Route::post('/language', function (Request $request) {
    $request->session()->put('locale', $request->input('locale'));
    if (auth()->check()) {
        auth()->user()->update(['language' => $request->input('locale')]);
    }
    return redirect()->back();
})->name('language');


// Route::group(['prefix' => '{locale}', 'middleware' => ['setLanguage']], function () {
    Auth::routes();
// });




