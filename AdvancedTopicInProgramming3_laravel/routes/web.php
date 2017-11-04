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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function()
{
     Route::get('/bookstore', function () {
         return view('user.bookstore.index');
     });

    // User Controller Group

	Route::group(['namespace'=>'User'],function(){
	   
	   // Advertise Controller
	   Route::resource('user/advertise','AdvertiseController');
	   
	   // BookStoreControllr
	   Route::get('bookstore','BookStoreController@index')->name('bookstore.show');

	   Route::get('bookstore/{id}','BookStoreController@details')->name('bookstore.details');

	   // Send Email And Request
	   Route::post('request','BookStoreController@SendRequest')->name('sendrequest');

	   Route::get('requestDetails/{id}','RequestTrackController@Details')->name('requestDetails');
	   
	   // Request Accept
	   Route::get('requestConfirmation/{id}','RequestTrackController@requestConfirmation')->name('requestConfirmation');

	   // Sender Details
	   Route::get('senderDetails/{id}','RequestTrackController@senderDetails')->name('senderDetails');
	   //Request Reject
	   Route::get('requestRejcet/{id}','RequestTrackController@requestRejcet')->name('requestRejcet');

	   /* 

	    Notification section route
       
       */
	    
	    // show all Notifications

	   Route::get('notificationList','NotificationController@list')->name('notification.list');

	   // delete notification 
	   Route::get('notificationdelete/{id}','NotificationController@delete')->name('notification.delete');


	   // chat room

	   Route::resource('user/message','MessageController');



	   });
});
