<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-01
 * Time: 20:35
 */
Route::post('payment/notification-end-point', 'PaymentController@notificationCallback')->name('payment.notification.end.point');