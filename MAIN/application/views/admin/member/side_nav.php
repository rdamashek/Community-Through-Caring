<style>


	.sidenav {
		height: 100vh;
		width: 250px;
		position: unset;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 60px;
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
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
	}
</style>
<body>

<div class="row container-fluid" style="margin-top: 50px">
<div id="mySidenav" class="sidenav col-md-2">
	<a href="<?php echo base_url('member/my_offers'); ?>"><i class="fa fa-earth"></i> &nbsp; <?php echo $language['side_nav_myoffers_text']; ?></a>
	<a href="<?php echo base_url('member/my_needs'); ?>"><i class="fa fa-heart"></i> &nbsp;<?php echo $language['side_nav_myneeds_text']; ?></a>
	<a href="<?php echo base_url('member/account_settings'); ?>"><i class="fa fa-gear"></i> &nbsp;<?php echo $language['side_nav_accountsettings_text']; ?></a>
	<a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-power-off"></i> &nbsp;<?php echo $language['side_nav_logout_text']; ?></a>
</div>


