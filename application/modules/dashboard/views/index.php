<!doctype html>
<html>
<head>
<title>booking</title>
   <link href="<?php echo base_url(); ?>assets/table/css/style.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>assets/table/css/font-awesome.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>assets/table/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="<?php echo base_url(); ?>assets/table/js/jquery1.js"></script>
   <script src="<?php echo base_url(); ?>assets/table/js/bootstrap.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!--=============-->
   <link href="<?php echo base_url(); ?>assets/table/css/custom.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>assets/table/css/stylesheet.css" rel="stylesheet" type="text/css">
   <!--==================--> 
   
   <!--==================-->
   <script>
      
      $(document).ready(function(){
         $(".featureBt").click(function(){
            $(".drop_list").toggle();
         });
                     
         $(document).mouseup(function (e)
         {
             var container = $(".drop_list");
             if (!container.is(e.target) // if the target of the click isn't the container...
                 && container.has(e.target).length === 0) // ... nor a descendant of the container
             {
                 container.hide();
             }
         });
      });
   </script>   
      
   
   <!--==================-->
</head>
<body class="position_bg" id="page-top" data-spy="scroll" data-target="">
   <header class="top_color_change">   
      <div class="container">      
         <div class="logo_main">Main Logo</div>       
            <div class="menu_right">           
               <div class="">
                  <nav id="" class="navbar menu_wrapp" role="">
                  <div class="">
                     <div class="">
                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                             <span class="sr-only">Toggle navigation</span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                         </button>                        
                     </div>
                     <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav in-view">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="mobHideMenu"><a class="page-scroll" href="<?php echo base_url(); ?>dashboard/booking_history">Booking History</a></li>
                           <li><a class="page-scroll drop_down_bts featureBt " href="<?php echo base_url(); ?>authenticate/logout">Logout <img src="<?php echo base_url(); ?>assets/table/images/arrow_down.svg" width="8" alt=""/></a>               
         
                           </li>                  
                        </ul>             
                     </div>
                     <!-- /.navbar-collapse -->
                  </div>
                 <!-- /.container -->
               </nav>                
            </div>
         </div>
      </div>
   </header>

   <div class="main_top_wrap container">
      <h1><span>Welcome to Restaurant</span><br> Personalised collaborative space for your Restaurant.</h1>
      <div class="ico_ri"><img src="<?php echo base_url(); ?>assets/table/images/dinner.svg" width="250" alt=""/></div>
      <div class="clear"></div>
      <div class="booking_wrapp">
         <h2>Book Your Table here</h2>
         <div class="booing_bts_wrapp">
            <?php if(!empty($tables)){
               foreach($tables as $table){ 
                  if($table['status'] == 0){ ?>
            <a  class="set_box" data-toggle="modal" data-target="#myModal" onclick="openModal(this)" table_id="<?php echo $table['id']; ?>">
               <img src="<?php echo base_url(); ?>assets/table/images/dish.svg" width="30" alt=""/> 
               <h3>Table Number</h3>
               <h4><?php echo $table['tbl_name']; ?></h4>
               <h5>Available</h5>
            </a>
            <?php }else{ ?>

            <a href="" class="set_box not_avialable">
               <img src="<?php echo base_url(); ?>assets/table/images/dish.svg" width="30" alt=""/> 
               <h3>Table Number</h3>
               <h4><?php echo $table['tbl_name']; ?></h4>
               <h5>Not available</h5>
            </a>
            <?php }}} ?>
         </div>      
      </div>
   </div> 


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
   <form action="" method="post" id="menu_page">
      <input type="hidden" name="table_id">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Select Your menu</h4>
      </div>
      <div class="modal-body">
         <?php if(!empty($menus)){
            $i=1;
            foreach($menus as $menu){ ?>
            <div class="list_food_box">
               <div class="pic_food"><img src="<?php echo base_url(); ?>assets/table/images/food3.jpg"  alt=""/></div>
               <div class="food_name_wrap">
                  <h2><?php echo $menu['dish_name'] ?></h2>
                  <input type="hidden" name="dish_id[]" value="<?php echo $menu['id']; ?>" class="food_id">
                  <input type="hidden" id="pricevalue<?php echo $i; ?>" value="<?php echo $menu['dish_price'] ?>">
                  <h4 class="price"><?php echo $menu['dish_price'] ?></h4>
               </div>
               <div class="min_plus_rap">
                  <div class="center">
                     <div class="input-group">
                          <span class="input-group-btn">
                             <button type="button" class="btn btn-default btn-number" datanumber="<?php echo $menu['id']; ?>"  disabled="disabled" data-type="minus" data-field="quant[<?php echo $menu['id']; ?>]">
                                <span class="glyphicon glyphicon-minus"></span>
                             </button>
                          </span>
                          <input type="text" name="quant[<?php echo $menu['id']; ?>]"  class="form-control input-number qty" value="0" min="0" max="10">
                          <span class="input-group-btn">
                             <button type="button" class="btn btn-default btn-number" datanumber="<?php echo $menu['id']; ?>" data-type="plus" data-field="quant[<?php echo $menu['id']; ?>]">
                                <span class="glyphicon glyphicon-plus"></span>
                             </button>
                          </span>
                       </div>
                  </div>
               </div>
            </div>
         <?php $i++; }} ?>
      </div>
      <div class="sub_toatal">
         <h3>Total Amount</h3>
         <h2 id="total">0</h2>
      </div>   
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="book_table">Book Table</button>
      </div>
    </div>
 </form> 
  </div>
</div>  

</body>
<script>
$('#menu_page').submit(function(e){
   var is_food = false;
   e.preventDefault();
   var food_ids = [];
   var food_qty = [];
   var food_price = [];
   $('.food_id').each(function(index, value) {      food_ids[index] = $(this).val();
      food_price[index] = $('#pricevalue'+$(this).val()).val();
   });
   $('.qty').each(function(index, value) {
      if($(this).val() > 0){
         is_food = true;
      }
      food_qty[index] = $(this).val();
   });
   var table_id = $('[name=table_id]').val();
   if(is_food == true){
      console.log(food_price);
      $.ajax({
         url:'<?php echo base_url(); ?>dashboard/bookTable',
         type:'POST',
         data:{'food_ids': food_ids, 'food_qty': food_qty, 'food_price': food_price, 'table_id':table_id},
         success:function(response){
            var obj = JSON.parse(response);
            if(obj.status == true){
               swal('Success', 'You have successfully placed the order. Your order id is '+obj.data+'.', 'success').then(val => {
                  location.reload();
               });

            }
         }, 
      });
   }
 });
   var total = 0;
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");

    var datanumber = $(this).attr('datanumber');
    var total = parseInt($('#total').text());
    console.log("PRICEEFHF ",$('#pricevalue'+datanumber).val());

    console.log("DAYTTA", datanumber);
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }
            total = total - parseInt($('#pricevalue'+datanumber).val());
            $('#total').text(total);

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }
            total = total + parseInt($('#pricevalue'+datanumber).val());
            $('#total').text(total);
        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled');

    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled');
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

   function openModal(e){
      var table_id = $(e).attr('table_id');
      $('[name=table_id]').val(table_id);
   }

   
   </script>
</html>
