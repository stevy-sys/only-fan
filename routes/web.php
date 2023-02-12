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

Route::get('/', 'IndexController@index')->name('accueil');

Route::get('admin/login', 'CustomerAuthController@showLoginForm')->name('customer.login');
Route::get('admin/create', 'CustomerAuthController@create')->name('customer.create');
Route::get('admin/logout', 'CustomerAuthController@logout')->name('customer.logout');
Route::post('admin/login', 'CustomerAuthController@login')->name('customer.authenticate');
Route::post('admin/store', 'CustomerAuthController@store')->name('customer.store');

Route::middleware(['customer'])->group(function () {
    Route::get('admin/dashboard', 'CustomerAuthController@dashboard')->name('customer.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});


Auth::routes();


