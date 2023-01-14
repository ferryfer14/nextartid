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
    Route::get('nominal-fee/edit/{id}', 'NominalFeeController@edit')->name('nominal.fee.edit');
    Route::post('nominal-fee/edit/{id}', 'NominalFeeController@editPost')->name('nominal.fee.edit.post');
});