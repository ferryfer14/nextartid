<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('user-unconfirm', 'UserUnconfirmController@index')->name('user.unconfirm');
    Route::get('user-unconfirm/album/{id}', 'UserUnconfirmController@album')->name('user.unconfirm.album');
    Route::get('user-unconfirm/song/{id}/{artist_id}', 'UserUnconfirmController@song')->name('user.unconfirm.song');
    Route::get('user-unconfirm/song/detail/{id}/{album_id}/{artist_id}', 'UserUnconfirmController@songDetail')->name('user.unconfirm.song.detail');
});