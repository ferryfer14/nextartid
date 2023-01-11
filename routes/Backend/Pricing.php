<?php
/**
 * Created by NextArt.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Patner
*/

Route::group(['middleware' => 'role:admin_pricing'], function() {
    Route::get('pricing/edit/{id}', 'PricingController@edit')->name('pricing.edit');
    Route::post('pricing/edit/{id}', 'PricingController@editPost')->name('pricing.edit.post');
});