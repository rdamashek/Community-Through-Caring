<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $language['app_name_goalpost']; ?> | <?php echo $language['login_page_login']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/auth.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
    <style>
        .navbar-nav li {
            padding: 0 10px;
        }
    </style>
    <style>
        .navbar-collapse.in {
            display: block !important;
        }

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
    </style>
</head>

<body style="background-color: #4caf9d;">


    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>welcome"><?php echo $language['app_name_goalpost']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">

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
                        <a class="nav-link" href="<?php echo base_url(); ?>member"><i class="fa fa-user"></i> <?php echo $language['nav_signin_text']; ?></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container text-center auth-container" style="margin-top: 25vh">
        <?php
        if (isset($_GET['this_email_was_not_register'])) {
        ?>

            <div class="alert alert-warning" style="max-width: 500px;margin: auto;margin-bottom: 30px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?php echo $language['forgot_password_page_error']; ?></strong> <?php echo $language['forgot_password_page_error_this_email_not_register']; ?>
            </div>
        <?php
        } ?>
        <form action="<?php echo base_url('welcome/forgot_password_process') ?>" method="post">
            <div class="step">
                <h2 class="main-heading" style=""><?php echo $language['login_page_forgot_password'] ?></h2>
                <h3 style="color: #fff"><?php echo $language['login_page_enter_your_email'] ?></h3>

                <input name="email" autofocus="autofocus" type="email" class="form-control main-single-inp" id="email_login" placeholder="<?php echo $language['login_page_input_placeholder'] ?>" style="" value="<?php echo isset($_GET['user']) ? $_GET['user'] : ''; ?>" required>


                <button type="submit" herf="<?php echo base_url('welcome/email_reset_pass'); ?>" class="next-btn-circle" style="margin-top:20px; width: auto;display: inline-block;border-radius: 25px;clear: both;padding: 0px 38px;border: none; box-shadow: none; color: #4caf9d; cursor: pointer;line-height:  44px;text-decoration: none;font-size: 25px;"><?php echo $language['login_page_send_rest_link'] ?></button>

            </div>

        </form>
    </div>




    <script>
        function authenticate_user($this) {
            $email = $('input[name=email]').val();
            if (!isEmail($email)) {
                $('#email_login').css('color', '#ac5b5b');
                return false;
            } else {
                $('#email_login').css('color', 'white');
                $.ajax({
                    url: '<?php echo base_url('welcome/authenticate_user'); ?>',
                    data: {
                        'email': $email
                    },
                    type: 'post',
                    success: function(data) {
                        data = JSON.parse(data);
                        if (data.email_found == '1') {
                            $('.step').hide();
                            $('.step.password_step').show();
                        } else {
                            $('.step').hide();
                            $('.step.no_match').show();
                            $('#new_email_inp').val($email);
                        }
                    }
                })
            }
        }


        function submit_form($this) {
            $name = $('input#name_inp').val();
            $email = $('input#new_email_inp').val();
            $password = $('input#password_inp').val();
            $.ajax({
                url: '<?php echo base_url('welcome/signup_handler'); ?>',
                data: {
                    email: $email,
                    name: $name,
                    password: $password
                },
                type: 'post',
                success: function(data) {
                    data = JSON.parse(data);
                    window.location = data.redirect;
                }
            })
        }


        function login_user($this) {
            $email = $('input#email_login').val();
            $password = $('input#password_inp_login').val();
            $.ajax({
                url: '<?php echo base_url('welcome/login_handler'); ?>',
                data: {
                    email: $email,
                    password: $password
                },
                type: 'post',
                success: function(data) {
                    data = JSON.parse(data);
                    window.location = data.redirect;
                }
            })
        }


        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    </script>

    <!--<footer><span style="color: #999;" >Copyrights &copy; 2022. Designed & Developed by Lipsum Technologies &reg; Pvt Ltd</span></footer>-->
</body>

</html>