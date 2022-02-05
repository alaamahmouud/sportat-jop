<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api','prefix'=> 'v1' ],function ()
{

    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::post('send-pin-code', 'AuthController@clientSendPinCode');
    Route::post('check-pin-code','AuthController@checkPinCode');
    Route::post('register-step-two','AuthController@registerStepTwo');


    Route::get('nationality','MainController@nationality');
    Route::get('countries','MainController@countries');


    Route::post('new-password','AuthController@newPassword');
    Route::post('reset-password','AuthController@resetpassword') ;


    Route::group(['middleware' => 'auth:clients'],function () {
        Route::post('update-profile', 'AuthController@updateProfile');
        Route::post('change-password', 'AuthController@changePassword');
        Route::post('logout', 'AuthController@logOut');

        Route::get('competition_rules','MainController@CompetitionRules');
        Route::get('get-profile','AuthController@getProfile');
        Route::get('personal-information','AuthController@personalInformation');

        
        Route::get('home','MainController@index');
        Route::get('list-categories','MainController@categories');
        Route::post('add-video','MainController@addvedio');
        Route::post('add-comment','MainController@addComment');
        Route::get('video-by-id','MainController@videoById');

        Route::post('add-vote','MainController@upVote');
        Route::post('remove-vote','MainController@downVote');


        // views

        Route::post('add-view','ViewController@addView');
        /// end views
        /// notfy list
        Route::get('notifications','MainController@notifications');
        Route::post('read-notification','MainController@readNotification');
        Route::post('delete-notification','MainController@deleteNotification');

        //

    });


    });
