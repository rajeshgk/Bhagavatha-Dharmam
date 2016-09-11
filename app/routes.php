<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('prefix' => 's/bds' ,'before' => 'auth.basic'), function() {

	Route::get('/', function() {
		return View::make('home', array('title' => 'Bhagavatha Dharmam Subscribers'));
	});

    Route::get('profile/{subs}', function(Subscriber $subscriber) {
        return Response::json($subscriber);
    });
});

Route::group(array('prefix' => 's/bds/api/v1', 'before' => 'auth.basic'), function() {
	Route::resource('subs', 'SubscriberController');
});
	
Route::model('subs', 'Subscriber');


