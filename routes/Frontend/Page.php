<?php
/**
 * Created by NextArt.
 * Date: 2019-08-14
 * Time: 09:21
 */

Route::get('page/{slug}', 'PageController@index')->name('page');
Route::get('page/api/{id}', 'PageController@api')->name('page.api');