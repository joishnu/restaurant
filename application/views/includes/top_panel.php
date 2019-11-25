<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?=base_url('assets/admin/profile');?>/admin-profile.png" alt=""><?php echo $this->session->userdata('first_name');?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="<?php echo base_url();?>profile/edit_profile">Profile</a></li>
                        <!-- <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li> -->
                        <!--                     <li><a href="javascript:;">Help</a></li>
                        -->
                        <!--   <li><a href="<?php echo base_url(); ?>profile/changepassword">Change Password</a></li> -->
                        <li><a href="<?php echo base_url(); ?>authenticate/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <?php $notification = getNotifications();?>
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green"><?php echo count($notification);?></span>
                    </a>
                    <?php if(count($notification)>0){?>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li>
                                <?php foreach($notification as $key=>$value){?>
                                    <a href="<?php echo base_url('order_management/orders');?>" onclick="read_notification('<?php echo $value['id'];?>')">
                                        <!-- <span class="image"><img src="<?=base_url('assets/admin/profile');?>/admin-profile.png" alt="Profile Image" /></span>
                                        <span>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span> -->

                                        <span>
                                            <span><?php echo $value['title'];?></span>
                                        </span>
                                        <span class="message"><?php echo $value['message'];?></span>
                                        <hr>
                                    </a>
                                <?php }?>
                            </li>
                        </ul>
                    <?php }else{?>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li>
                                <a href="#">
                                    <span>
                                        <span>No Notification Yet.</span>
                                    </span>
                                        
                                    </a>
                            </li>
                        </ul>
                    <?php }?>
                </li>
            </ul>
        </nav>
    </div>
</div>
<script type="text/javascript">
    function read_notification(id) {
        $.ajax({
            type  :   'POST',
            url   :   "<?php echo base_url(); ?>dashboard/read_notification/"+id,
            success: function(result)
            {
                //console.log(result);return false;
            }
        });
    }
    /*setInterval(function() {
        $.ajax({
            type  :   'POST',
            url   :   "<?php echo base_url(); ?>dashboard/notification_count/",
            success: function(result)
            {
                //console.log(result);
                $("#notification_box").html(result);
            }
        });
    }, 1000);*/
</script>
<!-- /top navigation -->