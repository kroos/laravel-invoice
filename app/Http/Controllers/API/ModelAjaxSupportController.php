<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

// for controller output
use Illuminate\Http\JsonResponse;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Http\Response;
// use Illuminate\View\View;

// models
use App\Models\{
	YesNoOption, ActivityLog, JobBatch, FileEntry
};

// load db facade
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

// load validation
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use {{ namespacedRequests }}

// load batch and queue
// use Illuminate\Bus\Batch;
// use Illuminate\Support\Facades\Bus;

// load email & notification
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;// more email

// load pdf
// use Barryvdh\DomPDF\Facade\Pdf;

// load helper
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

// load Carbon library
use \Carbon\Carbon;
use \Carbon\CarbonPeriod;
use \Carbon\CarbonInterval;

use Session;
use Throwable;
use Exception;
use Log;

class ModelAjaxSupportController extends Controller
{
	public function getProducts(Request $request): JsonResponse
	{
		$values = \App\ProductCategory::query()
								->with(['product' => function ($q) use ($request) {
									$q->with('productimage');

									if ($request->id) {
										$q->where('id', $request->id);
									}

									if ($request->idIn) {
										$q->whereNotIn('id', $request->idIn);
									}

									if ($request->search) {
										$q->where('product', 'LIKE', '%' . $request->search . '%');
									}
								}])
								->when($request->search, function ($query) use ($request) {
									$query->where('product_category', 'LIKE', '%' . $request->search . '%')
									->orWhereHas('product', function ($q) use ($request) {
										$q->where('product', 'LIKE', '%' . $request->search . '%');
									});
								})
								->when($request->id, function ($query) use ($request) {
									$query->whereHas('product', function ($q) use ($request) {
										$q->where('id', $request->id);
									});
								})
								->get();
		return response()->json($values);
	}

	public function getProductsdT(Request $request)
	{
		$values = \App\Product::with(['category', 'productimage'])
														->when($request->id, function ($query) use ($request) {
															$query->where('id', $request->id);
														})
														->when($request->search, function ($query) use ($request) {
															$query->where('product', 'LIKE', '%' . $request->search . '%');
														})
														->get();
		return response()->json($values);
	}

	public function getUser(Request $request)
	{
		// dd(auth()->user(), session()->all(), auth('web')->check());
		$userId = auth()->user()->id_group == 1
							? $request->id
							: auth()->user()->id;

		$values = \App\UserGroup::when($userId, function($query) use ($userId) {
														$query->whereHas('users', fn ($q) =>
															$q->where('id', $userId)
												    );
													})
													->when($request->search, function($query) use ($request) {
														$query->whereHas('users', function ($q)  use ($request) {
															$q->where('name', 'LIKE', '%'.$request->search.'%');
														});
													})

											    ->with('users', function ($q1) use ($userId) {
											    	$q1->when($userId, function($q2) use ($userId) {
											        $q2->where('id', $userId);
											    	});
											    })

											    ->with('users', function ($q1) use ($request) {
											    	$q1->when($request->search, function($q2) use ($request) {
											    		$q2->where('name', 'LIKE', '%'.$request->search.'%');
											    	});
											    })

													->get();
		return response()->json($values);
	}

	public function geSales(Request $request)
	{
		$values = \App\Sales::query()
								->with([
									'slippostageimage',
									'customer',
									'slipnumber',
									'salestaxes',
									'salespayment',
									'invuser',
									'invitems' => fn ($q) =>
										$request->idii ? $q->where('id', $request->idii) : null,
								])
								->when($request->id, fn ($q) =>
									$q->where('id', $request->id)
								)
								->when($request->user, fn ($q) =>
									$q->where('id_user', $request->user)
								)
								->when($request->idii, fn ($q) =>
									$q->whereHas('invitems', fn ($q2) => $q2->where('id', $request->idii))
								)
								->get();

		return response()->json($values);
	}

	public function getCustomers(Request $request)
	{
		$values = \App\Customers::when($request->search, function($q) use ($request) {
															$q->where('client', 'LIKE', '%'.$request->search.'%');
														})
														->when($request->id, function($q) use ($request) {
															$q->where('id', $request->id);
														})
														->get();
		return response()->json($values);
	}

	public function getBanks(Request $request)
	{
		$values = \App\Banks::where('active', 1)
													->when($request->search, function($q) use ($request) {
															$q->where('bank', 'LIKE', '%'.$request->search.'%');
														})
														->when($request->id, function($q) use ($request) {
															$q->where('id', $request->id);
														})
														->when($request->idIn, function($q) use ($request) {
															$q->whereNotIn('id', $request->idIn);
														})
														->get();

		return response()->json($values);
	}

	public function getBanksT(Request $request)
	{
		$values = \App\Banks::when($request->search, function($q) use ($request) {
															$q->where('bank', 'LIKE', '%'.$request->search.'%');
														})
														->when($request->id, function($q) use ($request) {
															$q->where('id', $request->id);
														})
														->when($request->idIn, function($q) use ($request) {
															$q->whereNotIn('id', $request->idIn);
														})
														->get();

		return response()->json($values);
	}

	public function getTaxes(Request $request)
	{
		$values = \App\Taxes::when($request->search, function($q) use ($request) {
															$q->where('tax', 'LIKE', '%'.$request->search.'%');
														})
														->when($request->id, function($q) use ($request) {
															$q->where('id', $request->id);
														})
														->when($request->idIn, function($q) use ($request) {
															$q->whereNotIn('id', $request->idIn);
														})
														->get();

		return response()->json($values);
	}

}
