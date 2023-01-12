<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_transactions'], function() {
    Route::get('convert-royalti', 'ConvertRoyaltiController@index')->name('convert.royalti');
});