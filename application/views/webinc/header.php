<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mahwum-<?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>webassets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>webassets/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>webassets/css/style.css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>webassets/css/metis.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>webassets/css/responsive.css" />
        <!--  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link> -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    </head>
    <body>
        <div class="page-wrapper">
            <header class="header">
                <div class="header-middle">
                    <div class="container">
                        <div class="header-left">
                            <a href="<?php echo base_url('website/home');?>" class="logo">
                                <img src="<?php echo base_url();?>webassets/images/logo.png" alt="Mahwum Logo">
                            </a>
                        </div>
                        <!-- End .header-left -->
                        <div class="header-center header-bottom sticky-header">
                            <div class="container">
                                <nav class="main-nav">
                                    <ul class="menu sf-arrows">
                                        <li class="active"><a href="<?php echo base_url('website/home');?>">Home</a></li>
                                        <li>
                                            <a href="#" class="sf-with-ul">Products</a>
                                            <div class="megamenu megamenu-fixed-width">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="menu-title">
                                                                    <a href="#">Product1</a>
                                                                </div>
                                                                <ul>
                                                                    <li><a href="#">Product1.1</a></li>
                                                                    <li><a href="#">Product1.2</a></li>
                                                                    <li><a href="#">Product1.3</a></li>
                                                                    <li><a href="#">Product1.4</a></li>
                                                                    <li><a href="#">Product1.5</a></li>
                                                                    <li><a href="#">Product1.6</a></li>
                                                                    <li><a href="#">Product1.7</a></li>
                                                                    <li><a href="#">Product1.8</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="menu-title">
                                                                    <a href="#">Product2</a>
                                                                </div>
                                                                <ul>
                                                                    <li><a href="#">Product2.1</a></li>
                                                                    <li><a href="#">Product2.2</a></li>
                                                                    <li><a href="#">Product2.3</a></li>
                                                                    <li><a href="#">Product2.4</a></li>
                                                                    <li><a href="#">Product2.5</a></li>
                                                                    <li><a href="#">Product2.6</a></li>
                                                                    <li><a href="#">Product2.7</a></li>
                                                                    <li><a href="#">Product2.8</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-4">
                                                        <div class="banner">
                                                            <a href="#">
                                                                <img src="images/menu-banner1-2.jpg" alt="Menu banner">
                                                            </a>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-right">
                            <div class="header-search">
                                <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                                <form action="#" method="get">
                                    <div class="header-search-wrapper">
                                        <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                        <button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <button class="mobile-menu-toggler" type="button"><i class="icon-menu"></i></button>
                            <div class="header-contact dropdown">
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                                    <?php if($this->session->userdata('id')){?>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item" href="<?php echo base_url('website/auth/logout');?>">Sign Out</a>
                                        </div>
                                    <?php }else{?>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url('website/auth');?>">Sign In</a>
                                            <a class="dropdown-item" href="<?php echo base_url('website/auth/signup');?>">Sign Up</a>
                                        </div>
                                    <?php }?>
                            </div>
                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>