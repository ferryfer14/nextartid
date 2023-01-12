<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('user-contract', 'UserContractController@index')->name('user.contract');
    Route::get('user-contract/edit/{id}', 'UserContractController@edit')->name('user.contract.edit');
    Route::post('user-contract/edit/{id}', 'UserContractController@editPost')->name('user.contract.edit.post');
});