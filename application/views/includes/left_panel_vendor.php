    <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?=site_url('dashboard'); ?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a><i class="fa fa-users"></i> Users Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url('employees'); ?>">Employees</a></li>
                        </ul>
                    </li>
                <li><a><i class="fa fa-cubes"></i> Product Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?=site_url('product/add'); ?>"> Add product</a></li>
                        <li><a href="<?=site_url('product/products'); ?>"> All products</a></li>
                        <!--  <li><a href="<?=site_url('product/outproducts'); ?>"> Out of stock products</a></li> -->
                    </ul>
                </li>
            
                <li><a><i class="fa fa-file-text"></i> Order Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?=site_url('order/orders'); ?>"> All orders </a></li>
                    </ul>
                </li>
            </div>
        </div>
    <!-- /sidebar menu -->

    </div>
</div>
