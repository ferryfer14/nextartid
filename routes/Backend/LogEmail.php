<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_system_logs'], function() {
    Route::get('log-email', 'LogEmailController@index')->name('log.email');
});