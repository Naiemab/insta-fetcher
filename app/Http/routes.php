<?php

Route::get('/', 'HomeController@index');

Route::get('token' , [
    'uses' => 'CampaignsController@token',
    'as' => 'campaigns.token'
]);

Route::group([
    'middleware' => 'insta_token'
], function (){
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
        'as'   => 'search_post.tag'
    ]);

    Route::get('tag' , [
        'uses' => 'CampaignsController@search',
        'as'   => 'search_get.tag'
    ]);
});