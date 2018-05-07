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
// authenticate user
Auth::routes();

####################################################################
// AuthenticateController

Route::get('/', [
		'as' => 'auth.index',
		'uses' => 'AuthenticateController@index',
	]);

Route::get('/login', [
		'as' => 'auth.create',
		'uses' => 'AuthenticateController@create',
	]);

Route::get('/login', [
		'as' => 'login',
		'uses' => 'AuthenticateController@create',
	]);

Route::post('/login', [
		'as' => 'auth.store',
		'uses' => 'AuthenticateController@store',
	]);

Route::get('/logout', [
		'as' => 'auth.destroy',
		'uses' => 'AuthenticateController@destroy',
	]);
####################################################################
// ForgotPasswordController

Route::get('/forgot', [
		'as' => 'forgotpassword.create',
		'uses' => 'ForgotPasswordController@create',
	]);

Route::post('/forgot', [
		'as' => 'forgotpassword.store',
		'uses' => 'ForgotPasswordController@store',
	]);

####################################################################
// homeauth controller

Route::get('/home', [
		'as' => 'homeauth.home',
		'uses' => 'HomeAuthController@home',
	]);

####################################################################
// remote controller
Route::get('/remoteusers', [
		'as' => 'remote.user',
		'uses' => 'RemoteController@remoteusername',
	]);
####################################################################
// user controller

// Route::get('/index', [
// 		'as' => 'user.index',
// 		'uses' => 'UserController@index',
// 	]);

Route::get('user/create', [
		'as' => 'user.create',
		'uses' => 'UserController@create',
	]);

Route::post('user/store', [
		'as' => 'user.store',
		'uses' => 'UserController@store'
	]);

Route::get('user/edit/{user}', [
		'as' => 'user.edit',
		'uses' => 'UserController@edit'
	]);

Route::patch('user/update/{user}', [
		'as' => 'user.update',
		'uses' => 'UserController@update'
	]);

Route::delete('user/destroy/{user}', [
		'as' => 'user.destroy',
		'uses' => 'UserController@destroy'
	]);

####################################################################
// usergroup controller

Route::get('usergroup/create', [
		'as' => 'usergroup.create',
		'uses' => 'UserGroupController@create'
	]);

Route::post('usergroup/store', [
		'as' => 'usergroup.store',
		'uses' => 'UserGroupController@store'
	]);

####################################################################
// product category controller

Route::get('category/create', [
		'as' => 'category.create',
		'uses' => 'ProductCategoryController@create'
	]);

Route::post('category/store', [
		'as' => 'category.store',
		'uses' => 'ProductCategoryController@store'
	]);

Route::get('category/edit/{productCategory}', [
		'as' => 'category.edit',
		'uses' => 'ProductCategoryController@edit'
	]);

Route::patch('category/update/{productCategory}', [
		'as' => 'category.update',
		'uses' => 'ProductCategoryController@update'
	]);

Route::delete('category/destroy/{productCategory}', [
		'as' => 'category.destroy',
		'uses' => 'ProductCategoryController@destroy'
	]);

####################################################################
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

Route::delete('product/destroy/{product}', [
		'as' => 'product.destroy',
		'uses' => 'ProductController@destroy'
	]);

####################################################################
// productImage controller

Route::get('productimage/create', [
		'as' => 'productimage.create',
		'uses' => 'ProductImageController@create'
	]);

Route::post('productimage/store', [
		'as' => 'productimage.store',
		'uses' => 'ProductImageController@store'
	]);

Route::get('productimage/edit/{productImage}', [
		'as' => 'productimage.edit',
		'uses' => 'ProductImageController@edit'
	]);

Route::patch('productimage/update/{productImage}', [
		'as' => 'productimage.update',
		'uses' => 'ProductImageController@update'
	]);

Route::delete('productimage/destroy', [
		'as' => 'productimage.destroy',
		'uses' => 'ProductImageController@destroy'
	]);

####################################################################
// bank controller

Route::get('banks/index', [
		'as' => 'banks.index',
		'uses' => 'BanksController@index'
	]);

Route::get('banks/create', [
		'as' => 'banks.create',
		'uses' => 'BanksController@create'
	]);

Route::post('banks/store', [
		'as' => 'banks.store',
		'uses' => 'BanksController@store'
	]);

Route::get('banks/edit/{banks}', [
		'as' => 'banks.edit',
		'uses' => 'BanksController@edit'
	]);

Route::patch('banks/update/{banks}', [
		'as' => 'banks.update',
		'uses' => 'BanksController@update'
	]);

Route::get('banks/active/{banks}', [
		'as' => 'banks.active',
		'uses' => 'BanksController@active'
	]);

####################################################################
// sales controller

Route::get('sales/index', [
		'as' => 'sales.index',
		'uses' => 'SalesController@index'
	]);

Route::get('sales/create', [
		'as' => 'sales.create',
		'uses' => 'SalesController@create'
	]);

Route::post('sales/store', [
		'as' => 'sales.store',
		'uses' => 'SalesController@store'
	]);

Route::get('sales/edit/{sales}', [
		'as' => 'sales.edit',
		'uses' => 'SalesController@edit'
	]);

Route::patch('sales/update/{sales}', [
		'as' => 'sales.update',
		'uses' => 'SalesController@update'
	]);

Route::delete('sales/destroy/{sales}', [
		'as' => 'sales.destroy',
		'uses' => 'SalesController@destroy'
	]);
####################################################################
// slipPostage controller

Route::get('slippostage/index', [
		'as' => 'slippostage.index',
		'uses' => 'SlipPostageController@index'
	]);

Route::get('slippostage/create', [
		'as' => 'slippostage.create',
		'uses' => 'SlipPostageController@create'
	]);

Route::post('slippostage/store', [
		'as' => 'slippostage.store',
		'uses' => 'SlipPostageController@store'
	]);

Route::get('slippostage/edit/{slipPostage}', [
		'as' => 'slippostage.edit',
		'uses' => 'SlipPostageController@edit'
	]);

Route::patch('slippostage/update/{slipPostage}', [
		'as' => 'slippostage.update',
		'uses' => 'SlipPostageController@update'
	]);

Route::delete('slippostage/destroy', [
		'as' => 'slippostage.destroy',
		'uses' => 'SlipPostageController@destroy'
	]);

####################################################################
// salesItems controller

Route::get('salesitems/index', [
		'as' => 'salesitems.index',
		'uses' => 'SalesItemsController@index'
	]);

Route::get('salesitems/create', [
		'as' => 'salesitems.create',
		'uses' => 'SalesItemsController@create'
	]);

Route::post('salesitems/store', [
		'as' => 'salesitems.store',
		'uses' => 'SalesItemsController@store'
	]);

Route::get('salesitems/edit/{salesItems}', [
		'as' => 'salesitems.edit',
		'uses' => 'SalesItemsController@edit'
	]);

Route::patch('salesitems/update/{salesItems}', [
		'as' => 'salesitems.update',
		'uses' => 'SalesItemsController@update'
	]);

Route::delete('salesitems/destroy', [
		'as' => 'salesitems.destroy',
		'uses' => 'SalesItemsController@destroy'
	]);

####################################################################
// payments controller

Route::get('payments/index', [
		'as' => 'payments.index',
		'uses' => 'PaymentsController@index'
	]);

Route::get('payments/create', [
		'as' => 'payments.create',
		'uses' => 'PaymentsController@create'
	]);

Route::post('payments/store', [
		'as' => 'payments.store',
		'uses' => 'PaymentsController@store'
	]);

Route::get('payments/edit/{payments}', [
		'as' => 'payments.edit',
		'uses' => 'PaymentsController@edit'
	]);

Route::patch('payments/update/{payments}', [
		'as' => 'payments.update',
		'uses' => 'PaymentsController@update'
	]);

Route::delete('payments/destroy', [
		'as' => 'payments.destroy',
		'uses' => 'PaymentsController@destroy'
	]);

####################################################################
// slipNumbers controller

Route::delete('slipnumbers/destroy', [
		'as' => 'slipnumbers.destroy',
		'uses' => 'SlipNumbersController@destroy'
	]);

Route::post('slipnumbers/search', [
		'as' => 'slipnumbers.search',
		'uses' => 'SlipNumbersController@search'
	]);


####################################################################
// taxes controller

Route::get('taxes/index', [
		'as' => 'taxes.index',
		'uses' => 'TaxesController@index'
	]);

Route::get('taxes/create', [
		'as' => 'taxes.create',
		'uses' => 'TaxesController@create'
	]);

Route::post('taxes/store', [
		'as' => 'taxes.store',
		'uses' => 'TaxesController@store'
	]);

Route::get('taxes/edit/{taxes}', [
		'as' => 'taxes.edit',
		'uses' => 'TaxesController@edit'
	]);

Route::patch('taxes/update/{taxes}', [
		'as' => 'taxes.update',
		'uses' => 'TaxesController@update'
	]);

Route::get('taxes/destroy/{taxes}', [
		'as' => 'taxes.destroy',
		'uses' => 'TaxesController@destroy'
	]);

####################################################################
// customers controller

Route::get('customers/index', [
		'as' => 'customers.index',
		'uses' => 'CustomersController@index'
	]);

Route::get('customers/create', [
		'as' => 'customers.create',
		'uses' => 'CustomersController@create'
	]);

Route::post('customers/store', [
		'as' => 'customers.store',
		'uses' => 'CustomersController@store'
	]);

Route::get('customers/edit/{customers}', [
		'as' => 'customers.edit',
		'uses' => 'CustomersController@edit'
	]);

Route::patch('customers/update/{customers}', [
		'as' => 'customers.update',
		'uses' => 'CustomersController@update'
	]);

Route::delete('customers/destroy/{customers}', [
		'as' => 'customers.destroy',
		'uses' => 'CustomersController@destroy'
	]);

Route::post('customers/search', [
		'as' => 'customers.search',
		'uses' => 'CustomersController@search'
	]);

####################################################################
// preferences controller

Route::get('preferences/index', [
		'as' => 'preferences.index',
		'uses' => 'PreferencesController@index'
	]);

Route::get('preferences/create', [
		'as' => 'preferences.create',
		'uses' => 'PreferencesController@create'
	]);

Route::post('preferences/store', [
		'as' => 'preferences.store',
		'uses' => 'PreferencesController@store'
	]);

Route::get('preferences/edit/{preferences}', [
		'as' => 'preferences.edit',
		'uses' => 'PreferencesController@edit'
	]);

Route::patch('preferences/update/{preferences}', [
		'as' => 'preferences.update',
		'uses' => 'PreferencesController@update'
	]);

Route::delete('preferences/destroy/{preferences}', [
		'as' => 'preferences.destroy',
		'uses' => 'PreferencesController@destroy'
	]);

####################################################################
// PrintPDF controller

Route::get('printpdf/{sales}', [
		'as' => 'printpdf.print',
		'uses' => 'PrintPDFController@print'
	]);

Route::get('emailpdf/{sales}', [
		'as' => 'emailpdf.send',
		'uses' => 'PrintPDFController@email_invoice'
	]);


####################################################################
// contact us controller
Route::post('contactus', [
		'as' => 'contactus',
		'uses' => 'ContactUsController@email'
	]);

####################################################################
// printreport controller
Route::get('printreport', [
		'as' => 'printreport.index',
		'uses' => 'PrintReportController@index'
	]);

Route::post('printreport/store', [
		'as' => 'printreport.store',
		'uses' => 'PrintReportController@store'
	]);

Route::post('printreport/audit', [
		'as' => 'printreport.audit',
		'uses' => 'PrintReportController@audit'
	]);

Route::post('printreport/payment', [
		'as' => 'printreport.payment',
		'uses' => 'PrintReportController@payment'
	]);











