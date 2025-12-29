<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\API\ModelAjaxSupportController;


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

Route::middleware('guest')->group(function () {

	Route::get('/', [\App\Http\Controllers\AuthenticateController::class, 'index',	])->name('auth.index');
	Route::get('/login', [\App\Http\Controllers\AuthenticateController::class, 'create',	])->name('auth.create');
	Route::get('/login', [\App\Http\Controllers\AuthenticateController::class, 'create',	])->name('login');
	Route::post('/login', [\App\Http\Controllers\AuthenticateController::class, 'store',	])->name('auth.store');
####################################################################
// ForgotPasswordController
	Route::get('/forgot', [\App\Http\Controllers\ForgotPasswordController::class, 'create',])->name('forgotpassword.create');
	Route::post('/forgot', [\App\Http\Controllers\ForgotPasswordController::class, 'store',])->name('forgotpassword.store');

####################################################################
// remote controller
	Route::get('/remoteusers', [\App\Http\Controllers\RemoteController::class, 'remoteusername',])->name('remote.user');
});

Route::middleware('auth')->group(function () {
	Route::get('/logout', [\App\Http\Controllers\AuthenticateController::class, 'destroy',])->name('auth.destroy');

####################################################################
 // controller
	Route::get('/home', [\App\Http\Controllers\HomeAuthController::class, 'home',])->name('homeauth.home');

####################################################################
// user controller
 	Route::get('user/index', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');

	Route::get('user/create', [\App\Http\Controllers\UserController::class, 'create',])->name('user.create');

	Route::post('user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
//
	Route::get('user/edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

	Route::patch('user/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');

	Route::delete('user/destroy/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

####################################################################
	Route::get('usergroup/create', [\App\Http\Controllers\UserGroupController::class, 'create'])->name('usergroup.create');
// usergroup controller
	Route::post('usergroup/store', [\App\Http\Controllers\UserGroupController::class, 'store'])->name('usergroup.store');

####################################################################
	Route::get('category/create', [\App\Http\Controllers\ProductCategoryController::class, 'create'])->name('category.create');
// product category controller
	Route::post('category/store', [\App\Http\Controllers\ProductCategoryController::class, 'store'])->name('category.store');

	Route::get('category/edit/{productCategory}', [\App\Http\Controllers\ProductCategoryController::class, 'edit'])->name('category.edit');

	Route::patch('category/update/{productCategory}', [\App\Http\Controllers\ProductCategoryController::class, 'update'])->name('category.update');

	Route::delete('category/destroy/{productCategory}', [\App\Http\Controllers\ProductCategoryController::class, 'destroy'])->name('category.destroy');

####################################################################
	Route::get('product/index', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

	Route::get('product/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
// product controller
	Route::post('product/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

	Route::get('product/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

	Route::patch('product/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

	Route::delete('product/destroy/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

####################################################################
	Route::get('productimage/create', [\App\Http\Controllers\ProductImageController::class, 'create'])->name('productimage.create');
// productImage controller
	Route::post('productimage/store', [\App\Http\Controllers\ProductImageController::class, 'store'])->name('productimage.store');

	Route::get('productimage/edit/{productImage}', [\App\Http\Controllers\ProductImageController::class, 'edit'])->name('productimage.edit');

	Route::patch('productimage/update/{productImage}', [\App\Http\Controllers\ProductImageController::class, 'update'])->name('productimage.update');

	Route::delete('productimage/destroy', [\App\Http\Controllers\ProductImageController::class, 'destroy'])->name('productimage.destroy');

####################################################################
	Route::get('banks/index', [\App\Http\Controllers\BanksController::class, 'index'])->name('banks.index');
// bank controller
	Route::get('banks/create', [\App\Http\Controllers\BanksController::class, 'create'])->name('banks.create');

	Route::post('banks/store', [\App\Http\Controllers\BanksController::class, 'store'])->name('banks.store');

	Route::get('banks/edit/{banks}', [\App\Http\Controllers\BanksController::class, 'edit'])->name('banks.edit');

	Route::patch('banks/update/{banks}', [\App\Http\Controllers\BanksController::class, 'update'])->name('banks.update');

	Route::get('banks/active/{banks}', [\App\Http\Controllers\BanksController::class, 'active'])->name('banks.active');

####################################################################
	Route::get('sales/index', [\App\Http\Controllers\SalesController::class, 'index'])->name('sales.index');
// sales controller
	Route::get('sales/create', [\App\Http\Controllers\SalesController::class, 'create'])->name('sales.create');

	Route::post('sales/store', [\App\Http\Controllers\SalesController::class, 'store'])->name('sales.store');

	Route::get('sales/edit/{sales}', [\App\Http\Controllers\SalesController::class, 'edit'])->name('sales.edit');

	Route::patch('sales/update/{sales}', [\App\Http\Controllers\SalesController::class, 'update'])->name('sales.update');

	Route::delete('sales/destroy/{sales}', [\App\Http\Controllers\SalesController::class, 'destroy'])->name('sales.destroy');

####################################################################
	Route::get('slippostage/index', [\App\Http\Controllers\SlipPostageController::class, 'index'])->name('slippostage.index');
// slipPostage controller
	Route::get('slippostage/create', [\App\Http\Controllers\SlipPostageController::class, 'create'])->name('slippostage.create');

	Route::post('slippostage/store', [\App\Http\Controllers\SlipPostageController::class, 'store'])->name('slippostage.store');

	Route::get('slippostage/edit/{slipPostage}', [\App\Http\Controllers\SlipPostageController::class, 'edit'])->name('slippostage.edit');

	Route::patch('slippostage/update/{slipPostage}', [\App\Http\Controllers\SlipPostageController::class, 'update'])->name('slippostage.update');

	Route::delete('slippostage/destroy', [\App\Http\Controllers\SlipPostageController::class, 'destroy'])->name('slippostage.destroy');

####################################################################
	Route::get('salesitems/index', [\App\Http\Controllers\SalesItemsController::class, 'index'])->name('salesitems.index');
// salesItems controller
	Route::get('salesitems/create', [\App\Http\Controllers\SalesItemsController::class, 'create'])->name('salesitems.create');

	Route::post('salesitems/store', [\App\Http\Controllers\SalesItemsController::class, 'store'])->name('salesitems.store');

	Route::get('salesitems/edit/{salesItems}', [\App\Http\Controllers\SalesItemsController::class, 'edit'])->name('salesitems.edit');

	Route::patch('salesitems/update/{salesItems}', [\App\Http\Controllers\SalesItemsController::class, 'update'])->name('salesitems.update');

	Route::delete('salesitems/destroy', [\App\Http\Controllers\SalesItemsController::class, 'destroy'])->name('salesitems.destroy');

####################################################################
	Route::get('payments/index', [\App\Http\Controllers\PaymentsController::class, 'index'])->name('payments.index');
// payments controller
	Route::get('payments/create', [\App\Http\Controllers\PaymentsController::class, 'create'])->name('payments.create');

	Route::post('payments/store', [\App\Http\Controllers\PaymentsController::class, 'store'])->name('payments.store');

	Route::get('payments/edit/{payments}', [\App\Http\Controllers\PaymentsController::class, 'edit'])->name('payments.edit');

	Route::patch('payments/update/{payments}', [\App\Http\Controllers\PaymentsController::class, 'update'])->name('payments.update');

	Route::delete('payments/destroy', [\App\Http\Controllers\PaymentsController::class, 'destroy'])->name('payments.destroy');

####################################################################
	Route::delete('slipnumbers/destroy', [\App\Http\Controllers\SlipNumbersController::class, 'destroy'])->name('slipnumbers.destroy');
// slipNumbers controller
	Route::post('slipnumbers/search', [\App\Http\Controllers\SlipNumbersController::class, 'search'])->name('slipnumbers.search');

####################################################################
	Route::get('taxes/index', [\App\Http\Controllers\TaxesController::class, 'index'])->name('taxes.index');
// taxes controller
	Route::get('taxes/create', [\App\Http\Controllers\TaxesController::class, 'create'])->name('taxes.create');

	Route::post('taxes/store', [\App\Http\Controllers\TaxesController::class, 'store'])->name('taxes.store');

	Route::get('taxes/edit/{taxes}', [\App\Http\Controllers\TaxesController::class, 'edit'])->name('taxes.edit');

	Route::patch('taxes/update/{taxes}', [\App\Http\Controllers\TaxesController::class, 'update'])->name('taxes.update');

	Route::get('taxes/destroy/{taxes}', [\App\Http\Controllers\TaxesController::class, 'destroy'])->name('taxes.destroy');

####################################################################
	Route::get('customers/index', [\App\Http\Controllers\CustomersController::class, 'index'])->name('customers.index');
// customers controller
	Route::get('customers/create', [\App\Http\Controllers\CustomersController::class, 'create'])->name('customers.create');

	Route::post('customers/store', [\App\Http\Controllers\CustomersController::class, 'store'])->name('customers.store');

	Route::get('customers/edit/{customers}', [\App\Http\Controllers\CustomersController::class, 'edit'])->name('customers.edit');

	Route::patch('customers/update/{customers}', [\App\Http\Controllers\CustomersController::class, 'update'])->name('customers.update');

	Route::delete('customers/destroy/{customers}', [\App\Http\Controllers\CustomersController::class, 'destroy'])->name('customers.destroy');

	Route::post('customers/search', [\App\Http\Controllers\CustomersController::class, 'search'])->name('customers.search');

####################################################################
	Route::get('preferences/index', [\App\Http\Controllers\PreferencesController::class, 'index'])->name('preferences.index');
// preferences controller
	Route::get('preferences/create', [\App\Http\Controllers\PreferencesController::class, 'create'])->name('preferences.create');

	Route::post('preferences/store', [\App\Http\Controllers\PreferencesController::class, 'store'])->name('preferences.store');

	Route::get('preferences/edit/{preferences}', [\App\Http\Controllers\PreferencesController::class, 'edit'])->name('preferences.edit');

	Route::patch('preferences/update/{preferences}', [\App\Http\Controllers\PreferencesController::class, 'update'])->name('preferences.update');

	Route::delete('preferences/destroy/{preferences}', [\App\Http\Controllers\PreferencesController::class, 'destroy'])->name('preferences.destroy');

####################################################################
	Route::get('printpdf/{sales}', [\App\Http\Controllers\PrintPDFController::class, 'print'])->name('printpdf.print');
// PrintPDF controller
	Route::get('emailpdf/{sales}', [\App\Http\Controllers\PrintPDFController::class, 'email_invoice'])->name('emailpdf.send');

	// Route::post('contactus', [\App\Http\Controllers\ContactUsController::class, 'email'])->name('contactus');
####################################################################
// contact us controller

	Route::get('printreport', [\App\Http\Controllers\PrintReportController::class, 'index'])->name('printreport.index');
####################################################################
	Route::post('printreport/store', [\App\Http\Controllers\PrintReportController::class, 'store'])->name('printreport.store');
// printreport controller
	Route::post('printreport/audit', [\App\Http\Controllers\PrintReportController::class, 'audit'])->name('printreport.audit');

	Route::post('printreport/payment', [\App\Http\Controllers\PrintReportController::class, 'payment'])->name('printreport.payment');

});

####################################################################
// API
Route::middleware(['auth'])->group(function () {
	Route::controller(ModelAjaxSupportController::class)->group(function () {
		Route::get('/getProducts', 'getProducts')->name('getProducts');
		Route::get('/getProductsdT', 'getProductsdT')->name('getProductsdT');
		Route::get('/getUser', 'getUser')->name('getUser');
		Route::get('/getCustomers', 'getCustomers')->name('getCustomers');
		Route::get('/getBanks', 'getBanks')->name('getBanks');
		Route::get('/getBanksT', 'getBanksT')->name('getBanksT');
		Route::get('/geSales', 'geSales')->name('geSales');
		Route::get('/getTaxes', 'getTaxes')->name('getTaxes');
	});
});

