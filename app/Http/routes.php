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

// -------------------- Authentication ---------------------------
Route::get('/login', 'Auth\AuthController@getLogin')->name('login');
Route::get('/logout', 'Auth\AuthController@getLogout')->name('logout');
Route::post('/login', 'Auth\AuthController@postLogin')->name('postLogin');
Route::get('/register', 'Auth\AuthController@getRegister')->name('register');
Route::post('/register', 'Auth\AuthController@postRegister')->name('postRegister');

// -------------------- Pages -------------------------
Route::get('/', 'PagesController@getHomepage')->name('home');

// ------------------ Distributors ------------------
Route::resource('distributors', 'DistributorsController', ['only' => ['index', 'store']]);

// ------------------ Dealers ------------------
Route::resource('dealers', 'DealersController', ['only' => ['index', 'store']]);

// ---------------------- Dealers of Distributor ---------------------
Route::resource('dod', 'DealersOfDistributorController', ['only' => 'store']);

// ---------------------- Areas ----------------------
Route::resource('areas', 'AreasController', ['only' => ['index', 'store']]);

// ---------------------- Storages ----------------------
Route::resource('storages', 'StoragesController', ['only' => ['index', 'store']]);

// ---------------------- Seeds ----------------------
Route::resource('seeds', 'SeedsController', ['only' => ['index', 'store']]);

// ---------------------- Farmers ----------------------
Route::resource('farmers', 'FarmersController', ['only' => ['index', 'store']]);

// ---------------------- Distributions ----------------------
Route::resource('distributions', 'DistributionsController', ['only' => ['index', 'store']]);

// ---------------------- Notices of Distributors ----------------------
Route::resource('notices', 'DistributionNoticesForDistributorController', ['only' => ['index', 'store']]);

// ---------------------- Orders for Dealers ----------------------
Route::resource('orders', 'OrdersForDealersController', ['only' => ['index', 'store']]);

// ---------------------- Reports ----------------------
Route::resource('reports', 'ReportsController', ['only' => 'index']);
