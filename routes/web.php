<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
   	return view('index');
});

//Route::get('/login', ["uses"=>"LoginController@index"]);
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@valid');

Route::get('/register', 'RegisterController@index')->name('register.index');
Route::post('/register', 'RegisterController@valid');


Route::get('/home', 'HomeController@index')->name('home.index');


	Route::get('/parkingspace', 'ParkingSpaceController@index')->name('parkingspace.index');

		Route::get('/parkingspace/add', 'ParkingSpaceController@add')->name('parkingspace.add');
		Route::post('/parkingspace/add', 'ParkingSpaceController@create');

		Route::get('/parkingspace/details/{sid}', 'ParkingSpaceController@details')->name('parkingspace.details');

		Route::get('/parkingspace/spaceList', 'ParkingSpaceController@show')->name('parkingspace.spaceList');

		Route::get('/parkingspace/edit/{sid}', 'ParkingSpaceController@edit')->name('parkingspace.edit');
		Route::post('/parkingspace/edit/{sid}', 'ParkingSpaceController@update');

		Route::get('/parkingspace/delete/{sid}', 'ParkingSpaceController@delete')->name('parkingspace.delete');
		Route::post('/parkingspace/delete/{sid}', 'ParkingSpaceController@destroy');



	Route::get('/booking', 'BookingController@index')->name('booking.index');

		Route::get('/booking/add', 'BookingController@add')->name('booking.add');
		Route::post('/booking/add', 'BookingController@create');

		Route::get('/booking/bookingList', 'BookingController@show')->name('booking.bookingList');

		Route::get('/booking/more', 'BookingController@more')->name('booking.more');
		
		Route::get('/booking/details/{bid}', 'BookingController@details')->name('booking.details');
		
		Route::get('/booking/total/{bid}', 'BookingController@total')->name('booking.total');
		
		Route::get('/booking/edit/{bid}', 'BookingController@edit')->name('booking.edit');
		Route::post('/booking/edit/{bid}', 'BookingController@update');

		Route::get('/booking/delete/{bid}', 'BookingController@delete')->name('booking.delete');
		Route::post('/booking/delete/{bid}', 'BookingController@destroy');


Route::get('/user', 'UserController@index')->name('user.index');

Route::get('/user/edit/{uid}', 'UserController@edit')->name('user.edit');
Route::post('/user/edit/{uid}', 'RegisterController@update');

Route::get('/user/details/{uid}', 'UserController@details')->name('user.details');

	Route::get('/search', 'SearchController@index');
	Route::get('/user/search/action', 'SearchController@search')->name('search.action');

	Route::get('/userbooking', 'UserBookingController@index')->name('userbooking.index');

	Route::get('/userbooking/confirm/{bid}', 'UserBookingController@confirm')->name('userbooking.confirm');
	Route::post('/userbooking/confirm/{bid}', 'UserBookingController@make');

	Route::get('/userbooking/details/{bid}', 'UserBookingController@details')->name('userbooking.details');
	
	Route::get('/userbooking/show', 'UserBookingController@show')->name('userbooking.show');

	Route::get('/userbooking/edit/{bid}', 'UserBookingController@edit')->name('userbooking.edit');
	Route::post('/userbooking/edit/{bid}', 'UserBookingController@update');
	
	Route::get('/userbooking/delete/{bid}', 'UserBookingController@delete')->name('userbooking.delete');
	Route::post('/userbooking/delete/{bid}', 'UserBookingController@destroy');	
		

Route::get('/logout', 'LogoutController@index');

//Route::resource('accounts', 'AccountController');


