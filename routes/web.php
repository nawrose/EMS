<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'FrontendController@home_page')->name('home_page');


// all event controller
Route::resource('events', 'EventController');
Route::get('/event_booked_details', 'EventController@event_booked_list')->name('event_booked_list');
// Route::post('/event_booked_details', 'EventController@event_booked_list')->name('event_booked_list');
Route::get('event/search', 'EventController@event_booked_list')->name('event_search');
Route::get('event/comming/finished', 'EventController@event_comming_and_finished')->name('event_comming_and_finished');


Route::get('/event/show', 'EventController@event_show')->name('event_show');
Route::resource('locations', 'LocationController');
Route::resource('booking_category', 'BookingCategoryController');
Route::resource('booking_registration', 'BookingRegistraionController');
Route::get('booking/details', 'BookingRegistraionController@booking_details')->name('booking_details');

//it will pass booking category id with this we can understand booking type basic, standard or premimum
Route::get('/event/category/{details_id}', 'BookingRegistraionController@with_category_id')->name('with_category_id');


Route::get('/event/details/show/{details_id}', 'FrontendController@event_details')->name('event_details');
//payment Controller
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/list', 'HomeController@user_list')->name('user_list');
Route::get('event/cancle/{id}','BookingRegistraionController@eventCancle');
Route::get('generate-pdf/{id}','BookingRegistraionController@downloadPDF');
