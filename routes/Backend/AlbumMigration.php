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
    Route::get('album-migration', 'AlbumMigrationController@index')->name('album.migration');
    Route::post('album-migration', 'AlbumMigrationController@exportPost')->name('album.migration.post');
});