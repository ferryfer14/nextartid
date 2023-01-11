<?php
/**
 * Created by NextArt.
 * Date: 2019-06-23
 * Time: 09:58
 */

/*
 * Edit Static Module
*/

Route::group(['middleware' => 'role:admin_earnings'], function() {
    Route::get('vouchers', 'VouchersController@index')->name('vouchers');
    Route::get('vouchers/add', 'VouchersController@add')->name('vouchers.add');
    Route::post('vouchers/add ', 'VouchersController@addPost')->name('vouchers.add.post');
    Route::get('vouchers/edit/{id}', 'VouchersController@edit')->name('vouchers.edit');
    Route::post('vouchers/edit/{id}', 'VouchersController@editPost')->name('vouchers.edit.post');
    Route::get('vouchers/delete/{id}', 'VouchersController@delete')->name('vouchers.delete');
});