<style>

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

	@media(max-width: 770px) {
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

	<div class="row container-fluid" style="margin-top: 50px">

		

		<div id="mySidenav" class="sidenav col-md-2">
			<a href="<?php echo base_url('member/my_offers'); ?>"><i class="fa fa-earth"></i> &nbsp; <?php echo get_lang('lang_my_offers'); ?></a>
			<a href="<?php echo base_url('member/my_needs'); ?>"><i class="fa fa-heart"></i> &nbsp;<?php echo get_lang('lang_my_needs'); ?></a>
			<a href="<?php echo base_url('member/account_settings'); ?>"><i class="fa fa-gear"></i> &nbsp;<?php echo get_lang('lang_account_settings'); ?></a>
			<a href="<?php echo base_url('member/logout'); ?>"><i class="fa fa-power-off"></i> &nbsp;<?php echo get_lang('lang_sign_out'); ?></a>

			
		</div>
