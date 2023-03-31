<?php
/**
 * Created by NextArt.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('config-point/edit/{id}', 'ConfigPointController@edit')->name('config.point.edit');
    Route::post('config-point/edit/{id}', 'ConfigPointController@editPost')->name('config.point.edit.post');
});