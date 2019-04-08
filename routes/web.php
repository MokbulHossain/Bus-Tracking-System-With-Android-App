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
Route::post('trip/fatch_mapdata',function(){
   $data = DB::table('bus')->select('Latitude','Longitude','name')->get();
   return $data;
});
Auth::routes();

Route::get('search_index',function(){return view('search.index');});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search','BusController@search')->name('search');
Route::resource('bus','BusController');

Route::resource('route','RouteController');

Route::resource('trip','TripController');
Route::resource('helper','HelperController');
Route::resource('driver','DriverController');
Route::resource('booked_trip','booked_tripController');

//log in.............
Route::get('admin_login',function(){return view('auth.admin_login');});
Route::post('admin_login',"LoginController@admin_login");

//Session For Users Both Driver And Helper...........................
Route::group(['middleware'=>'checkuser'],function(){ 

Route::get('admin_home','LoginController@admin_home');

});

Route::get('logout','LoginController@logout');