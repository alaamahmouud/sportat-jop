<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'],function ()
{

    Route::post('login','GuestController@loginGuest');
    Route::post('check-pin-code','GuestController@checkPinCode');

    Route::group(['middleware' => 'auth:guest'],function () {

        Route::get('home','MainController@index');


        Route::post('add-vote','MainController@upVote');
        Route::post('remove-vote','MainController@downVote');
        Route::post('add-view','GuestController@addView');

        Route::post('add-comment','GuestController@addComment');
    });

});
