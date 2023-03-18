<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_users'], function() {
    Route::get('user-artist', 'UserArtistController@index')->name('user.artist');
    Route::get('user-artist/edit/{id}', 'UserArtistController@edit')->name('user.artist.edit');
    Route::post('user-artist/edit/{id}', 'UserArtistController@editPost')->name('user.artist.edit.post');
});