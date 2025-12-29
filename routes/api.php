<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\API\ModelAjaxSupportController;

Route::middleware(['auth', 'auth:sanctum'])->group(function () {

	// Route::controller(ModelAjaxSupportController::class)->group(function () {
	// 	Route::get('/getProducts', 'getProducts')->name('getProducts');
	// 	Route::get('/getUser', 'getUser')->name('getUser');
	// 	Route::get('/geSales', 'geSales')->name('geSales');
	// });


});


