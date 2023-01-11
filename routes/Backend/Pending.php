<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_subscriptions'], function() {
    Route::get('pending', 'PendingController@index')->name('pending');
    Route::get('pending/edit/{id}', 'PendingController@edit')->name('pending.edit');
    Route::post('pending/edit/{id}', 'PendingController@editPost')->name('pending.edit.post');
});