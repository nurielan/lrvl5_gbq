<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'QueueController@getMain');
Route::get('/queue', 'QueueController@getQueue');
Route::post('/call', 'QueueController@postCall');
Route::post('/occupied', 'QueueController@postOccupied');
Route::post('/skip', 'QueueController@postSkip');
Route::post('/queuecopy','QueueController@postQueueCopy');

Route::group(['prefix' => 'ticket'], function() {
	Route::get('/', 'QueueController@getTicket');
	Route::post('/print', 'QueueController@postPrint');
	Route::get('/queue', 'QueueController@getPrintQueue');
});

// ============ Report ===========

	//Route::post('report', ['as' => 'b_order_main_report_details', 'uses' => 'OrderMainController@report_details']);

Route::get('/report', 'QueueController@getReport');
Route::post('/report/details', 'QueueController@getReportDetails');