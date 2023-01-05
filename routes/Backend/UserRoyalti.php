<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('user-royalti', 'UserRoyaltiController@index')->name('user.royalti');
    Route::get('user-royalti/album/{id}', 'UserRoyaltiController@album')->name('user.royalti.album');
    Route::get('user-royalti/song/{id}/{artist_id}', 'UserRoyaltiController@song')->name('user.royalti.song');
    Route::get('user-royalti/song/detail/{id}/{album_id}/{artist_id}', 'UserRoyaltiController@songDetail')->name('user.royalti.song.detail');
});