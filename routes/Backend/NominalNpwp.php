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
    Route::get('nominal-npwp/edit/{id}', 'NominalNpwpController@edit')->name('nominal.npwp.edit');
    Route::post('nominal-npwp/edit/{id}', 'NominalNpwpController@editPost')->name('nominal.npwp.edit.post');
});