<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('token', [
    'uses' => 'CampaignController@token',
    'as' => 'campaign.token'
]);

Route::auth();

Route::group([
    'middleware' => ['insta_token','auth']
], function () {

//    Route::get('/home', [
//        'uses' => 'HomeController@index',
//        'as' => 'home'
//    ]);

    Route::get('campaigns', [
        'uses' => 'CampaignController@index',
        'as' => 'campaign.index'
    ]);

    Route::get('campaigns/{campaign}', [
        'uses' => 'CampaignController@show',
        'as' => 'campaign.show'
    ]);

    Route::post('campaigns', [
        'uses' => 'CampaignController@store',
        'as' => 'campaign.store'
    ]);

    Route::post('tag', [
        'uses' => 'TagController@store',
        'as' => 'tag.store'
    ]);

    Route::get('tag', [
        'uses' => 'TagController@show',
        'as' => 'tag.show'
    ]);

    Route::get('tag/{tag}', [
        'uses' => 'TagController@show',
        'as' => 'tag.show'
    ]);

    Route::get('tag', [
        'uses' => 'TagController@save',
        'as' => 'tag.save'
    ]);
});

Route::get('test', [
    'uses' => 'CampaignController@test',
    'as' => 'test'
]);