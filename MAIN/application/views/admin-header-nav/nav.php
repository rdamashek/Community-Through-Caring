<style>
	body {
		background: #268171;
		padding-bottom: 60px;
	}

	.ui-tabs-nav li {
		height: 50px;
	}

	.ui-tabs-nav li a {
		color: #ffffff;
		text-decoration: none;
		font-size: 22px;
	}


	.ui-tabs-nav li,
	.ui-tabs-nav li.ui-state-default {
		width: 49%;
		margin: auto;
		border: none;
		background-color: #2a8a7259;
	}

	.single-goal {
		border-left: 5px solid #2a8a72;
	}

	.ui-tabs-nav li.ui-state-active {
		background-color: #078a72;
	}

	#item {
		display: none;
		visibility: hidden;
	}

	@media (max-width: 780px) {
		.auth-container {
			border-radius: 0 !important;
			margin-top: 140px !important;
		}

		.auth-container .auth-container {
			border-radius: 0 !important;
			margin-top: 0px !important;
			padding-bottom: 50px;
		}

		#item {
			display: block;
			visibility: visible;
		}
		.navbar-nav i{

			padding: 8px 10px;
		}
	}

	.navbar-collapse.in {
		display: block !important;
	}

	.ui-tabs-active.ui-state-active a i {
		color: #b5d6ce !important;
	}

	.navbar-light .navbar-brand:hover {
		color: #fff !important;
	}

	.navbar-brand:focus {
		color: white !important;
	}
	@media (max-width: 470px) {
		.navbar-brand{
			width: 320px !important;
			overflow: hidden !important;
		}

	}
</style>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo get_setting_value('app_name'); ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav ml-auto" style="text-align: left;">

				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>admin/my_offers"><i class="fa fa-earth"></i>
						<?php echo get_lang('lang_offers'); ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>admin/my_needs"><i class="fa fa-heart"></i> <?php echo get_lang('lang_needs'); ?></a>
				</li>
				

				<?php
				if (isset($_SESSION['admin'])) {
				?>

					<span id="item">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('admin/my_offers'); ?>"><i class="fa fa-earth"></i>&nbsp;Manage Offers</a>

						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('admin/my_needs'); ?>"><i class="fa fa-heart"></i>&nbsp;Manage Needs</a>

						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('admin/language'); ?>"><i class="fa fa-language"></i>&nbsp; Manage Language</a>

						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('admin/all_users'); ?>"><i class="fa fa-users"></i> &nbsp; Users Management</a>

						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('admin/chat'); ?>"><i class="fa fa-comments"></i> &nbsp; Manage Chat Messages</a>

						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('admin/general_settings'); ?>"><i class="fa fa-gears"></i> &nbsp; General Settings</a>

						</li>

					</span>


					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('admin/account_settings'); ?>"><i class="fa fa-gear"></i> <?php echo get_lang('lang_account_settings'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-power-off"></i> <?php echo get_lang('lang_sign_out'); ?></a>
					</li>
				<?php
				} else {
				?>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>admin"><i class="fa fa-user"></i> <?php echo get_lang('lang_sign_in'); ?></a>
					</li>
				<?php
				}
				?>

			</ul>

		</div>
	</div>
</nav>
