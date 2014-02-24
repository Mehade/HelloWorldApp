<!DOCTYPE html>
<html>
    <head>
        <!-- Title here -->
        <title>Welcome to KENAKATA.com</title>
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="ResponsiveWebInc">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600italic,600' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url(); ?>main/css/bootstrap.min.css" rel="stylesheet">
        <!-- Animate css -->
        <link href="<?php echo base_url(); ?>main/css/animate.min.css" rel="stylesheet">
        <!-- Dropdown menu -->
        <link href="<?php echo base_url(); ?>main/css/ddlevelsmenu-base.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>main/css/ddlevelsmenu-topbar.css" rel="stylesheet">
        <!-- Countdown -->
        <link href="<?php echo base_url(); ?>main/css/jquery.countdown.css" rel="stylesheet"> 
        <!-- Font awesome CSS -->
        <link href="<?php echo base_url(); ?>main/css/font-awesome.min.css" rel="stylesheet">		
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>main/css/style.css" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>main/img/cart.png">
 <script src="<?php echo base_url(); ?>main/js/jquery.js"></script>
    </head>

    <body>


        <!-- Logo & Navigation starts -->

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <!-- Logo -->
                        <div class="logo">
                            <h1><a href="<?php echo base_url(); ?>index/">KENAKATA.com</a></h1>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">                        
                        <!-- Dropdown NavBar -->
                        <div class="navis"></div>                  
                    </div>

                    <div class="col-md-6 col-sm-5">
                        <!-- Navigation menu -->
                        <div class="navi">
                            <div id="ddtopmenubar" class="mattblackmenu">
                                <ul>
                                    <?php
                                    if ($this->session->userdata('user_name') != '') {
                                        echo '<li><a href="'. base_url() . 'user/my_account_info"><i class="icon-lock" style="padding-right: 3px;"></i>' . $this->session->userdata('user_name') . '</a></li>';
                                        echo '<li><a data-toggle="modal" href="'. base_url() .'cart/add_to_cart" rel="ddsubmenu1"><i class="icon-shopping-cart" style="padding-right: 3px;"></i>My Cart</a></li>';
                                        echo '<li><a href="#" rel="ddsubmenu1"><i class="icon-eye-open" style="padding-right: 3px;"></i>Check Out</a></li>';
                                        echo '<li><a data-toggle="modal" href="' . base_url() . 'user/user_logout" rel="ddsubmenu1"><i class="icon-user" style="padding-right: 3px;"></i>Logout</a></li>';
                                    } else {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>user/"><i class="icon-lock" style="padding-right: 3px;"></i>My Account</a></li>                            
                                        <li><a data-toggle="modal" href="<?php echo base_url() ?>cart/add_to_cart" rel="ddsubmenu1"><i class="icon-shopping-cart" style="padding-right: 3px;"></i>My Cart</a></li>
                                        <li><a href="<?php echo base_url(); ?>cart/checkoutView" rel="ddsubmenu1"><i class="icon-eye-open" style="padding-right: 3px;"></i>Check Out</a></li>
                                        <li><a data-toggle="modal" href="<?php echo base_url(); ?>user/" rel="ddsubmenu1"><i class="icon-user" style="padding-right: 3px;"></i>Login</a></li>                                                           
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo & Navigation ends -->



        <!-- Page title -->
        <div class="page-title">
            <div class="container">
                <h2><i class="icon-home color"></i> KENAKATA.com <small>A Online Shopping Center. HELPLINE: 01711281825</small></h2>
                <hr />
            </div>
        </div>
        <!-- Page title -->

        <!-- Page content -->

        <div class="shop-items">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">

                        <!--Social Icons Start-->

                        <div class="social">
                            <a href="#" class="facebook"><i class="icon-facebook"></i></a>
                            <a href="#" class="twitter"><i class="icon-twitter"></i></a>
                            <a href="#" class="google-plus"><i class="icon-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="icon-linkedin"></i></a>
                            <a href="#" class="pinterest"><i class="icon-pinterest"></i></a>
                        </div>

                        <!--Social Icons End-->

                    </div>
                    <div class="col-md-6">

                        <!--Search Area Start-->

                        <form class="form-inline" role="form">
                            <div class="form-group">                        
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search here">
                                </div>                                                                            
                            </div>                         
                            <button type="submit" class="btn btn-primary" style="margin-top: -25px;"><i class="icon-search" style="padding-right: 5px;"></i>Item Search</button>
                        </form>

                        <!--Search Area End-->
                    </div>
                </div>

                <br/><br/>

                <div class="container">