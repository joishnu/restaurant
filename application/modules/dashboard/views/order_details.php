<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
	
	

	<script type="text/javascript">
		$(document).ready(function(){

			$(".mobHideMenu").click(function(){
				$(".collapse").removeClass('in');

			});
		})
	</script>

	
	
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

	
	
	
	
</head>


<body class="position_bg" id="page-top" data-spy="scroll" data-target="">
	
	
	
	<header class="top_color_change">
	
		<div class="container">
		
			<div class="logo_main">Main Logo</div>
			
			
			<div class="menu_right">
				
				<!--<ul>
				
					<li><a href="">Feature</a></li>
					<li><a href="">Blogs</a></li>
					<li><a href="#contact_wrapp_sec">Contact Us</a></li>
					
				</ul>
				
				<a href="" class="button_manage">Management Login <img src="images/arrow_right.svg" alt=""/></a>
			-->
				
				
				
                
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
                    <li class="mobHideMenu"><a class="page-scroll" href="<?php echo base_url(); ?>dashboard/booking_history">Booking History</a></li>
                           <li><a class="page-scroll drop_down_bts featureBt " href="<?php echo base_url(); ?>authenticate/logout">Logout <img src="<?php echo base_url(); ?>assets/table/images/arrow_down.svg" width="8" alt=""/></a>               
         
                           </li> 
					
					
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

	  
	 
<div class="my_booing_wrapp container">
	
		
		
	
		<div class="booking_main_wrapp booking_details">
			
			<h3><?php echo date('d-m-Y', strtotime($orders['created_on'])); ?></h3>
			
			<h4>Detail list of items</h4>
			
			<ul class="list_food">
				<?php if(!empty($order_details)){
					foreach($order_details as $detail){ ?>
						<li><?php echo $detail['dish_name']; ?></li>
					<?php }
				} ?>
			
			
			</ul>
			
			
		</div>
		
	
</div>		
	
	
</body>
</html>
