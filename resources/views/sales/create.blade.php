@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')


<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Invoice</div>
		<div class="panel-body">
			<div class="col-lg-12">

			{!! Form::open(['route' => 'sales.store', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true, 'id' => 'form']) !!}
				@if( auth()->user()->id_group == 1 )
					<?php
					$user = App\User::all();
					foreach ($user as $key) {
						$k[$key->id] = $key->name;
					}
					?>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">User</div>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="form-group {!! (count($errors->get('id_user'))) > 0 ? 'has-error' : '' !!}">
											{!! Form::label('us', 'User :', ['class' => 'control-label col-lg-2']) !!}
											<div class="col-lg-10">
												{!! Form::select('id_user', $k, @$value, ['placeholder' => 'Choose User', 'class' => 'form-control', 'id' => 'us']) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@else
				{!! Form::hidden('id_user' , auth()->user()->id) !!}
				@endif
				
				<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">Postage Slip</div>
						<div class="panel-body">
				
							<div class="form-group {!! ( count($errors->get('date_sale')) ) >0 ? 'has-error' : '' !!}">
								{!! Form::label('da', 'Date :', ['class' => 'col-sm-5 control-label']) !!}
								<div class="col-sm-7">
									{!! Form::input('text', 'date_sale', @$value, ['class' => 'form-control date', 'placeholder' => 'Date', 'id' => 'da']) !!}
								</div>
							</div>

							<div class="serial_wrap">
								<div class="form-group <?php echo ( count($errors->get('serial.*.tracking_number'))  > 0 ) ? 'has-error' : '' ?> rowserial">
									<button type="button" class="btn btn-danger col-lg-1 remove_serial">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>{!! Form::label('catel', 'Receipt or Postage Tracking :', ['class' => 'col-sm-4 control-label']) !!}
									<div class="col-sm-7">
										{!! Form::input('text', 'serial[][tracking_number]', @$value, ['class' => 'form-control tracking_number', 'placeholder' => 'Receipt or Tracking Serial Number', 'id' => 'catel']) !!}
									</div>
								</div>
							</div>

							<!-- for adding and remove row -->
							<div class="serial_wrap hide" id="optionTemplate">
								<div class="form-group <?php echo ( count($errors->get('serial.*.tracking_number'))  > 0 ) ? 'has-error' : '' ?> rowserial">
									<button type="button" class="btn btn-danger col-lg-1 remove_serial">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>{!! Form::label('catel', 'Receipt or Postage Tracking :', ['class' => 'col-sm-4 control-label']) !!}
									<div class="col-sm-7">
										{!! Form::input('text', 'serial[][tracking_number]', @$value, ['class' => 'form-control tracking_number', 'placeholder' => 'Receipt or Tracking Serial Number', 'id' => 'catel']) !!}
									</div>
								</div>
							</div>
							<!-- adding and remove row ends -->

							<!-- button add -->
							<p>
								<button class="add_serial btn btn-primary" type="button">
									<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Postage Tracking
								</button>
							</p>

							<div class="form-group <?php echo ( count( $errors->get('image.*') )  > 0  )? 'has-error' : '' ?>">
								{!! Form::label('img', 'Receipt or Postage Slip Image :', ['class' => 'col-sm-5 control-label']) !!}
								<div class="col-sm-7">
									{!! Form::file('image[]', ['id' => 'img', 'multiple' => 'multiple']) !!}
								</div>
							</div>
				
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">Customer</div>
						<div class="panel-body">

							<p class="text-justify">Please fill up only 1 section. Select your <span style="color: red;">Returning Customer</span> or <span style="color: red;">New Customer</span>, but please dont fill both section.</p>
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">Returning Customer</div>
										<div class="panel-body">
											<div class="form-group <?php echo ( count($errors->get('repeatcust'))  > 0 ) ? 'has-error' : '' ?>">
												<label for="custsel" class="col-sm-3 control-label">Select Existing Customer : </label>
												<div class="col-sm-9">
													<select name="repeatcust" id="custsel" class="form-control">
														<option value="" data-client="" data-client_address="" data-client_poskod="" data-client_email="" data-client_phone="" >Choose Customer</option>
														<?php $rc = \App\Customers::all() ?>
														@if( $rc->count() > 0 )
														@foreach( $rc as $ec ) :
															<option value="{!! $ec->id !!}" data-client="{!! $ec->client !!}" data-client_address="{!! $ec->client_address !!}" data-client_poskod="{!! $ec->client_poskod !!}" data-client_email="{!! $ec->client_email !!}" data-client_phone="{!! $ec->client_phone !!}" {!! ( $ec->id == old('repeatcust') )? 'selected="selected"' : '' !!} >{!! $ec->client !!}</option>
														@endforeach
														@endif
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="rt" class="col-sm-3 control-label" >Customer Info :</label>
												<div class="col-sm-9">
													<span id="client"></span>
													<br />
													<span id="address"></span>
													<br />
													<span id="poskod"></span>
													<br />
													<span id="phone"></span>
													<br />
													<span id="email"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">New Customer</div>
										<div class="panel-body">
											<div class="form-group {!! ( count($errors->get('client'))  > 0 )? 'has-error' : '' !!}">
												{!! Form::label('pel', 'Customer :', ['class' => 'col-sm-3 control-label']) !!}
												<div class="col-sm-9">
													{!! Form::input('text', 'client', @$value, ['class' => 'form-control', 'placeholder' => 'Customer', 'id' => 'pel']) !!}
												</div>
											</div>
											<div class="form-group {!! ( count($errors->get('client_address')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('apel', 'Customer Address :', ['class' => 'col-sm-3 control-label']) !!}
												<div class="col-sm-9">
													{!! Form::textarea('client_address', @$value, ['class' => 'form-control', 'placeholder' => 'Customer Address', 'id' => 'apel']) !!}
												</div>
											</div>
											<div class="form-group {!! ( count($errors->get('client_poskod')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('pos', 'Postcode :', ['class' => 'col-sm-3 control-label']) !!}
												<div class="col-sm-9">
													{!! Form::input('text', 'client_poskod', @$value, ['class' => 'form-control', 'placeholder' => 'Postcode', 'id' => 'pos']) !!}
												</div>
											</div>
											<div class="form-group {!! ( count($errors->get('client_phone')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('tel', 'Phone :', ['class' => 'col-sm-3 control-label']) !!}
												<div class="col-sm-9">
													{!! Form::input('text', 'client_phone', @$value, ['class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'tel']) !!}
												</div>
											</div>
											<div class="form-group {!! ( count($errors->get('client_email')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('tela', 'Email :', ['class' => 'col-sm-3 control-label']) !!}
												<div class="col-sm-9">
													{!! Form::input('text', 'client_email', @$value, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'tela']) !!}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Add Invoice Item</div>
						<div class="panel-body">
				
							<div class="col-lg-12 input_fields_wrap">

<!-- option template -->
<div class="row inv hide" id="rowinvoice">
	<div class="col-sm-12">
		<div class="col-sm-1">
			<div class="row">
				<div class="col-sm-12">
					<button class="btn btn-danger remove_field" type="button">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="row">
				<div class="col-sm-12 form-group <?php echo ( count($errors->get('inv.*.id_product')) ) >0 ? 'has-error' : '' ?>">
					<select name="inv[][id_product]" class="series form-control" id="selectseries">
						<option value="">Choose Product</option>

						<?php $cate = App\ProductCategory::where(['active' => 1])->get(); ?>
						@foreach ($cate as $key)
							<optgroup label="{!! $key->product_category !!}">
								<?php $pro = App\Product::where(['id_category' => $key->id, 'active' => 1])->get() ?>
								@foreach($pro as $r)
									<option value="{!! $r->id !!}" data-commission="{!! $r->commission !!}" data-retail="{!! $r->retail !!}">{!! $r->product !!}</option>
								@endforeach
							</optgroup>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="row">
				<div class="col-sm-12 form-group {!! ( count($errors->get('inv.*.commission')) ) >0 ? 'has-error' : '' !!}">
					<input <?=(auth()->user()->id_group == 1)? 'type="text"' : 'type="hidden"' ?> name="inv[][commission]" class="comm form-control" placeholder="Commission (RM)" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="row">
				<div class="col-sm-12 form-group {!! ( count($errors->get('inv.*.retail')) ) >0 ? 'has-error' : '' !!}">
					<input type="text" name="inv[][retail]" class="rate form-control" placeholder="Retail (RM)"/>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="row">
				<div class="col-sm-12 form-group {!! ( count($errors->get('inv.*.quantity')) ) >0 ? 'has-error' : '' !!}">
					<input type="text" name="inv[][quantity]" class="quan form-control" placeholder="Quantity" />
				</div>
			</div>
		</div>
		<div class="col-sm-1">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-right"><span class="total_price">0.00</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end option template -->
							</div>
				
							<div class="col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-md-4 col-md-offset-8">

										<div class="row">
											<div class="col-lg-12">
												<div class="col-xs-2">
													<p><strong>Tax</strong></p>
												</div>
												<div class="col-xs-6">
													<p>
														<select name="tax[]" id="taxs" multiple="multiple" placeholder="Choose Tax">
															@foreach(App\Taxes::all() as $r) :
															<option value="{!! $r->id !!}" data-amount="{!! $r->amount !!}" >{!! $r->tax !!}</option>
															@endforeach
														</select>
													</p>
												</div>
												<div class="col-xs-4 text-right">
													<p><strong id="total_tax">0.00</strong>%</p>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-12">
												<div class="col-xs-8">
													<p><strong>Total Amount</strong></p>
												</div>
												<div class="col-xs-4 text-right">
													<p>RM<strong id="total_amount">0.00</strong></p>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="col-lg-12">

								<!-- add button -->
								<p>
									<button class="btn btn-primary add_field" type="button">
									<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Products
									</button>
								</p>

							</div>
						</div>
					</div>
				</div>
				</div>

				<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">AddPayment</div>
						<div class="panel-body">

							<div class="col-lg-12">
								<div class="col-lg-12 payment_wrap">

<!-- option template -->
<div class="row rowpayment hide" id="optionpayment">
	<div class="col-sm-12">
		<div class="col-sm-1">
			<div class="row">
				<div class="col-sm-12">
					<button class="btn btn-danger remove_payment" type="button">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-12 form-group <?php echo ( count($errors->get('pay.*.id_bank')) ) >0 ? 'has-error' : '' ?>">
					<select name="pay[][id_bank]" class="form-control">
						<option value="">Choose Bank</option>
						<?php $ba = App\Banks::where(['active' => 1])->get(); ?>
						@foreach ($ba as $r)
						<option value="{!! $r->id !!}" >{!! $r->bank !!}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="row">
				<div class="col-sm-12 form-group {!! ( count($errors->get('pay.*.date_payment')) ) >0 ? 'has-error' : '' !!}">
					<input type="text" name="pay[][date_payment]" class="form-control date" id="date_paym" placeholder="Date Payment"/>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="row">
				<div class="col-sm-12 form-group {!! ( count($errors->get('pay.*.amount')) ) >0 ? 'has-error' : '' !!}">
					<input type="text" name="pay[][amount]" class="pamount form-control" placeholder="Amount (RM)"/>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end option template -->
								</div>
								<div class="col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-md-3 col-md-offset-9">
											<div class="col-xs-8">
												<p><strong>Total Payment</strong></p>
											</div>
											<div class="col-xs-4 text-right">
												<p>RM<strong id="total_payment">0.00</strong></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-3 col-md-offset-9">
											<div class="col-xs-8">
												<p><strong>Balance</strong></p>
											</div>
											<div class="col-xs-4 text-right">
												<p>RM<strong id="balance">0.00</strong></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<p>
										<!-- add button -->
										<button class="btn btn-primary add_payment" type="button">
											<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Payment
										</button>
									</p>
								</div>
							</div>

						</div>
					</div>
				</div>
				</div>

				<!-- end here -->
				<div class="form-group col-lg-12">
					<div class="col-sm-offset-2 col-sm-10">
						<p>{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}</p>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection


@section('jquery')
////////////////////////////////////////////////////////////////////////////////////
// ucwords input
$(document).on('keyup', '#pel', function () {
// $("input").keyup(function() {
	tch(this);
});

////////////////////////////////////////////////////////////////////////////////////
// uppercase input for tracking number and customer section
$(document).on('keyup', '#apel, #catel', function () {
	uch(this);
});

////////////////////////////////////////////////////////////////////////////////////
// date input helper
	$('#da').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : true,
		// startDate: '<?= 1 - (date('j', mktime(0, 0, 0, date('m'), 0, date('Y'))) + date('j') ) ?>d',
		// endDate: '<?= (date('j') == 1) ? 1 - date('j') : 0 - date('j') ?>d',
	})
	// https://bootstrap-datepicker.readthedocs.io/en/latest/events.html
	.on('changeDate show', function(e) {
		$('#form').bootstrapValidator('revalidateField', 'date_sale');
	});

////////////////////////////////////////////////////////////////////////////////////
// date input payment
$(document).on('mouseenter', '#date_paym', function () {
	// $('#date_paym').datepicker({
	$(this).datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : true
	})
})
	// https://bootstrap-datepicker.readthedocs.io/en/latest/events.html
	.on('changeDate show', function(e) {
		$('#form').bootstrapValidator('revalidateField', 'pay[][date_payment]');
	});

////////////////////////////////////////////////////////////////////////////////////
// obsolote, found better way doing this
// slip serial number : add and remove row
// var add_buttons	= $(".add_serial");
// var wrappers	= $(".serial_wrap");

// var xs = 1;
// $(add_buttons).click(function(){
// 	// e.preventDefault();
// 	xs++;
// 	wrappers.append(
// 		'<div class="form-group <?php echo ( count($errors->get('serial.*.tracking_number')) ) > 0 ? 'has-error' : '' ?> rowserial" id="optionTemplate">' +
// 			'<button type="button" class="btn btn-danger col-lg-1 remove_serial">-</button>{!! Form::label('catel', 'Receipt or Postage Tracking :', ['class' => 'col-sm-4 control-label']) !!}' +
// 			'<div class="col-sm-7">' +
// 				'<input type="text" name="serial[][tracking_number]" value="{!! @$value !!}" class="form-control tracking_number" placeholder="Receipt or Tracking Serial Number" id="catel" data-id=" + xs +" />' +
// 			'</div>' +
// 		'</div>'
// 	); //add input box
// });

// $(wrappers).on("click",".remove_serial", function(e){
// 	//user click on remove text
// 	e.preventDefault();
// 	$(this).parent('.rowserial').remove();
// })

////////////////////////////////////////////////////////////////////////////////////
// helper tax 
$(document).on('change', '#taxs', function () {
	var se=0;
	var arr = [];
 	$('#taxs :selected').each(function(){
		se += ((($(this).data('amount')) * 1000) / 1000);
		arr.push( $(this).data('amount') );
	});
	var er = 0;
	for (var i = arr.length - 1; i >= 0; i--) {
		er += ((arr[i] * 100) / 100);
	}
	//console.log(er);
	//console.log(se);
	$('#total_tax').text( er );

	// update each time user change the value
	update_tamount();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// selecting series will auto populate comm and rate
// $('#custsel').change(function() {		<---- cant use it for append
$(document).on('change', '#custsel', function () {
	selectedOption = $('option:selected', this);
	var client = $('#client');
	var address = $('#address');
	var poskod = $('#poskod');
	var email = $('#email');
	var phone = $('#phone');

	$(client).text( selectedOption.data('client') );
	$(address).text( selectedOption.data('client_address') );
	$(poskod).text( selectedOption.data('client_poskod') );
	$(email).text( selectedOption.data('client_email') );
	$(phone).text( selectedOption.data('client_phone') );
});

////////////////////////////////////////////////////////////////////////////////////
// helper NaN
function num(obj) {
	var mystring = obj.value;
	if( !isNaN(mystring) == false ){
		mystring = 0;
	}
	return mystring;
}

////////////////////////////////////////////////////////////////////////////////////
// adding and removing rows for invoice items
// var add_button	= $(".add_field");
var wrapper		= $(".input_fields_wrap");
// var x = 1;
// $(add_button).click(function(){
// 	x++;
// 	$(wrapper).append(
// 		'<div class="row rowinvoice">' +
// 			'<div class="col-sm-12">' +
// 				'<div class="col-sm-1">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12">' +
// 							'<button class="btn btn-danger remove_field" type="button">-</button>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-4">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12 form-group <?php echo ( count($errors->get('inv.*.id_product')) ) >0 ? 'has-error' : '' ?>">' +
// 							'<select name="inv[' + x + '][id_product]" class="series form-control" onload="select2()">' +
// 								'<option value="">Choose Product</option>' +
// 
// 								<?php $cate = App\ProductCategory::where(['active' => 1])->get(); ?>
// 								@foreach ($cate as $key)
// 									'<optgroup label="{!! $key->product_category !!}">' +
// 										<?php $pro = App\Product::where(['id_category' => $key->id, 'active' => 1])->get() ?>
// 										@foreach($pro as $r)
// 											'<option value="{!! $r->id !!}" data-commission="{!! $r->commission !!}" data-retail="{!! $r->retail !!}">{!! $r->product !!}</option>' +
// 										@endforeach
// 									'</optgroup>' +
// 								@endforeach
// 							'</select>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-2">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12 form-group {!! ( count($errors->get('inv.*.commission')) ) >0 ? 'has-error' : '' !!}">' +
// 							'<input <?=(auth()->user()->id_group == 1)? 'type="text"' : 'type="hidden"' ?> name="inv[' + x + '][commission]" class="comm form-control" placeholder="Commission (RM)" />' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-2">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12 form-group {!! ( count($errors->get('inv.*.retail')) ) >0 ? 'has-error' : '' !!}">' +
// 							'<input type="text" name="inv[' + x + '][retail]" class="rate form-control" placeholder="Retail (RM)"/>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-2">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12 form-group {!! ( count($errors->get('inv.*.quantity')) ) >0 ? 'has-error' : '' !!}">' +
// 							'<input type="text" name="inv[' + x + '][quantity]" class="quan form-control" placeholder="Quantity" />' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-1">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12">' +
// 							'<p class="text-right"><span class="total_price">0.00</span></p>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 			'</div>' +
// 		'</div>'
// 	); //add input box
// });

$(wrapper).on("click",".remove_field", function(e){
	//user click on remove text
	e.preventDefault();
	// $(this).parent().parent().parent().parent().parent('.rowinvoice').css({"color": "red", "border": "2px solid red"});
	// $(this).parent().parent().parent().parent().parent('.rowinvoice').remove();

	// update total amount
	update_tamount();
	update_balance();
})

////////////////////////////////////////////////////////////////////////////////////
// selecting series will auto populate comm and rate
// $('.series').change(function() {		<---- cant use it for append
$(document).on('change', '.series', function () {
	selectedOption = $('option:selected', this);
	var comm = $(this).parent().parent().parent().parent().children().children().children().children('.comm');
	var rate = $(this).parent().parent().parent().parent().children().children().children().children('.rate');
	var quan = $(this).parent().parent().parent().parent().children().children().children().children('.quan');
	var total_price = $(this).parent().parent().parent().parent().children().children().children().children().children('.total_price');

	$(comm).val( selectedOption.data('commission') );
	$(rate).val( selectedOption.data('retail') );

	// check if its (Not A Number)
	// num( this );

	// update total_price
	// $(total_price).text( ((selectedOption.data('retail') * 10) * ($(quan).val() * 10)) / 100 );

	// console.log( num($(quan).val()) );
	// console.log( num( selectedOption.data('retail') ) );

	$(total_price).text( (((selectedOption.data('retail') * 10) * ( $(quan).val() * 10)) / 100).toFixed(2) );

	// update total amount
	update_tamount();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// payment add and remove payment row
// var add_buttonp	= $(".add_payment");
var wrapperp		= $(".payment_wrap");
// var xp = 1;
// $(add_buttonp).click(function(){
// 	xp++;
// 	$(wrapperp).append(
// 		'<div class="row rowpayment">' +
// 			'<div class="col-sm-12">' +
// 				'<div class="col-sm-1">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12">' +
// 							'<button class="btn btn-danger remove_payment" type="button">-</button>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-6">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12 form-group <?php echo ( count($errors->get('pay.*.id_bank')) ) >0 ? 'has-error' : '' ?>">' +
// 							'<select name="pay[' + xp + '][id_bank]" class="form-control">' +
// 								'<option value="">Choose Bank</option>' +
// 								<?php $ba = App\Banks::where(['active' => 1])->get(); ?>
// 								@foreach ($ba as $r)
// 								'<option value="{!! $r->id !!}" >{!! $r->bank !!}</option>' +
// 								@endforeach
// 							'</select>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-2">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12 form-group {!! ( count($errors->get('pay.*.date_payment')) ) >0 ? 'has-error' : '' !!}">' +
// 							'<input type="text" name="pay[' + xp + '][date_payment]" class="form-control date" placeholder="Date Payment"/>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 				'<div class="col-sm-3">' +
// 					'<div class="row">' +
// 						'<div class="col-sm-12 form-group {!! ( count($errors->get('pay.*.amount')) ) >0 ? 'has-error' : '' !!}">' +
// 							'<input type="text" name="pay[' + xp + '][amount]" class="pamount form-control" placeholder="Amount (RM)"/>' +
// 						'</div>' +
// 					'</div>' +
// 				'</div>' +
// 			'</div>' +
// 		'</div>'
// 	); //add input box
// });

$(wrapperp).on("click",".remove_payment", function(e){
	//user click on remove text
	// e.preventDefault();
	// $(this).parent().parent().parent().parent().parent('.rowpayment').remove();

	// update total payment
	update_tpayment();
	update_balance();
})

////////////////////////////////////////////////////////////////////////////////////
// keyup on input rate to sum up all the price
$(document).on('keyup', '.rate', function () {
	var comm = $(this).parent().parent().parent().parent().children().children().children().children('.comm');
	var rate = $(this).parent().parent().parent().parent().children().children().children().children('.rate');
	var quan = $(this).parent().parent().parent().parent().children().children().children().children('.quan');
	var total_price = $(this).parent().parent().parent().parent().children().children().children().children().children('.total_price');

	// check if its (Not A Number)
	// console.log( num( this ) );

	// $(total_price).text( (($(rate).val() * 10) * ($(quan).val() * 10)) / 100 );
	$(total_price).text( (((num( this ) * 10) * ($(quan).val() * 10)) / 100).toFixed(2) );

	update_tamount();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// keyup on input quan to sum up all the price
$(document).on('keyup', '.quan', function () {
	var comm = $(this).parent().parent().parent().parent().children().children().children().children('.comm');
	var rate = $(this).parent().parent().parent().parent().children().children().children().children('.rate');
	var quan = $(this).parent().parent().parent().parent().children().children().children().children('.quan');
	var total_price = $(this).parent().parent().parent().parent().children().children().children().children().children('.total_price');

	// check if its (Not A Number)
	// console.log( num( this ) );

	// $(total_price).text( (($(rate).val() * 10) * ($(quan).val() * 10)) / 100 );
	$(total_price).text( ((($(rate).val() * 10) * (num( this ) * 10)) / 100).toFixed(2) );

	update_tamount();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// keyup on input pamount to sum up all the price
$(document).on('keyup', '.pamount', function () {
	update_tpayment();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// helper total amount
function update_tamount() {
	var tax = $("#total_tax").text();
	var myNodelist = $(".total_price");
	var ssum = 0;
	var stsum = 0;
	for (var i = myNodelist.length - 1; i >= 0; i--) {
		// myNodelist[i].style.backgroundColor = "red";
		ssum = (((ssum * 100) + (myNodelist[i].innerHTML * 100)) / 100);	//make sure the process is accurate
		stsum = ssum + (ssum * ((tax * 100) / 10000));
		//console.log(ssum);
	}
	$('#total_amount').text( stsum.toFixed(2) );
}

////////////////////////////////////////////////////////////////////////////////////
// helper total payment
function update_tpayment() {
	var myNodelistp = $(".pamount");
	var psum = 0;
	for (var ip = myNodelistp.length - 1; ip >= 0; ip--) {
		// myNodelistp[ip].style.backgroundColor = "red";
		psum = ((psum * 10000) + (myNodelistp[ip].value * 10000)) / 10000;	//make sure the process is accurate
		// console.log(psum);
		// console.log(myNodelistp[ip].value);
	}
	$('#total_payment').text( psum.toFixed(2) );
};

////////////////////////////////////////////////////////////////////////////////////
// helper balance
function update_balance() {
	var ta = $('#total_amount');	// amount invoice
	var tp = $('#total_payment');
	var bal = ( ( $(tp).text() * 10000 ) - ( $(ta).text() * 10000 ) )/10000;
	
	// console.log($(tp).text());
	if (bal == 0) {
		$('#balance').text( bal.toFixed(2) ).css({"color": "blue"});
	} else {
		if (bal < 0) {
			$('#balance').text( bal.toFixed(2) ).css({"color": "red"});
		} else {
			$('#balance').text( bal.toFixed(2) ).css({"color": "green"});
		}
	}
};

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
var MAX_OPTIONS = 500;

$('#form').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		id_user: {
			validators: {
				notEmpty: {
					message: 'Please choose user.'
				},
			}
		},
		date_sale: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					format: 'YYYY-MM-DD',
					message: 'The date format is not valid. '
				}
			}
		},

		'serial[][tracking_number]': {
			validators: {
				remote: {
					type: 'POST',
					url: '{{ route('slipnumbers.search') }}',
					message: 'Postage tracking number/DO number already exist',
					data: function(validator) {
								return { _token: '{!! csrf_token() !!}' };
							},
					delay: 1,		// wait 0.001 seconds
				},
				notEmpty: {
					message: 'Please insert tracking number/bill number/receipt number. '
				}
			}
		},

		client: {
			validators: {
				remote: {
					type: 'POST',
					url: '{{ route('customers.search') }}',
					message: 'Client already exist. Please check them in "Returning Customer" Section',
					data: function(validator) {
								return {
											_token: '{!! csrf_token() !!}',
								};
							},
					delay: 1,		// wait 0.001 seconds
				},
			}
		},
		client_email: {
			validators: {
				remote: {
					type: 'POST',
					url: '{{ route('customers.search') }}',
					message: 'Client email already exist. Please check them in "Returning Customer" Section',
					data: function(validator) {
								return {
											_token: '{!! csrf_token() !!}',
								};
							},
					delay: 1,		// wait 0.001 seconds
				},
			}
		},
		client_phone: {
			validators: {
				remote: {
					type: 'POST',
					url: '{{ route('customers.search') }}',
					message: 'Client phone already exist. Please check them in "Returning Customer" Section',
					data: function(validator) {
								return {
											_token: '{!! csrf_token() !!}',
								};
							},
					delay: 1,		// wait 0.001 seconds
				},
			}
		},
		'image[]': {
			validators: {
				notEmpty: {
					message: 'Please select an image'
				},
				file: {
					extension: 'jpeg,jpg,png,bmp',
					type: 'image/jpeg,image/png,image/bmp',
					maxSize: 7990272,   // 3264 * 2448
					message: 'The selected file is not valid'
				}
			}
		},

		'inv[][id_product]': {
			validators: {
				notEmpty: {
					message: 'Please choose an item. '
				}
			}
		},
		'inv[][commission]': {
			validators: {
				notEmpty: {
					message: 'Please insert commission for this item. '
				},
				greaterThan: {
					value: 0,
					message: 'Commission must be equal or greater than 0. '
				},
			},
		},
		'inv[][retail]': {
			validators: {
				notEmpty: {
					message: 'Please insert retail price for this item. '
				},
				greaterThan: {
					value: 0,
					message: 'Retail price must be equal or greater than 0. '
				},
			},
		},
		'inv[][quantity]': {
			validators: {
				notEmpty: {
					message: 'Please insert quantity for this item. '
				},
				greaterThan: {
					value: 0,
					message: 'Quantity must be equal or greater than 0. '
				},
			},
		},
		'pay[][id_bank]': {
			validators: {
				notEmpty: {
					message: 'Please choose payment bank. '
				},
			},
		},
		'pay[][date_payment]': {
			validators: {
				notEmpty: {
					message: 'Please insert payment date. '
				},
				date: {
					format: 'YYYY-MM-DD',
					message: 'The date format is not valid. '
				}
			},
		},
		'pay[][amount]': {
			validators: {
				notEmpty: {
					message: 'Please insert payment amount. '
				},
				greaterThan: {
					value: 1,
					message: 'Amount must be equal or greater than 1. '
				},
			},
		},

	}
})

/////////////////////////////////////////////////////////////////////
// http://bootstrapvalidator.votintsev.ru/examples/adding-dynamic-field/
// Add button click handler
	.on('click', '.add_serial', function(){
		var $template = $('#optionTemplate'),
		$clone = $template
							.clone()
							.removeClass('hide')
							.removeAttr('id')
							.insertBefore($template),
		$option = $clone.find('[name="serial[][tracking_number]"]');
		
		// Add new field
		$('#form').bootstrapValidator('addField', $option);
	})
	// Remove button click handler
	.on('click', '.remove_serial', function() {
		var $row    = $(this).parents('.form-group'),
		$option = $row.find('[name="serial[][tracking_number]"]');

		// Remove element containing the option
		$row.remove();

		// Remove field
		$('#form').bootstrapValidator('removeField', $option);
	})
	
	// Called after adding new field
	.on('added.field.bv', function(e, data) {
		if (data.field === 'serial[][tracking_number]') {
			if ($('#form').find(':visible[name="serial[][tracking_number]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_serial').attr('disabled', 'disabled');
			}
		}
	})
	
	// Called after removing the field
	.on('removed.field.bv', function(e, data) {
		if (data.field === 'serial[][tracking_number]') {
			if ($('#form').find(':visible[name="serial[][tracking_number]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_serial').removeAttr('disabled');
			}
		}
	})
/////////////////////////////////////////////////////////////////////
// Add button click handler
	.on('click', '.add_field', function(){
		var $template = $('#rowinvoice'),
		$clone = $template
							//.html( $('#rowinvoice').html() )
							.clone()
							.removeClass('hide')
							.removeAttr('id')
							.insertBefore($template),
		$option1 = $clone.find('[name="inv[][id_product]"]');
		$option2 = $clone.find('[name="inv[][commission]"]');
		$option3 = $clone.find('[name="inv[][retail]"]');
		$option4 = $clone.find('[name="inv[][quantity]"]');
		
		// Add new field
		$('#form').bootstrapValidator('addField', $option1);
		$('#form').bootstrapValidator('addField', $option2);
		$('#form').bootstrapValidator('addField', $option3);
		$('#form').bootstrapValidator('addField', $option4);

		// select2
		$($option1).select2();
	})
	// Remove button click handler
	.on('click', '.remove_field', function() {
		var $row    = $(this).parents().parents().parents().parents().parents('.row .inv'),
		$option1 = $row.find('[name="inv[][id_product]"]');
		$option2 = $row.find('[name="inv[][commission]"]');
		$option3 = $row.find('[name="inv[][retail]"]');
		$option4 = $row.find('[name="inv[][quantity]"]');

		// Remove element containing the option
		$row.remove();
		// $row.css({"color": "red", "border": "5px solid red"});

		// Remove field
		$('#form').bootstrapValidator('removeField', $option1);
		$('#form').bootstrapValidator('removeField', $option2);
		$('#form').bootstrapValidator('removeField', $option3);
		$('#form').bootstrapValidator('removeField', $option4);
	})
	
	// Called after adding new field
	.on('added.field.bv', function(e, data) {
		if (data.field === 'inv[][id_product]') {
			if ($('#form').find(':visible[name="inv[][id_product]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_field').attr('disabled', 'disabled');
			}
		}
		if (data.field === 'inv[][commission]') {
			if ($('#form').find(':visible[name="inv[][commission]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_field').attr('disabled', 'disabled');
			}
		}
		if (data.field === 'inv[][retail]') {
			if ($('#form').find(':visible[name="inv[][retail]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_field').attr('disabled', 'disabled');
			}
		}
		if (data.field === 'inv[][quantity]') {
			if ($('#form').find(':visible[name="inv[][quantity]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_field').attr('disabled', 'disabled');
			}
		}
	})
	
	// Called after removing the field
	.on('removed.field.bv', function(e, data) {
		if (data.field === 'inv[][id_product]') {
			if ($('#form').find(':visible[name="inv[][id_product]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_field').removeAttr('disabled');
			}
		}
		if (data.field === 'inv[][commission]') {
			if ($('#form').find(':visible[name="inv[][commission]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_field').removeAttr('disabled');
			}
		}
		if (data.field === 'inv[][retail]') {
			if ($('#form').find(':visible[name="inv[][retail]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_field').removeAttr('disabled');
			}
		}
		if (data.field === 'inv[][quantity]') {
			if ($('#form').find(':visible[name="inv[][quantity]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_field').removeAttr('disabled');
			}
		}
	})

/////////////////////////////////////////////////////////////////////
// Add button click handler
	.on('click', '.add_payment', function(){
		var $template = $('#optionpayment'),
		$clone = $template
							.clone()
							.removeClass('hide')
							.removeAttr('id')
							.insertBefore($template),
		$option1 = $clone.find('[name="pay[][id_bank]"]');
		$option2 = $clone.find('[name="pay[][date_payment]"]');
		$option3 = $clone.find('[name="pay[][amount]"]');
		
		// Add new field
		$('#form').bootstrapValidator('addField', $option1);
		$('#form').bootstrapValidator('addField', $option2);
		$('#form').bootstrapValidator('addField', $option3);

		// select2
		$($option1).select2();
	})
	// Remove button click handler
	.on('click', '.remove_payment', function() {
		var $row    = $(this).parents().parents().parents().parents().parents('.row .rowpayment'),
		$option1 = $row.find('[name="pay[][id_product]"]');
		$option2 = $row.find('[name="pay[][date_payment]"]');
		$option3 = $row.find('[name="pay[][amount]"]');

		// Remove element containing the option
		$row.remove();
		// $row.css({"color": "red", "border": "5px solid red"});

		// Remove field
		$('#form').bootstrapValidator('removeField', $option1);
		$('#form').bootstrapValidator('removeField', $option2);
		$('#form').bootstrapValidator('removeField', $option3);
	})
	
	// Called after adding new field
	.on('added.field.bv', function(e, data) {
		if (data.field === 'pay[][id_product]') {
			if ($('#form').find(':visible[name="pay[][id_product]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_field').attr('disabled', 'disabled');
			}
		}
		if (data.field === 'pay[][date_payment]') {
			if ($('#form').find(':visible[name="pay[][date_payment]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_field').attr('disabled', 'disabled');
			}
		}
		if (data.field === 'pay[][amount]') {
			if ($('#form').find(':visible[name="pay[][amount]"]').length >= MAX_OPTIONS) {
				$('#form').find('.add_field').attr('disabled', 'disabled');
			}
		}
	})
	
	// Called after removing the field
	.on('removed.field.bv', function(e, data) {
		if (data.field === 'pay[][id_bank]') {
			if ($('#form').find(':visible[name="pay[][id_bank]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_field').removeAttr('disabled');
			}
		}
		if (data.field === 'pay[][date_payment]') {
			if ($('#form').find(':visible[name="pay[][date_payment]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_field').removeAttr('disabled');
			}
		}
		if (data.field === 'pay[][amount]') {
			if ($('#form').find(':visible[name="pay[][amount]"]').length < MAX_OPTIONS) {
				$('#form').find('.add_field').removeAttr('disabled');
			}
		}
	})

;
////////////////////////////////////////////////////////////////////////////////////
// select 2
$('#taxs, #custsel, #us').select2({
	placeholder: 'Please select'
});

@endsection