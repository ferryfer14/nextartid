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
    Route::get('album-royalti/unconfirm', 'AlbumRoyaltiController@unconfirm')->name('album.royalti.unconfirm');
    Route::get('album-royalti/unconfirm/delete', 'AlbumRoyaltiController@deleteUnconfirm')->name('album.royalti.unconfirm.delete');
    Route::post('album-royalti/unconfirm', 'AlbumRoyaltiController@exportUnconfirmPost')->name('album.royalti.unconfirm.post');
});