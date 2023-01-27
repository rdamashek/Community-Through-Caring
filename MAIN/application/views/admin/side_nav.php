<style>
	body {
		background-color: #268171;
	}

	.row.container-fluid {
		margin: 0 !important;
		margin-top: 50px !important;
		flex-direction: row !important;
		align-content: flex-end !important;
		justify-content: center !important;
	}

	.sidenav.opened {
		display: block;
	}

	.sidenav {
		margin-top: 40px;
		height: 100vh;
		width: 320px;
		position: fixed;
		z-index: 10;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: visible;
		transition: 0.5s;
		padding-top: 60px;
		transition: all 0.5s;
		/* display: none; */

	}

	.sidenav a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 18px;
		color: #818181;
		display: block;
		transition: 0.3s;
	}

	.sidenav a:hover {
		color: #f1f1f1;
	}

	.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
	}

	@media screen and (max-height: 450px) {
		.sidenav {
			padding-top: 15px;
		}

		.sidenav a {
			font-size: 18px;
		}
	}

	@media(max-width: 780px) {
		.sidenav {
			display: none;
			transition: all 1s;
		}

		.sidenav.opened {
			display: block;
			transition: all 1s;
		}
	}
</style>

<body>




	<div class="row container-fluid " style="margin-top: 50px">
		<div id="mySidenav" class="sidenav col-md-2">
			<a href="<?php echo base_url('admin/my_offers'); ?>"><i class="fa fa-earth"></i> &nbsp;Manage Offers</a>
			<a href="<?php echo base_url('admin/my_needs'); ?>"><i class="fa fa-heart"></i> &nbsp;Manage Needs</a>
			<a href="<?php echo base_url('admin/language'); ?>"><i class="fa fa-language"></i> &nbsp;Manage Language</a>

			<a href="<?php echo base_url('admin/all_users'); ?>"><i class="fa fa-users"></i> &nbsp; Users Management</a>
			<a href="<?php echo base_url('admin/chat'); ?>"><i class="fa fa-comments"></i> &nbsp; Manage Chat Messages</a>
			<a href="<?php echo base_url('admin/general_settings'); ?>"><i class="fa fa-gears"></i> &nbsp; General Settings</a>

			<a href="<?php echo base_url('admin/account_settings'); ?>"><i class="fa fa-gear"></i> &nbsp; Account Settings</a>
			<a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-power-off"></i> &nbsp; Logout</a>

		</div>
