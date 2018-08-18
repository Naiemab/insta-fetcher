<?php

Route::get('/', 'HomeController@index');

Route::get('token', [
    'uses' => 'CampaignsController@token',
    'as' => 'campaigns.token'
]);

Route::group([
    'middleware' => 'insta_token'
], function () {
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