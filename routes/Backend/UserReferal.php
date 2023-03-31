<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('user-referal', 'UserReferalController@index')->name('user.referal');
    Route::get('user-referal/edit/{id}', 'UserReferalController@edit')->name('user.referal.edit');
    Route::post('user-referal/edit/{id}', 'UserReferalController@editPost')->name('user.referal.edit.post');
});