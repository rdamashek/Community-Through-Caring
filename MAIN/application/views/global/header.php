<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?> | <?php echo $language['app_name_goalpost']; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/auth.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/overhang.css">

	<script src="<?php echo base_url(); ?>assets/css/overhang.js"></script>


	<style>
		.navbar-nav li {
			padding: 0 10px;
		}
	</style>
	<style>
		.single-goal {
			border-left: 5px solid skyblue;
			margin-bottom: 15px;
			padding: 15px;
			border-top-right-radius: 15px;
			border-bottom-right-radius: 15px;
			border-bottom: 1px solid #f3f3f3;
			transition: all 0.5s;
		}

		.single-goal:hover {
			box-shadow: 0px 0px 29px -14px rgb(0 0 0 / 37%) inset;
			-webkit-box-shadow: 0px 0px 29px -14px rgb(0 0 0 / 37%) inset;
			-moz-box-shadow: 0px 0px 29px -14px rgb(0 0 0 / 37%) inset;
			cursor: pointer;
			padding-left: 25px;
			transition: all 0.5s;
		}

		.goal-desc-left h4,
		.goal-desc-left p,
		#goals-tabls td>p {
			margin-bottom: 0;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		.goal-img .goal-img-alt {
			height: 80px;
			line-height: 80px;
			border-radius: 15px;
			background-color: skyblue;
			font-size: 25px;
			text-align: center;
			width: 80px;
			float: right;
		}


		.ui-tabs-nav {
			display: flex;
			justify-content: space-between;
			background-color: white;
			border: none;
		}

		.ui-tabs-nav li,
		.ui-tabs-nav li.ui-state-default {
			width: 49%;
			margin: auto;
			border: none;
			background-color: #eeeeee;
		}

		.ui-tabs-nav li a {
			float: none;
			margin: auto;
			width: 100%;
			text-align: center;
		}

		.ui-tabs-nav li.ui-state-active {
			background-color: black;
		}




		.auth-container input.main-single-inp,
		.auth-container select.main-single-inp,
		.auth-container textarea.main-single-inp {
			width: 433px;
			margin: auto;
			margin-top: 50px;
			background-color: #ffffff00;
			height: 50px;
			border: none;
			border-bottom: 2px solid #ffffff;
			border-radius: 0;
			color: #fff;
			outline: none;
			font-size: 25px;
			text-align: center;
			box-shadow: none !important;
			max-width: 100%;
		}

		.auth-container h2.main-heading {
			font-size: 85px;
			font-weight: 600;
			color: #fff
		}

		.auth-container h2.sub-heading {
			font-size: 45px;
			font-weight: 600;
			color: #fff
		}

		.auth-container h3.heading-small {
			font-size: 22px;
			font-weight: 300;
			color: #fff;
			max-width: 800px;
			margin: auto;
		}

		.auth-container .main-single-inp::placeholder {
			color: #ffffff70;
		}

		.auth-container a.next-btn-circle {
			display: block;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			background-color: #fff;
			color: #4caf9d;
			line-height: 53px;
			text-align: center;
			margin: auto;
			margin-top: 28px;
			border: 2px solid white;
			padding-left: 2px;
			transition: all 0.3s;

		}

		.auth-container a.next-btn-circle:hover {
			padding-left: 10px;
			transition: all 0.3s;
		}

		.auth-container a.next-btn-circle>i {
			font-size: 23px;
		}

		@media (max-width: 700px) {
			.auth-container h2.main-heading {
				font-size: 60px;
			}

			.auth-container h3 {
				font-size: 22px;
				font-weight: 400;
			}

		}

		.alert-warning {
			color: #810000;
			background-color: #4caf9d;
			border-color: #810000;
		}

		.dataTables_wrapper>.dt-buttons {
			display: flex;
			zoom: 0.7;
			margin-top: 15px;
		}

		/* =================== */
		.dt-down-arrow {
			display: none !important;
		}

		.dt-button-collection {
			top: 50px !important;
			left: 0px !important;
			
		}

		.buttons-html5, .buttons-print{
			color: #fff !important;
			background-color: #268171 !important;
		}
		
		
		

		

		/* ================== */
		.dataTables_wrapper>.dt-buttons>.dt-button {
			margin: 0;
			background-color: #288171;
			color: white;
			border-radius: 25px;
			border: none;
		}

		.dataTables_wrapper>.dt-buttons>.dt-button:hover {
			background-color: #28817150;
			border: none;
		}

		/* .dataTables_wrapper>.dt-buttons>.dt-button:first-child {
			border-top-left-radius: 25px;
			border-bottom-left-radius: 25px;
		} */

		/* .dataTables_wrapper>.dt-buttons>.dt-button:last-child {
			border-top-right-radius: 25px;
			border-bottom-right-radius: 25px;
		} */
	</style>
</head>

<body>