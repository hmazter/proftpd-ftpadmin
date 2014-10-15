<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
 * Home
 */
Route::get('/', 'HomeController@dashboard');
Route::get('/charts', 'HomeController@charts');


/*
 * User
 */
Route::get('/users', 'UserController@getUsers');
Route::get('/user/{id}', 'UserController@getUser');
Route::post('/user/save', 'UserController@saveUser');
Route::post('/user/delete/{id}', 'UserController@deleteUser');
Route::get('/users/online', 'UserController@online');


/*
 * Group
 */
Route::get('/groups', 'GroupController@getGroups');


/*
 * Log
 */
Route::get('/logs', 'LogController@getLogs');
Route::get('/logs/transfers', 'LogController@getTransfers');
Route::get('/logs/logins', 'LogController@getLogins');


/*
 * API
 */
Route::get('api/online-count', 'ApiController@getOnlineCount');
Route::get('api/online-list', 'ApiController@getOnlineList');

/*
 * Webuser
 */
Route::get('webuser/login', 'WebUserController@getLogin');
Route::post('webuser/login', 'WebUserController@postLogin');
Route::get('webuser/logout', 'WebUserController@logout');
Route::get('webuser/profile', 'WebUserController@getProfile');
Route::post('webuser/profile', 'WebUserController@postProfile');