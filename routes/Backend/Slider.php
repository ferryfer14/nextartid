<?php
/**
 * Created by NextArt.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_slideshow'], function() {
    Route::get('slider', 'SliderController@index')->name('slider');
    Route::get('slider/add', 'SliderController@add')->name('slider.add');
    Route::post('slider/add', 'SliderController@addPost')->name('slider.add.post');
    Route::get('slider/edit/{id}', 'SliderController@edit')->name('slider.edit');
    Route::post('slider/edit/{id}', 'SliderController@editPost')->name('slider.edit.post');
    Route::get('slider/delete/{id}', 'SliderController@delete')->name('slider.delete');
    Route::post('slider/sort', 'SliderController@sort')->name('slider.sort.post');
});