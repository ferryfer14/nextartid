<?php
/**
 * Created by NextArt.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_albums'], function() {
    Route::get('album-royalti', 'AlbumRoyaltiController@index')->name('album.royalti');
    Route::post('album-royalti', 'AlbumRoyaltiController@exportPost')->name('album.royalti.post');
});