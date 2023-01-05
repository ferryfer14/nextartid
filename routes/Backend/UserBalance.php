<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('user-balance', 'UserBalanceController@index')->name('user.balance');
    Route::get('user-balance/detail/{id}', 'UserBalanceController@detail')->name('user.balance.detail');
});