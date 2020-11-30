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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ListingController@index');

// Route::get('/', 'CardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Listings/create', 'ListingController@create')->name('listing.create');

Route::POST('/Listings/create','ListingController@store')->name('listing.store');

Route::get('/Listings/{id}/edit', 'ListingController@edit')->name('listing.edit');

Route::PATCH('/Listings/{id}/edit','ListingController@update')->name('listing.update');

Route::delete('/Listings/{id}','ListingController@destroy')->name('listing.destroy');



Route::GET('/Listings/{listing_id}/Cards/create', 'CardController@create')->name('card.create');

Route::POST('/Listings/{listing_id}/Cards/create','CardController@store')->name('card.store');

Route::GET('/Listings/{listing_id}/Cards/{card_id}', 'CardController@show')->name('card.show');

Route::GET('/Listings/{listing_id}/Cards/{card_id}/edit', 'CardController@edit')->name('card.edit');

Route::PATCH('/Listings/{listing_id}/Cards/{card_id}/edit', 'CardController@update')->name('card.update');

Route::delete('/Listings/{listing_id}/Cards/{card_id}/delete','CardController@destroy')->name('card.destroy');

