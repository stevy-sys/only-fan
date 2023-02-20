<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('accueil');

Route::get('admin/login', 'App\Http\Controllers\CustomerAuthController@showLoginForm')->name('customer.login');
Route::get('admin/create', 'App\Http\Controllers\CustomerAuthController@create')->name('customer.create');
Route::get('admin/logout', 'App\Http\Controllers\CustomerAuthController@logout')->name('customer.logout');
Route::post('admin/login', 'App\Http\Controllers\CustomerAuthController@login')->name('customer.authenticate');
Route::post('admin/store', 'App\Http\Controllers\CustomerAuthController@store')->name('customer.store');

Route::middleware(['customer'])->group(function () {
    Route::get('admin/dashboard', 'App\Http\Controllers\CustomerAuthController@dashboard')->name('customer.dashboard');
    Route::get('admin/media', 'Admin\MediaController@index')->name('admin.media.index');
    Route::post('admin/media', 'Admin\MediaController@store')->name('admin.media.store');
    Route::get('admin/gallerie', 'Admin\GallerieController@index')->name('admin.gallerie.index');
    Route::get('admin/gallerie/media', 'Admin\GallerieController@show')->name('admin.gallerie.show');
    Route::get('admin/conversation/', 'Admin\ChatController@index')->name('admin.chat.index');
    Route::get('admin/conversation/message', 'Admin\ChatController@show')->name('admin.chat.show');
    Route::get('admin/storie', 'Admin\GallerieController@allStorie')->name('admin.storie.index');
    Route::get('admin/activeStore/:storie', 'Admin\GallerieController@postStorie')->name('admin.storie.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/profile', 'User\ProfileController@index')->name('profile.index');
    Route::get('/chat', 'App\Http\Controllers\User\ChatController@index')->name('chat.index');
    Route::get('/live', 'User\LiveController@index')->name('live.index');
    Route::get('/subscribe', 'User\SubscribeController@index')->name('subscribe.index');
    Route::get('/gallery', 'User\GalleryController@index')->name('gallery.index');
    Route::post('/media/like', 'User\GalleryController@like')->name('media.like');
    Route::any('/media', 'User\GalleryController@show')->name('media.show');
});


Auth::routes();


