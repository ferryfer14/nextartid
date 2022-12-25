<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_albums'], function() {
    Route::get('album-export', 'AlbumExportController@index')->name('album.export');
    Route::post('album-export', 'AlbumExportController@exportPost')->name('album.export.post');
});