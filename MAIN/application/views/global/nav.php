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

	.navbar-light .navbar-brand:focus {
		color: #fff !important;
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
					<a class="nav-link" href="<?php echo base_url(); ?>welcome/offers"><i class="fa fa-earth"></i>
						<?php echo $language['nav_offers_text']; ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>welcome/needs"><i class="fa fa-heart"></i> <?php echo $language['nav_needs_text']; ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>welcome/chat"><i class="fa fa-comments"></i> <?php echo $language['nav_chat_text']; ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>welcome/about_us"><i class="fa fa-info-circle"></i> <?php echo $language['page_about_us_heading']; ?></a>
				</li>











				<?php
				if (isset($_SESSION['user'])) {
				?>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>member/dashboard"><i class="fa fa-user"></i> <?php echo $language['nav_dashboard_text']; ?></a>
					</li>
					<span id="item">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('member/my_offers'); ?>"><i class="fa fa-earth"></i> &nbsp; <?php echo $language['side_nav_myoffers_text']; ?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('member/my_needs'); ?>"><i class="fa fa-heart"></i> &nbsp;<?php echo $language['side_nav_myneeds_text']; ?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('member/account_settings'); ?>"><i class="fa fa-gear"></i> &nbsp;<?php echo $language['side_nav_accountsettings_text']; ?></a>
						</li>

					</span>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>member/logout"><i class="fa fa-power-off"></i> <?php echo $language['nav__logout_text']; ?></a>
					</li>
				<?php
				} else {
				?>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>member"><i class="fa fa-user"></i> <?php echo $language['nav_signin_text']; ?></a>
					</li>
				<?php
				}
				?>

			</ul>

		</div>
	</div>
</nav>
