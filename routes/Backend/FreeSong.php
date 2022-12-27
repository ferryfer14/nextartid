<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_songs'], function() {
    Route::get('free-song', 'FreeSongController@index')->name('free.song');
    Route::get('free-song/add', 'FreeSongController@add')->name('free.song.add');
    Route::post('free-song/add', 'FreeSongController@addPost')->name('free.song.add.post');
    Route::get('free-song/edit/{id}', 'FreeSongController@edit')->name('free.song.edit');
    Route::post('free-song/edit/{id}', 'FreeSongController@editPost')->name('free.song.edit.post');
    Route::get('free-song/delete/{id}', 'FreeSongController@delete')->name('free.song.delete');
    Route::post('free-song/sort', 'FreeSongController@sort')->name('free.song.sort.post');
});