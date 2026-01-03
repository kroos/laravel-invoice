<li class="nav-item">
	<a class="nav-link" href="{!! route('sales.index') !!}">Invoice</a>
</li>
<li class="nav-item">
	<a class="nav-link" href="{!! route('printreport.index') !!}">Print Report</a>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Product & Customer</a>
	<div class="dropdown-menu">
		<a class="dropdown-item" href="{!! route('productcategories.index') !!}">Product Categories</a>
		<a class="dropdown-item" href="{!! route('products.index') !!}">Product</a>
		<a class="dropdown-item" href="{!! route('taxes.index') !!}">Taxes</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="{!! route('customers.index') !!}">Customers List</a>
	</div>
</li>

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Setting</a>
	<div class="dropdown-menu">
		<a class="dropdown-item" href="{!! route('users.index') !!}">Add User</a>
		<a class="dropdown-item" href="{!! route('usergroups.create') !!}">Add User Group</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="{!! route('banks.index') !!}">Bank Activation</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="{!! route('preferences.edit') !!}">Preferences</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="{{ route('activity-logs.index') }}">Activity Logs</a>
	</div>
</li>
