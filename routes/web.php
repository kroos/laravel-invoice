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

Route::get('categories/create', [
		'as' => 'categories.create',
		'uses' => 'CategoriesController@create'
	]);

Route::post('categories/store', [
		'as' => 'categories.store',
		'uses' => 'CategoriesController@store'
	]);

Route::get('categories/edit/{categories}', [
		'as' => 'categories.edit',
		'uses' => 'CategoriesController@edit'
	]);

Route::patch('categories/update/{categories}', [
		'as' => 'categories.update',
		'uses' => 'CategoriesController@update'
	]);

Route::get('categories/destroy/{categories}', [
		'as' => 'categories.destroy',
		'uses' => 'CategoriesController@destroy'
	]);

#####################################################################################
// usergroup controller

Route::get('usergroup/create', [
		'as' => 'usergroup.create',
		'uses' => 'UserGroupController@create'
	]);

Route::post('usergroup/store', [
		'as' => 'usergroup.store',
		'uses' => 'UserGroupController@store'
	]);

#####################################################################################
// user controller

Route::get('users/create', [
		'as' => 'user.create',
		'uses' => 'UserController@create'
	]);

Route::post('users/store', [
		'as' => 'user.store',
		'uses' => 'UserController@store'
	]);

Route::get('users/edit/{users}', [
		'as' => 'user.edit',
		'uses' => 'UserController@edit'
	]);

Route::patch('users/update/{users}', [
		'as' => 'user.update',
		'uses' => 'UserController@update'
	]);

Route::delete('users/destroy/{users}', [
		'as' => 'user.destroy',
		'uses' => 'UserController@destroy'
	]);

#####################################################################################
// sessions controller

Route::get('/', [
		'as' => 'sessions.index',
		'uses' => 'SessionsController@index'
	]);

Route::get('/login1', [
		'as' => 'login',
		'uses' => 'SessionsController@create'
	]);


Route::post('/login1', [
		'as' => 'sessions.store',
		'uses' => 'SessionsController@store'
	]);

Route::get('/logout2', [
		'as' => 'sessions.destroy',
		'uses' => 'SessionsController@destroy'
	]);

#####################################################################################
// product controller

Route::get('product/create', [
		'as' => 'product.create',
		'uses' => 'ProductController@create'
	]);

Route::post('product/store', [
		'as' => 'product.store',
		'uses' => 'ProductController@store'
	]);

Route::get('product/edit/{product}', [
		'as' => 'product.edit',
		'uses' => 'ProductController@edit'
	]);

Route::patch('product/update/{product}', [
		'as' => 'product.update',
		'uses' => 'ProductController@update'
	]);

Route::get('product/destroy/{product}', [
		'as' => 'product.destroy',
		'uses' => 'ProductController@destroy'
	]);

#####################################################################################
// transaction controller

// Route::get('/home', [
// 		'as' => 'transactions.index',
// 		'uses' => 'TransactionsController@index'
// 	]);

Route::get('transactions/create', [
		'as' => 'transactions.create',
		'uses' => 'TransactionsController@create'
	]);

Route::get('transactions/print', [
		'as' => 'transactions.print',
		'uses' => 'TransactionsController@print'
	]);

Route::post('transactions/store', [
		'as' => 'transactions.store',
		'uses' => 'TransactionsController@store'
	]);

Route::post('transactions/print', [
		'as' => 'transactions.printstore',
		'uses' => 'TransactionsController@printstore'
	]);

Route::get('transactions/edit/{transactions}', [
		'as' => 'transactions.edit',
		'uses' => 'TransactionsController@edit'
	]);

Route::patch('transactions/update/{transactions}', [
		'as' => 'transactions.update',
		'uses' => 'TransactionsController@update'
	]);

Route::get('transactions/destroy/{transactions}', [
		'as' => 'transactions.destroy',
		'uses' => 'TransactionsController@destroy'
	]);

Auth::routes();

Route::get('/home', 'HomeController@index');
