<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@first');
Route::get('/item/{keyword}/{count}/{sort_order}/{advertiserid}', 'HomeController@index');

Route::get('/item/{keyword}', 'HomeController@gofunction');
Route::get('/item/item/{keyword}', 'HomeController@gotwo');
Route::get('/item/{keyword}/{count}', 'HomeController@gocount');
Route::get('/item/{keyword1}/item/{keyword2}', 'HomeController@goitem');

Route::get('/search/{keyword}', 'HomeController@search');
Route::get('/compare/{keyword}', 'HomeController@compareItems');
Route::get('/item/{keyword}/comparision-kitchen', 'HomeController@compare');

Route::get('contact','CmsController@page');
Route::get('home', 'HomeController@index');

Route::get('/panel/setting', 'SettingController@setting');
Route::get('/panel/delete/{id}', 'SettingController@delete');
Route::get('/panel/add/{param}', 'SettingController@add');
Route::get('/panel/edit/{param}', 'SettingController@edit');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*Route::get('account/successful', 'ProfileController@successful');
*/

//Route::get('profile/insurance', 'ProfileController@insurance');

/*
Route::get('api/makers', function(){
  	$input = \Request::input('option');
	return App\vehicle_model::where('make_id',$input)->get();
});
*/
/*Support Pages*/
/*
Route::get('aboutus', 'CmsController@index');
Route::get('retail-partners', 'CmsController@index');
Route::get('studies', 'CmsController@index');
Route::get('press-release', 'CmsController@index');
Route::get('mojio', 'CmsController@index');
Route::get('video-tutorial', 'CmsController@index');
*/
//Route::get('policies', 'CmsController@index');

//$name = Route::currentRouteName();

if (!\Request::is('panel*')){
	Route::get('{id}', 'CmsController@index');
}
