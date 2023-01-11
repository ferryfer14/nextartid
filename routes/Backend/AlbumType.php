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
    Route::get('album-type', 'AlbumTypeController@index')->name('album.type');
    Route::get('album-type/add', 'AlbumTypeController@add')->name('album.type.add');
    Route::post('album-type/add', 'AlbumTypeController@addPost')->name('album.type.add.post');
    Route::get('album-type/edit/{id}', 'AlbumTypeController@edit')->name('album.type.edit');
    Route::post('album-type/edit/{id}', 'AlbumTypeController@editPost')->name('album.type.edit.post');
    Route::get('album-type/delete/{id}', 'AlbumTypeController@delete')->name('album.type.delete');
    Route::post('album-type/sort', 'AlbumTypeController@sort')->name('album.type.sort.post');
});