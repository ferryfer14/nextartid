<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('user-npwp', 'UserNpwpController@index')->name('user.npwp');
    Route::get('user-npwp/accept/{id}', 'UserNpwpController@accept')->name('user.npwp.accept');
});