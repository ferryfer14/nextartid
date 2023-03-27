<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:13
 */

Route::group(['middleware' => 'role:admin_subscriptions'], function() {
    Route::get('transaction-subscribe', 'TransactionSubscribeController@index')->name('transaction.subscribe');
    Route::get('transaction-subscribe/paid', 'TransactionSubscribeController@paid')->name('transaction.subscribe.paid');
    Route::get('transaction-subscribe/add', 'TransactionSubscribeController@add')->name('transaction.subscribe.add');
    Route::post('transaction-subscribe/add', 'TransactionSubscribeController@addPost')->name('transaction.subscribe.add.post');
    Route::get('transaction-subscribe/edit/{id}', 'TransactionSubscribeController@edit')->name('transaction.subscribe.edit');
    Route::post('transaction-subscribe/edit/{id}', 'TransactionSubscribeController@editPost')->name('transaction.subscribe.edit.post');
});