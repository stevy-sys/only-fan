<?php

use Illuminate\Http\Request;
use App\Http\Middleware\SetLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\UserController;
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
use App\Http\Controllers\User\PayPalController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\GallerieController;
use App\Http\Controllers\Admin\ReseauSocioController;
use App\Http\Controllers\Admin\SubscriptionController;

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
Route::post('/boutique/payment/wallet', 'App\Http\Controllers\IndexController@paywallet')->name('payment.boutique.wallet')->middleware('setLanguage');
Route::get('/boutique/detail', 'App\Http\Controllers\IndexController@getDetailPaiment')->name('boutique.getDetailPaiment')->middleware(['setLanguage','auth']);
Route::get('/boutique/{product}', 'App\Http\Controllers\IndexController@addToCart')->name('boutique.add')->middleware(['setLanguage','auth']);


Route::controller(PayPalController::class)->prefix('paypal')->group(function () {
        // Route::view('payment', 'paypal.index')->name('create.payment');
        Route::post('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');

        Route::post('handle-payment-subscription', 'handlePaymentSubscription')->name('make.payment.subscription');
        Route::get('payment-success-subscription', 'paymentSuccessSubscription')->name('success.payment.subscription');
});

// Route::post('/paypal', [PayPalController::class,'postPaymentWithpaypal']);
// Route::get('/paypal/success', [PayPalController::class,'getPaymentStatus'])->name('paypal.success');
// Route::get('/paypal/cancel', [PayPalController::class,'cancelPage'])->name('paypal.cancel');

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
        Route::get('config/role', 'roles')->name('admin.config.role.index');
        Route::post('config/role/update/{role}', 'updateRole')->name('admin.config.role.update');
        Route::get('config/role/create', 'createRole')->name('admin.config.role.store');
        Route::post('config/create/admin', 'createadmin')->name('admin.config.createadmin');

    });

    Route::controller(ReseauSocioController::class)->group(function () {
        Route::get('reseau', 'index')->name('admin.reseau.index');
        Route::post('reseau/update/{reseau}', 'update')->name('admin.reseau.update');
        Route::post('reseau/delete/{reseau}', 'delete')->name('admin.reseau.delete');
        Route::post('reseau/create', 'create')->name('admin.reseau.create');
    });

    Route::controller(CustomerAuthController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('customer.dashboard');
        Route::get('newdashboard', 'new')->name('customer.newdashboard');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('user/list', 'index')->name('admin.user.index');
        Route::post('user/update', 'updateWallet')->name('admin.user.update.wallet');
    });

    Route::controller(InvoiceController::class)->group(function () {
        Route::get('boutique/invoice', 'invoiceBoutique')->name('admin.boutique.invoice');
        Route::get('subscribe/invoice', 'invoiceSubscribe')->name('admin.subscribe.invoice');
        Route::get('invoice/payment/subscription/{idInvoice}', 'invoiceSubscription')->name('admin.invoice.subscription');
        Route::get('invoice/payment/product/{idInvoice}', 'invoiceProduct')->name('admin.invoice.boutique');
    });

    Route::controller(MediaController::class)->group(function () {
        Route::get('media', 'index')->name('admin.media.index');
        Route::post('media', 'store')->name('admin.media.store');
        Route::get('setMediaHome/{id}', 'setActiveMediaHome')->name('admin.media.set');
        Route::get('setflou/{id}', 'setflou')->name('admin.media.setflou');
        Route::get('homeGallerie', 'allGalleryHome')->name('admin.home.gallerie');
    });

    Route::controller(GallerieController::class)->group(function () {
        Route::get('gallerie', 'index')->name('admin.gallerie.index');
        Route::get('gallerie/delete/{media}', 'delete')->name('admin.gallerie.delete');
        Route::get('gallerie/media', 'show')->name('admin.gallerie.show');
        Route::get('storie', 'allStorie')->name('admin.storie.index');
        Route::get('storie/{storie}', 'showStorie')->name('admin.storie.show');
        Route::get('storie/delete/{storieCollection}', 'deleteElementStorie')->name('admin.storie.show.delete');
        Route::post('activeStorie', 'postStorie')->name('admin.storie.store');
        Route::post('updateStorie', 'updateStorie')->name('admin.storie.update');
        Route::get('delete/storie/{storie}', 'deleteStorie')->name('admin.storie.delete');

        Route::get('activeMedia/{media}', 'activeShowMedia')->name('admin.media.active');
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

    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('subscription', 'index')->name('admin.subscription.index');
        Route::get('view/{subscription}', 'viewSubscription')->name('admin.subscription.view');
        Route::get('delete/{subscription}', 'delete')->name('admin.subscription.delete');
        Route::post('update/{subscription}', 'update')->name('admin.subscription.update');
        Route::get('subscription/create', 'create')->name('admin.subscription.create');
        Route::post('subscription/newSubscription', 'createSubscription')->name('admin.subscription.newSubscription');
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


    Route::get('/wallet', 'App\Http\Controllers\User\WalletController@index')->name('wallet.index');
    Route::post('/wallet/active', 'App\Http\Controllers\User\WalletController@activeWallet')->name('wallet.create');
    Route::get('/wallet/getPayment', 'App\Http\Controllers\User\WalletController@getPayment')->name('wallet.payment');
    Route::post('/wallet/createPaiment', 'App\Http\Controllers\User\WalletController@createPaiment')->name('wallet.createPaiment');

    Route::get('/gallery', 'App\Http\Controllers\User\GalleryController@index')->name('gallery.index');
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
Route::get('/confirm-compte', [RegisterController::class,'confirmCompte'])->name('confirm-compte');
Auth::routes(['verify' => true]);
// });




