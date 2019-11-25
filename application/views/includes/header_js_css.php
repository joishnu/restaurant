 <!-- Bootstrap -->
    <link href="<?php echo CUSTOM_URL;?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo CUSTOM_URL;?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo CUSTOM_URL;?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo CUSTOM_URL;?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo CUSTOM_URL;?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo CUSTOM_URL;?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo CUSTOM_URL;?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo CUSTOM_URL;?>assets/build/css/custom.min.css" rel="stylesheet">
    <script src="<?php echo CUSTOM_URL;?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

    <link href="<?php echo CUSTOM_URL;?>assets/vendors/multiselect/css/bootstrap-multiselect.css" rel="stylesheet">

    <link href="<?php echo CUSTOM_URL;?>assets/vendors/toast/css/jquery.toast.min.css" rel="stylesheet">
     <style type="text/css">
      body:not(.loaded)>*:not(.loading-overlay) {visibility: hidden;}
@keyframes rotating {
from {
    transform: rotate(0deg);
}
to {
    transform: rotate(360deg);
}
}@-webkit-keyframes spin {
    0% {
    -ms-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
100% {
    -ms-transform: rotate(359deg);
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
}
}@-ms-keyframes spin {
    0% {
    -ms-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
100% {
    -ms-transform: rotate(359deg);
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
}
}@keyframes spin {
    0% {
    -ms-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
100% {
    -ms-transform: rotate(359deg);
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
}
}@-webkit-keyframes bouncedelay {
    0%,  80%,  100% {
    -webkit-transform: scale(0);
    transform: scale(0);
}
40% {
    -webkit-transform: scale(1);
    transform: scale(1);
}
}@keyframes bouncedelay {
    0%,  80%,  100% {
    -webkit-transform: scale(0);
    transform: scale(0);
}
40% {
    -webkit-transform: scale(1);
    transform: scale(1);
}
}
.loading-overlay {background: #fff;bottom: 0;left: 0;opacity: 1;position: fixed;right: 0;top: 0;
-webkit-transition: all .5s ease-in-out;transition: all .5s ease-in-out;visibility: visible;z-index: 999999;}
.loaded>.loading-overlay {opacity: 0;visibility: hidden;}
.bounce-loader {left: 50%;margin: -9px 0 0 -35px;position: absolute;text-align: center;top: 50%;
-webkit-transition: all .2s;transition: all .2s;width: 70px;z-index: 10000;}
.bounce-loader .bounce1, .bounce-loader .bounce2, .bounce-loader .bounce3 {
-webkit-animation: 1.4s ease-in-out 0s normal both infinite bouncedelay;
animation: 1.4s ease-in-out 0s normal both infinite bouncedelay;background-color: #2A3F54;border-radius: 100%;
-webkit-box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.15);box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.15);display: inline-block;height: 18px;width: 18px;}
.bounce-loader .bounce1 {-webkit-animation-delay: -.32s;animation-delay: -.32s;}
.bounce-loader .bounce2 {-webkit-animation-delay: -.16s;animation-delay: -.16s;}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
               <a href="<?php CUSTOM_URL;?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo title;?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=CUSTOM_URL.'assets/admin/profile';?>/admin-profile.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            
            <!-- /menu profile quick info -->

            <br />