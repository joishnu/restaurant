
<?php
    $permissions = $this->session->permissions;
    //show($permissions);
?>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <?php if (isset($permissions['dashboard'])){?>
                <li><a href="<?=site_url('dashboard'); ?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
            <?php }?>
            <?php if (isset($permissions['users'])){ ?>
                <li>
                    <a><i class="fa fa-users"></i> Users Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if (in_array("admin_list", $permissions['users'])){?>
                            <li><a href="<?=site_url('users/admin'); ?>">Admin</a></li>
                        <?php } if (in_array("index", $permissions['users'])){?>
                            <li><a href="<?=site_url('users'); ?>">Vendors</a></li>
                        <?php }if (in_array("customer", $permissions['users'])){?>
                            <li><a href="<?=site_url('users/customer'); ?>">Customers</a></li>
                        <?php }?>
                        <!-- <li><a href="<?=site_url('role/add'); ?>">Roles</a></li>
                        <li><a href="<?=site_url('module/add'); ?>">Modules</a></li> -->
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['providers'])){ ?>
                <li>
                    <a><i class="fa fa-users"></i> Providers Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if (in_array("provider", $permissions['providers'])){?>
                            <li><a href="<?=site_url('providers/provider'); ?>">Providers</a></li>
                        <?php } if(in_array("providercategory_list", $permissions['providers'])){ ?>
                            <li><a href="<?=site_url('providers/providercategory'); ?>">Providers Category</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['employees'])){ ?>
                <li>
                    <a><i class="fa fa-users"></i> Users Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if (in_array("employee_list", $permissions['employees'])){?>
                            <li><a href="<?=site_url('employees'); ?>">Employees</a></li>
                        <?php }?>
                        <!-- <li><a href="<?=site_url('role/add'); ?>">Roles</a></li>
                        <li><a href="<?=site_url('module/add'); ?>">Modules</a></li> -->
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['subscription_plan'])){ ?>
                <li><a href="<?=site_url('subscription_plan'); ?>"> <i class="fa fa-newspaper-o"></i>Subscription</a></li>
            <?php }?>
            <?php if (isset($permissions['reward_point'])){ ?>
                <li><a href="<?=site_url('reward_point'); ?>"> <i class="fa fa-percent"></i>Reward Point</a></li>
            <?php }?>
            <?php if(isset($permissions['offers'])){?>
                <li>
                    <a><i class="fa fa-percent"></i> Offers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if (in_array("index", $permissions['offers'])){?>
                            <li><a href="<?=site_url('offers'); ?>">View Offers</a></li>
                        <?php } if (in_array("add", $permissions['offers'])){?>
                            <li><a href="<?=site_url('offers/add'); ?>">Add Offer</a></li>
                        <?php }?>
                        
                    </ul>
                </li>
            <?php }?>

            <?php if(isset($permissions['offers'])){?>
                <li>
                    <a><i class="fa fa-percent"></i> Banners <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if (in_array("index", $permissions['offers'])){?>
                            <li><a href="<?=site_url('offers/banners'); ?>">View Banners</a></li>
                        <?php } if (in_array("add", $permissions['offers'])){?>
                            <li><a href="<?=site_url('offers/add_banner'); ?>">Add Banners</a></li>
                        <?php }?>
                        
                    </ul>
                </li>
            <?php }?>
           <!--  <?php if (isset($permissions['unit'])){ ?>
                <li><a href="<?=site_url('unit'); ?>"> <i class="fa fa-braille"></i>Units</a></li>
            <?php }?> -->
            <?php if (isset($permissions['attribute'])){ ?>
                <li><a href="<?=site_url('attribute'); ?>"> <i class="fa fa-cubes"></i>Attributes</a></li>
            <?php }?>
            <!--   <li><a href="<?=site_url('units'); ?>"> <i class="fa fa-newspaper-o"></i>Units</a></li> -->
            <?php if (isset($permissions['general'])){ ?>
                <li>
                    <a><i class="fa fa-database"></i> Category Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?=site_url('general/category'); ?>"> Categories</a></li>
                        <li><a href="<?=site_url('general/subcategory'); ?>"> Sub-Categories</a></li>
                        <li><a href="<?=site_url('general/assignment'); ?>"> Assignments</a></li>
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['product_vendor'])){ ?>
                <li><a><i class="fa fa-cubes"></i> Product Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?=site_url('product_vendor/add'); ?>"> Add product</a></li>
                        <li><a href="<?=site_url('product_vendor/products'); ?>"> All products</a></li>
                        <!--  <li><a href="<?=site_url('product_vendor/outproducts'); ?>"> Out of stock products</a></li> -->
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['design'])){ ?>
                <li><a href="<?=site_url('design'); ?>"> <i class="fa fa-paint-brush"></i> Design</a></li>
            <?php } ?>
            <?php if (isset($permissions['checklist'])){ ?>
                 <li><a href="<?=site_url('checklist'); ?>"> <i class="fa fa-newspaper-o"></i>Checklist</a></li>
            <?php }?>
            <?php if (isset($permissions['area'])){ ?>
                <li><a href="<?=site_url('area'); ?>"> <i class="fa fa-dashboard"></i> Area</a></li>
            <?php }?>
            <?php if (isset($permissions['project_type'])){ ?>
                <li><a href="<?=site_url('project_type'); ?>"> <i class="fa fa-dashboard"></i> Project Type</a></li>
            <?php }?>
            <?php if (isset($permissions['tag'])){ ?>
                <li><a href="<?=site_url('tag'); ?>"> <i class="fa fa-money"></i> Product Tag Management</a></li>
            <?php }?>
            <!--   <li><a href="<?=site_url('commissions'); ?>"> <i class="fa fa-money"></i> Commission Management</a></li> -->
            <?php if (isset($permissions['order_management'])){ ?>
                <li>
                    <a href="<?=site_url('order_management/orders'); ?>"><i class="fa fa-file-text"></i> Order Management <!-- <span class="fa fa-chevron-down"></span> --></a>
                    <!-- <ul class="nav child_menu">
                        <li><a href="<?=site_url('order_management/orders'); ?>"> All orders </a></li>
                        <li><a href="<?=site_url('order_management/refund'); ?>"> Refunds </a></li>
                        <li><a href="<?=site_url('order_management/replace'); ?>"> Replacement </a></li>
                    </ul> -->
                </li>
            <?php }?>
              <?php if (isset($permissions['request_delivery'])){ ?>
                 <li><a href="<?=site_url('request_delivery'); ?>"> <i class="fa fa-newspaper-o"></i>Request Delivery</a></li>
            <?php }?>
              <?php if (isset($permissions['custom_order'])){ ?>
                 <li><a href="<?=site_url('custom_order'); ?>"> <i class="fa fa-newspaper-o"></i>Custom Order</a></li>
            <?php }?>
            <?php if (isset($permissions['cart_management'])){ ?>
                 <li><a href="<?=site_url('cart_management'); ?>"> <i class="fa fa-newspaper-o"></i>Cart Management</a></li>
            <?php }?>
            <?php if (isset($permissions['delivery'])){ ?>
                <li><a href="<?=site_url('delivery'); ?>"> <i class="fa fa-newspaper-o"></i>Delivery Executive</a></li>
            <?php }?>
            <?php if (isset($permissions['extras']) || isset($permissions['faq'])){ ?>
                <li>
                    <a><i class="fa fa-cog"></i> CMS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if (isset($permissions['extras'])){ ?>
                            <li><a href="<?=site_url('extras/about'); ?>">About us</a></li>
                        <?php }if (isset($permissions['extras'])){ ?>
                            <li><a href="<?=site_url('extras/contactus'); ?>">Contact us</a></li>
                        <?php }if (isset($permissions['faq'])){ ?>
                            <li><a href="<?=site_url('faq/add'); ?>">FAQ</a></li>
                        <?php }if (isset($permissions['extras'])){ ?>
                            <li><a href="<?=site_url('extras/terms'); ?>">Terms and Conditions</a></li>
                        <?php }if (isset($permissions['extras'])){ ?>
                            <li><a href="<?=site_url('extras/privacy'); ?>">Privacy and Policy</a></li>
                        <?php }if (isset($permissions['extras'])){ ?>
                            <li><a href="<?=site_url('extras/social'); ?>">Social Links</a></li>
                        <?php }if(isset($permissions['extras'])){ ?>
                            <li><a href="<?=site_url('extras/cancellations'); ?>">Cancellations</a></li>
                        <?php }?>
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['extras'])){ ?>
                <li>
                    <a><i class="fa fa-cog"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                         <li><a href="<?=site_url('extras/csv'); ?>">CSV</a></li>
                        <li><a href="<?=site_url('extras/enquiries'); ?>">Enquery</a></li>
                        <li><a href="<?=site_url('extras/contact'); ?>">Contact us</a></li>
                        <li><a href="<?=site_url('extras/video_links'); ?>">Video Links</a></li>
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['general']['seo'])){ ?>
                <li>
                    <a><i class="fa fa-cloud"></i> SEO Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?=site_url('general/seo'); ?>"> Home page SEO </a></li>
                        <li><a href="<?=site_url('general/seo_product'); ?>"> Product SEO </a></li>
                    </ul>
                </li>
            <?php }?>
           
            <?php if (isset($permissions['settings'])){ ?>
                <li>
                    <a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?=site_url('settings/emails'); ?>">Email Templates</a></li>
                      <!--   <li><a href="<?=site_url('tax/tax_details'); ?>">Tax</a></li>
                        <li><a href="<?=site_url('general/banks'); ?>">Banks</a></li> -->
                    </ul>
                </li>
            <?php }?>
            <?php if (isset($permissions['roles'])){ ?>
                <li>
                    <a><i class="fa fa-cog"></i> Roles <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if (in_array("index", $permissions['roles'])){?>
                            <li><a href="<?=site_url('roles');?>">View Roles</a></li>
                        <?php }if (in_array("do_add_role", $permissions['roles'])){?>
                            <li><a href="<?=site_url('roles/add');?>">Add Role</a></li>
                        <?php }//if (in_array("admin_list", $permissions['roles'])){?>
                            <!-- <li><a href="<?=site_url('roles/permissions');?>">View Permissions</a></li> -->
                        <?php //}?>
                    </ul>
                </li>
            <?php }?>
              <?php if (isset($permissions['testimonials'])){ ?>
                 <li><a href="<?=site_url('testimonials'); ?>"> <i class="fa fa-newspaper-o"></i>Testimonials</a></li>
            <?php }?>
           
        </ul>
    </div>
</div>
</div>
</div>