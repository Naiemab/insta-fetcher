<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('campaigns', [
    'uses' => 'CampaignsController@index',
    'as'  => 'campaigns.index'
]);

Route::get('campaigns/{campaign}', [
    'uses' => 'CampaignsController@show',
    'as'  => 'campaigns.show'
]);

Route::post('campaigns', [
    'uses' => 'CampaignsController@store',
    'as'  => 'campaigns.store'
]);

Route::post('tag' , [
    'uses' => 'CampaignsController@search',
    'as'   => 'search.tag'
]);

Route::get('tag' , [
    'uses' => 'CampaignsController@fetch',
    'as'   => 'fetch.tag'
]);

Route::get('token' , [
    'uses' => 'CampaignsController@token',
    'as' => 'campaigns.token'
]);