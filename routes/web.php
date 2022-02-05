<?php

use Gloudemans\Shoppingcart\Facades\Cart;
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

Route::get('clear-cache',function (){
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return 'Ok' ;
});
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('front.home');


Route::group(['middleware' => 'guest:clients'],function (){
    Route::post('client-login','AuthController@login');
});


Route::group(['middleware' => ['auth:client-web', 'auto-check-permission']], function () {


    Route::get('/logout', 'AuthController@logout')->name('front.logout');
    Route::get('about', 'HomeController@about')->name('front.about');
    Route::get('roles', 'HomeController@roles')->name('front.rols');
    Route::get('contact', 'HomeController@contact')->name('front.contact');
    Route::get('profile', 'HomeController@profile');
    Route::get('index', 'HomeController@allsports')->name('front.index');
    Route::get('video-by-id/{id}', 'HomeController@videoById')->name('front.videoId');
    Route::get('login', 'HomeController@login');


    Route::post('add-vote','VideoController@upVote');
    Route::post('add-video','VideoController@store');

});





