<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|ge
*/


/**
 * Home route
 */
Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

/**
 * Authentication Routes
 */

Route::get('/signup', [
    'uses' => 'AuthController@getSignUp',
    'as'   => 'signup'
]);

Route::post('/signup', [
    'uses' => 'AuthController@postSignUp',
]);

Route::get('/login', [
    'uses' => 'AuthController@getLogin',
    'as'   => 'login'
]);

Route::post('/login', [
    'uses' => 'AuthController@postLogin',
]);

Route::get('/logout', [
    'uses' => 'AuthController@getSignOut',
    'as'   => 'signout'
]);

/**
 * Dashboard routes
 */
Route::get('/dashboard', [
    'uses' => 'HomeController@getDashboard',
    'as'   => 'dashboard'
]);

/**
 * Request routes
 */
Route::get('/request', [
    'uses' => 'RequestController@getRequest',
    'as'   => 'request'
]);
