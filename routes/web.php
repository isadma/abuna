<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth', 'roles']], function (){
    //home
    Route::get('/index', array('as'=>'index', 'uses'=>'HomeController@index', 'roles'=>['admin']));
    Route::get('/', array('as'=>'index', 'uses'=>'HomeController@index', 'roles'=>['admin']));
    Route::get('/home', array('as'=>'home', 'uses'=>'HomeController@index', 'roles'=>['admin']));

    //-----------------------------------------------
    //admin
    //-----------------------------------------------

    //users
    Route::resource('user', 'UserController', array('roles' => 'admin'));
    Route::post('/user/change/password', array('as'=>'user.change.password', 'uses'=>'UserController@changePassword', 'roles'=>['admin']));
    Route::post('/user/update/profile', array('as'=>'user.update.profile', 'uses'=>'UserController@updateProfile', 'roles'=>['admin']));

    //publications
    Route::resource('publication', 'PublicationController', array('roles' => 'admin'));
    Route::resource('period', 'PeriodController', array('roles' => 'admin'))->only('store', 'update', 'destroy');

    //addresses
    Route::resource('city', 'CityController', array('roles' => 'admin'))->except('create', 'edit', 'show');
    Route::resource('branch', 'BranchController', array('roles' => 'admin'))->except('create', 'edit', 'show');
    Route::resource('address', 'AddressController', array('roles' => 'admin'))->except('create', 'edit', 'show');

    //purchases
    Route::get('/purchases', array('as'=>'purchases', 'uses'=>'PurchaseController@index', 'roles'=>['admin']));
    Route::get('/purchases/{id}/publications', array('as'=>'purchase.publications', 'uses'=>'PurchaseController@publications', 'roles'=>['admin']));
});

Auth::routes(['register' => false]);

Route::get('/payment/{type}', array('as'=>'payment', 'uses'=>'PaymentController@payment'));

