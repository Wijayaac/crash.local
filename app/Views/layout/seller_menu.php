<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>

    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Crash</a>
            <!-- <a href="index.html" class="logo"><img src="<?= base_url() ?>/assets/images/logo.png" height="24" alt="logo"></a> -->
        </div>
    </div>


    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>

                <li class="menu-title">Product</li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-heart"></i><span> Product </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url('seller/view'); ?>">View Product</a></li>
                        <li><a href="<?= site_url('seller/create'); ?>">Add Product</a></li>
                    </ul>
                </li>

                <li class="menu-title">Sales Report</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-bar"></i><span> Sales </span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url('seller/report'); ?>">Selling Stats</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->