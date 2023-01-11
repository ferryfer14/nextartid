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
    Route::get('song-migration', 'SongMigrationController@index')->name('song.migration');
    Route::post('song-migration', 'SongMigrationController@exportPost')->name('song.migration.post');
});