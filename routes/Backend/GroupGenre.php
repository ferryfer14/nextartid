<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_group_genre'], function() {
    Route::get('group-genre', 'GroupGenreController@index')->name('group-genre');
    Route::get('group-genre/add', 'GroupGenreController@add')->name('group-genre.add');
    Route::post('group-genre/add', 'GroupGenreController@addPost')->name('group-genre.add.post');
    Route::get('group-genre/edit/{id}', 'GroupGenreController@edit')->name('group-genre.edit');
    Route::post('group-genre/edit/{id}', 'GroupGenreController@editPost')->name('group-genre.edit.post');
    Route::get('group-genre/delete/{id}', 'GroupGenreController@delete')->name('group-genre.delete');
    Route::post('group-genre/sort', 'GroupGenreController@sort')->name('group-genre.sort.post');
});