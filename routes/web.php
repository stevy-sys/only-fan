<?php

use Illuminate\Http\Request;
use App\Http\Middleware\SetLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\Admin\GallerieController;

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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('accueil')->middleware('setLanguage');

Route::get('admin/login', 'App\Http\Controllers\CustomerAuthController@showLoginForm')->name('customer.login');
Route::get('admin/create', 'App\Http\Controllers\CustomerAuthController@create')->name('customer.create');
Route::get('admin/logout', 'App\Http\Controllers\CustomerAuthController@logout')->name('customer.logout');
Route::post('admin/login', 'App\Http\Controllers\CustomerAuthController@login')->name('customer.authenticate');
Route::post('admin/store', 'App\Http\Controllers\CustomerAuthController@store')->name('customer.store');

Route::middleware(['customer'])->prefix('admin/')->group(function () {
    
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('customer.dashboard');
    });

    Route::controller(MediaController::class)->group(function () {
        Route::get('media', 'index')->name('admin.media.index');
        Route::post('media', 'store')->name('admin.media.store');
    }); 

    Route::controller(GallerieController::class)->group(function () {
        Route::get('gallerie', 'index')->name('admin.gallerie.index');
        Route::get('gallerie/media', 'show')->name('admin.gallerie.show');
        Route::get('storie', 'allStorie')->name('admin.storie.index');
        Route::get('activeStore/:storie', 'postStorie')->name('admin.storie.store');
    });

    Route::controller(ChatController::class)->group(function () {
        Route::get('conversation', 'index')->name('admin.chat.index');
        Route::get('conversation/message', 'show')->name('admin.chat.show');
    }); 
});


Route::group(['prefix' => '{locale}', 'middleware' => ['auth','setLanguage']], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/profile', 'User\ProfileController@index')->name('profile.index');
    Route::get('/chat', 'App\Http\Controllers\User\ChatController@index')->name('chat.index');
    Route::get('/live', 'App\Http\Controllers\User\LiveController@index')->name('live.index');
    Route::get('/subscribe', 'App\Http\Controllers\User\SubscribeController@index')->name('subscribe.index');
    Route::get('/gallery', 'App\Http\Controllers\User\GalleryController@index')->name('gallery.index');
    Route::post('/media/like', 'App\Http\Controllers\User\GalleryController@like')->name('media.like');
    Route::any('/media', 'App\Http\Controllers\User\GalleryController@show')->name('media.show');
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




