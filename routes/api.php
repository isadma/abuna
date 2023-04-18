<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//auth
Route::post('auth/login', 'Api\AuthController@login');
Route::post('auth/register', 'Api\AuthController@register');
Route::get('auth/logout', 'Api\AuthController@logout')->middleware('auth:api');


//publications
Route::get('publications/types', 'Api\PublicationController@types');
Route::get('publications/type/{type:slug}', 'Api\PublicationController@publications');

//addresses
Route::get('address/all', 'Api\AddressController@all');
Route::get('address/states', 'Api\AddressController@states');
Route::get('address/cities/state/{state:id}', 'Api\AddressController@cities');
Route::get('address/streets/city/{city:id}', 'Api\AddressController@streets');

//user
Route::get('profile', 'Api\UserController@profile')->middleware('auth:api');
Route::post('profile/update', 'Api\UserController@updateProfile')->middleware('auth:api');
Route::post('profile/change/password', 'Api\UserController@changePassword')->middleware('auth:api');
Route::get('profile/purchases', 'Api\UserController@purchases')->middleware('auth:api');

//purchase
Route::post('purchase', 'Api\PurchaseController@purchase')->middleware('auth:api');
