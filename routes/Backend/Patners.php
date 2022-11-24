<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_patners'], function() {
    Route::get('patners', 'PatnersController@index')->name('patners');
    Route::get('patners/add', 'PatnersController@add')->name('patners.add');
    Route::post('patners/add', 'PatnersController@addPost')->name('patners.add.post');
    Route::get('patners/edit/{id}', 'PatnersController@edit')->name('patners.edit');
    Route::post('patners/edit/{id}', 'PatnersController@editPost')->name('patners.edit.post');
    Route::get('patners/delete/{id}', 'PatnersController@delete')->name('patners.delete');
    Route::post('patners/sort', 'PatnersController@sort')->name('patners.sort.post');
});