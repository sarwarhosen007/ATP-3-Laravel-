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

	   Route::post('bookstore/search','BookStoreController@bookSearch')->name('bookSearch');

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


	   // Settings

	   Route::get('porfileSetting/view','ProfileSettingController@showSettingPage')->name('porfileSetting.showSettingPage');

	   Route::get('porfileSetting/view/password','ProfileSettingController@showPasswordpage')->name('porfileSetting.showPasswordpage');

	   Route::get('porfileSetting/view/image','ProfileSettingController@showImagePage')->name('porfileSetting.showImagePage');

	   Route::get('porfileSetting/view/profile','ProfileSettingController@profile')->name('porfileSetting.showProfile');

	   Route::post('porfileSetting/email/{id}','ProfileSettingController@updateEmail')->name('updateEmail');

	   Route::post('porfileSetting/password/{id}','ProfileSettingController@updatePassword')->name('updatePassword');

	   Route::post('porfileSetting/profileImage/{id}','ProfileSettingController@updateProfileImage')->name('updateProfileImage');



	   });
});

// Admin Controller
Route::group(['namespace'=>'Admin'],function(){
 
	Route::get('admin/login','AdminLoginController@loginView')->name('admin.loginView');
	Route::post('admin/login','AdminLoginController@check')->name('login.check');

	Route::group(['middleware'=>'admin'],function(){
 
		    Route::get('admin/home','HomeController@index')->name('admin.home');

		    Route::get('admin/logout','HomeController@logout')->name('admin.logout');

		    // Advertise list controller
		    Route::get('admin/advertiseList/','AdvertiseListController@index')->name('advertiseList.index'); 	

		    Route::get('admin/advertise/individualAdvertise/{id}','AdvertiseListController@individualAdvertise')->name('advertise.individualAdvertise');

		    Route::get('admin/advertise/delete/{id}','AdvertiseListController@deleteAdvertise')->name('advertise.delete');

		    // Request History Controller
		    Route::get('admin/RequestHistory','RequestHistoryController@index')->name('history.index');
		    // User History Controller
		    Route::get('admin/UserHistory','UserHistoryController@index')->name('userhistory.index');
		    
		    Route::get('admin/UserHistory/IndividualUser/{id}','UserHistoryController@individualUser')->name('userhistory.individualUser');

		    Route::get('admin/UserHistory/userPrompt/{id}','UserHistoryController@userPrompt')->name('individualUser.userPrompt');

		    // User Message History Controller
		    Route::get('admin/usermessagehistory','UserMessageHistoryController@index')->name('usermessagehistory.index');

		    // setting controlle 
		    Route::get('admin/profile','AdminSettingsController@profile')->name('profile');

		    Route::get('admin/email','AdminSettingsController@emailPageShow')->name('emailPageShow');

		    Route::post('admin/email','AdminSettingsController@UpdateEmail')->name('UpdateEmail');

		    Route::get('admin/password','AdminSettingsController@passwordPageShow')->name('passwordPageShow');

		    Route::post('admin/password','AdminSettingsController@updatePassword')->name('passwordUpdate');

		    Route::get('admin/profileImage','AdminSettingsController@iamgePageShow')->name('imagePageShow');
		    Route::post('admin/profileImage','AdminSettingsController@updateProfileImage')->name('updateProfileImageAdmin');




		});
});