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
                            <h1><a href="<?php echo base_url(); ?>">KENAKATA.com</a></h1>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">                        
                        <!-- Dropdown NavBar -->                                         
                    </div>


                    <div class="col-md-6 col-sm-5">
                        <div class="kart-links">
                            <a href="<?php echo base_url(); ?>user/">Login/Signup</a> 

                            <a href="<?php echo base_url(); ?>cart/add_to_cart"><i class="icon-shopping-cart"></i> 
                                <?php
                                if ($this->cart->contents()) {
                                    echo $this->cart->total_items() . ' Items -TK- ' . $this->cart->format_number($this->cart->total());
                                } else {
                                    echo '0 Items - TK 0.00';
                                }
                                ?>
                            </a>
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
                        </div>

                        <!--Social Icons End-->

                    </div>
                    <div class="col-md-6">

                        <!--Search Area Start-->

                        <?php
                        $attribute = array(
                            'id' => 'searchAllItems',
                            'class' => 'form-inline',
                            'role' => 'form'
                        );
                        echo form_open('cart/add_to_cart', $attribute)
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Search here">
                           
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 0px;margin-left: 5px;"><i class="icon-search"></i> Item Search</button>

                        <?php
                        echo form_close();
                        ?>

                        <!--Search Area End-->
                    </div>
                </div>

                <br/><br/>

                <div class="container">