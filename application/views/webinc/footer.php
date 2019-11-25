<footer class="footer">
   <div class="footer-middle">
      <div class="container">
         <div class="row">
            <div class="col-lg-9">
               <div class="row">
                  <div class="col-md-6">
                     <div class="widget widget-newsletter">
                        <div class="row">
                           <div class="col-lg-12">
                              <h4 class="widget-title">Subscribe for newletters</h4>
                              <form action="#">
                                 <input type="email" class="form-control" placeholder="Email address" required>
                                 <input type="submit" class="btn" value="">
                              </form>
                              <h4 class="widget-title">Contact Us</h4>
                              <p>XXX-XXXX-XXXX</p>
                           </div>
                           <!-- End .col-lg-6 -->
                        </div>
                        <!-- End .row -->
                     </div>
                     <!-- End .widget -->
                  </div>
                  <!-- End .col-md-7 -->
                  <div class="col-md-6">
                     <div class="widget">
                        <!--  <h4 class="widget-title">My Account</h4>
                           -->
                        <div class="row">
                           <div class="col-md-12">
                              <ul class="links">
                                 <li><a href="#">About Us</a></li>
                                 <li><a href="#">Terms & Conditions</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Cancellations</a></li>
                              </ul>
                           </div>
                           <!-- End .col-sm-6 -->
                        </div>
                        <!-- End .row -->
                     </div>
                     <!-- End .widget -->
                  </div>
                  <!-- End .col-md-5 -->
               </div>
               <!-- End .row -->
            </div>
            <!-- End .col-lg-9 -->
            <div class="col-lg-3">
               <div class="widget">
                  <!-- <h4 class="widget-title">Contact Us</h4> -->
                  <ul class="links">
                     <li><a href="#">Home</a></li>
                     <li><a href="#">Products</a></li>
                     <li><a href="#">Testimonials</a></li>
                     <li><a href="#">Services</a></li>
                     <li><a href="#">Merchant Registration</a></li>
                  </ul>
               </div>
               <!-- End .widget -->
            </div>
            <!-- End .col-lg-3 -->
            <div class="col-lg-9">
               <div class="row">
                  <div class="col-md-6">
                     <div class="social-icons">
                        <a href="#" class="social-icon" target="_blank"><img src="<?php echo base_url();?>webassets/images/fb.png"></a>
                        <a href="#" class="social-icon" target="_blank"><img src="<?php echo base_url();?>webassets/images/insta.png"></a>
                        <a href="#" class="social-icon" target="_blank"><img src="<?php echo base_url();?>webassets/images/twi.png"></a>
                        <a href="#" class="social-icon" target="_blank"><img src="<?php echo base_url();?>webassets/images/link.png"></a>
                     </div>
                     <!-- End .social-icons -->
                  </div>
                  <div class="col-md-6">
                     <a href="#"><img class="hover-shadow" src="<?php echo base_url();?>webassets/images/googleplay.png"></a>
                     <a href="#"><img class="hover-shadow" src="<?php echo base_url();?>webassets/images/appstore1.png"></a>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               &nbsp;
            </div>
         </div>
         <!-- End .row -->
      </div>
      <!-- End .container -->
      <div class="footer-bottom">
         <p class="footer-copyright">Copyright © 2019 Muhwum, India. All rights reserved</p>
      </div>
      <!-- End .footer-bottom -->
   </div>
   <!-- End .footer-middle -->
</footer>
<!-- End .footer -->
</div>
<!-- End .page-wrapper -->
<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->
<div class="mobile-menu-container">
   <div class="mobile-menu-wrapper">
      <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
      <nav class="mobile-nav">
         <ul class="mobile-menu">
            <li class="active"><a href="#">Home</a></li>
            <li>
               <a href="#">Product</a>
               <ul>
                  <li><a href="#">Product1</a></li>
                  <li><a href="#">Product2</a></li>
                  <li><a href="#">Product3</a></li>
                  <li><a href="#">Product4</a></li>
                  <li><a href="#">Product5</a></li>
                  <li><a href="#">Product6</a></li>
                  <li><a href="#">Product7</a></li>
                  <li><a href="#">Product8</a></li>
                  <li><a href="#">Product9</a></li>
                  <li><a href="#">Product10<span class="tip tip-new">New</span></a></li>
                  <li><a href="#">Product11</a></li>
                  <li><a href="#">Product12</a></li>
                  <li><a href="#">Product13</a></li>
                  <li><a href="#">Product14</a></li>
                  <li><a href="#">Product15</a></li>
                  <li><a href="#">Product16</a></li>
               </ul>
            </li>
         </ul>
      </nav>
      <!-- End .mobile-nav -->
      <div class="social-icons">
         <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
         <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
         <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
      </div>
      <!-- End .social-icons -->
   </div>
   <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->
<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
<!-- Plugins JS File -->
<script src="<?php echo base_url();?>webassets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>webassets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>webassets/js/plugins.min.js"></script>
<!-- Main JS File -->
<script src="<?php echo base_url();?>webassets/js/main.min.js"></script>
<script src="<?php echo base_url();?>webassets/js/metis.js"></script>
<script type="text/javascript">
   /***********
   Making placeholder star specifically red
   ****************/
   $('.palceholder').click(function() {
      $(this).siblings('input').focus();
   });
   $('.form-control').focus(function() {
      $(this).siblings('.palceholder').hide();
   });
   $('.form-control').blur(function() {
      var $this = $(this);
      if ($this.val().length == 0)
      $(this).siblings('.palceholder').show();
   });
   $('.form-control').blur();
</script>
</body>
</html>