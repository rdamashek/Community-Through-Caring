<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Goalpost | Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		  crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="../assets/css/auth.css">
	<link rel="stylesheet" href="../assets/css/nav.css">
	<style>
		.navbar-nav li {
			padding: 0 10px;
		}
	</style>
	<style>
		.auth-container input.main-single-inp {
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

		.auth-container input.main-single-inp::placeholder {
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

		.auth-container a.next-btn-circle > i {
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
	</style>
</head>
<body style="background-color: #4caf9d;">


<nav class="navbar navbar-expand-lg navbar-light fixed-top">
	<div class="container">
		<a class="navbar-brand" href="../welcome">GoalPost</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav ml-auto">

				<li class="nav-item">
					<a class="nav-link" href="../welcome/offers"><i class="fa fa-earth"></i> Offers</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../welcome/needs"><i class="fa fa-heart"></i> Needs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-comments"></i> Chat</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../member"><i class="fa fa-user"></i> Sign in</a>
				</li>
			</ul>

		</div>
	</div>
</nav>

<div class="container text-center auth-container" style="margin-top: 25vh">
	<div class="step">
		<h2 class="main-heading" style="">Welcome</h2>
		<h3 style="color: #fff">Please enter your email</h3>
		<input type="email" class="form-control main-single-inp" name="email" placeholder="john@example.com" style="">

		<a href="#" class="next-btn-circle" style="" onclick="send_confirmation(this); "><i class="fa fa-angle-right" style="  "></i></a>
	</div>

	<div class="step" style="display: none;">
		<h2 class="sub-heading" style="">Please confirm your email</h2>
		<h3 class="heading-small" style="color: #fff">A confirmation link has been sent you your email. Please enter the confirmation code below:</h3>
		<input type="text" class="form-control main-single-inp" placeholder="XXXXXX" style="width: 150px">

		<a href="#" class="next-btn-circle" style="" onclick="$('.step').hide(); $(this).parents('.step').next('.step').show();"><i class="fa fa-angle-right" style="  "></i></a>
	</div>

	<div class="step" style="display: none;">
		<h2 class="sub-heading" style="">Create your password</h2>
		<h3 class="heading-small" style="color: #fff">Please enter your password below</h3>
		<div style="display: inline-block">
			<input type="password" class="form-control main-single-inp" id="password_inp" placeholder="New password" style="max-width: 300px">
			<i onclick="$('#password_inp').attr('type', 'text'); $(this).hide(); $('.fa-eye-low-vision').show();" style="color: white;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye"></i>
			<i onclick="$('#password_inp').attr('type', 'password');  $(this).hide(); $('.fa-eye').show();" style="display: none ;color: white;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye-low-vision"></i>
		</div>
		<br/>
		<a href="#" class="next-btn-circle" style="width: auto;display: inline-block;border-radius: 25px;clear: both;padding: 0px 38px;line-height:  44px;text-decoration: none;font-size: 25px;" onclick="">Sign Up!</a>
	</div>
</div>

<script>
	function send_confirmation($this){

		$.ajax({
			url:'<?php echo base_url('welcome/send_confirmation'); ?>',
			data:{'email': $('input[name=email]').val()},
			success: function (data){
				$('.step').hide(); $($this).parents('.step').next('.step').show();
			}
		})


	}
</script>

<!--<footer><span style="color: #999;" >Copyrights &copy; 2022. Designed & Developed by Lipsum Technologies &reg; Pvt Ltd</span></footer>-->
</body>
</html>
