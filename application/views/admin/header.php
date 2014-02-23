<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
//        $meta = array(
//        array('name' => 'robots', 'content' => 'no-cache'),
//        array('name' => 'description', 'content' => 'My Great Site'),
//        array('name' => 'keywords', 'content' => 'love, passion, intrigue, deception'),
//        array('name' => 'robots', 'content' => 'no-cache'),
//        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
//    );
//        echo meta($meta); 
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/cart.png">

        <title>KENAKATA.COM</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl.carousel.css" type="text/css">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>public/js/html5shiv.js"></script>
          <script src="<?php echo base_url(); ?>public/js/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    </head>

    <body>

        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
                </div>
                <!--logo start-->
                <a href="#" class="logo">Welcome <span>KENAKATA.com</span> Admin Panel</a>
                <!--logo end-->

                <div class="top-nav ">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <li>
                            <input type="text" class="form-control search" placeholder="Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                                <span class="username"><?php echo $this->session->userdata('user_email'); ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                                <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                                <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                                <li><a href="<?php echo base_url(); ?>admins/logout"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a class="" href="<?php echo base_url(); ?>admins/dashboard">
                                <i class="icon-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-book"></i>
                                <span>Show All Admin</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo base_url(); ?>admins/create_user">Create User</a></li>                                                    
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-book"></i>
                                <span>Category</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo base_url(); ?>category/">Add New Category</a></li>                                                    
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-cogs"></i>
                                <span>Item</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo base_url(); ?>item/">Add New Items</a></li>
                                <li><a class="" href="<?php echo base_url(); ?>item/search">View/Search Items</a></li>                          
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-tasks"></i>
                                <span>Stock</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo base_url(); ?>stock/">View Stock</a></li>                                
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Data Tables</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="basic_table.html">Basic Table</a></li>
                                <li><a class="" href="dynamic_table.html">Dynamic Table</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="inbox.html">
                                <i class="icon-envelope"></i>
                                <span>Mail </span>
                                <span class="label label-danger pull-right mail-info">2</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-glass"></i>
                                <span>Extra</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="blank.html">Blank Page</a></li>
                                <li><a class="" href="profile.html">Profile</a></li>
                                <li><a class="" href="invoice.html">Invoice</a></li>
                                <li><a class="" href="404.html">404 Error</a></li>
                                <li><a class="" href="500.html">500 Error</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="login.html">
                                <i class="icon-user"></i>
                                <span>Login Page</span>
                            </a>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->