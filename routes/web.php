<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Sytax issue in Laravel 8 - info here - https://www.codermen.com/solved-target-class-controller-does-not-exist/
*/

// All Listings
Route::get('/', 'App\Http\Controllers\ListingController@index');

// Show create form
Route::get('/listings/create', 'App\Http\Controllers\ListingController@create')->middleware('auth');

// Store listing data
Route::post('/listings', 'App\Http\Controllers\ListingController@store')->middleware('auth');

// Show edit form
Route::get('listings/{listing}/edit', 'App\Http\Controllers\ListingController@edit')->middleware('auth');

// Update listing
Route::put('/listings/{listing}', 'App\Http\Controllers\ListingController@update')->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', 'App\Http\Controllers\ListingController@destroy')->middleware('auth');

// Manage Listings
Route::get('/listings/manage', 'App\Http\Controllers\ListingController@manage')->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', 'App\Http\Controllers\ListingController@show');

// Show registration form
Route::get('/register', 'App\Http\Controllers\UserController@create')->middleware('guest');

// Create new user
Route::post('/users', 'App\Http\Controllers\UserController@store');

// Log user out
Route::post('/logout', 'App\Http\Controllers\UserController@logout')->middleware('auth');

// Show login form
Route::get('/login', 'App\Http\Controllers\UserController@login')->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', 'App\Http\Controllers\UserController@authenticate');