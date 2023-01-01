<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_transactions'], function() {
    Route::get('withdraw-royalti', 'WithdrawRoyaltiController@index')->name('withdraw.royalti');
});