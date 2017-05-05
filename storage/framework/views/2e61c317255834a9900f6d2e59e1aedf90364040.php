<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
	<div class="container topnav">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand topnav" href="<?php echo route('auth.index'); ?>">Utama</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo route('login'); ?>">Login</a></li>
                        <?php endif; ?>
			<?php if(Auth::check()): ?>
					<li><a href="<?php echo route('user.edit', auth()->user()->id); ?>">Welcome <?php echo auth()->user()->name; ?></a></li>
					<li>
						<a href="<?php echo route('sales.index'); ?>">Invoice</a>
					</li>
					<li>
						<a href="#">Print Report</a>
					</li>
					<?php if((auth()->user()->id_group) == 1): ?>
					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Product Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<li>
									<a href="<?php echo route('product.create'); ?>">Adding Product</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="<?php echo route('category.create'); ?>">Adding Category</a>
								</li>
							</ul>
						</div>
					</li>

					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Taxes Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
								<li>
									<a href="<?php echo route('taxes.index'); ?>">Adding Taxes</a>
								</li>
							</ul>
						</div>
					</li>

					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Bank Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
								<li>
									<a href="<?php echo route('banks.index'); ?>">Edit Bank</a>
								</li>
<!-- 								<li role="separator" class="divider"></li>
								<li>
									<a href="<?php echo route('category.create'); ?>">Adding Category</a>
								</li> -->
							</ul>
						</div>
					</li>

					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								User Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="<?php echo route('user.create'); ?>">Add User</a></li>
								<li><a href="<?php echo route('usergroup.create'); ?>">Add User Group</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</li>
					<?php endif; ?>
					<li><a href="<?php echo route('auth.destroy'); ?>">Logout</a></li>
			<?php endif; ?>
				</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>
