<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
//        $meta = array(
//            array('name' => 'robots', 'content' => 'no-cache'),
//            array('name' => 'description', 'content' => 'My Great Site'),
//            array('name' => 'keywords', 'content' => 'love, passion, intrigue, deception'),
//            array('name' => 'robots', 'content' => 'no-cache'),
//            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
//        );
//        echo meta($meta);
        ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/443775.png">
        <title>Login-KENAKATA.COM</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/style-responsive.css" rel="stylesheet" />
        <style>
            label.error{
                color: red;
                font-weight: bold;
            }
        </style>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>public/js/html5shiv.js"></script>
        <script src="<?php echo base_url(); ?>public/js/respond.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.form.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                var bootstrap_alert = function() {
                }
                bootstrap_alert.warning = function(message) {
                    $('#alert_placeholder').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button><strong>Oh snap!</strong>' + message + ' </div>');
                }

                $("#login").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: "required"
                    },
                    messages: {
                        email: "Please enter a valid email address",
                        password: "Please enter your passwords"
                    },
                    submitHandler: function(form) {
                        $.ajax(
                                {
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>admins/loginChecker",
                                    data: $("#login").serialize(),
                                    success: function(data)
                                    {
                                        if (data.error == true) {
                                            bootstrap_alert.warning('Invalid user name and password');
                                        } else {
                                            window.location.href = "<?php echo base_url(); ?>admins/admin_panel";
                                        }


                                    }, dataType: 'json'
                                });
                        return false;
                    }

                });
            });

        </script>
    </head>

    <body class="login-body">

        <div class="container">

            <?php
            $attributes = array('class' => 'form-signin', 'id' => 'login');
            echo form_open('email/send', $attributes);
            ?>
            <h2 class="form-signin-heading">sign in now</h2>
            <div id = "alert_placeholder"></div>
            <div class="login-wrap">
                <input type="text" class="form-control" name="email" id="email" placeholder="User Email " autofocus>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>


            </div>

        </form>

    </div>

</body>
</html>
