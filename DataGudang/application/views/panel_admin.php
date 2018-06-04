<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Inventory Barang</title>

    <link rel="icon" type="image/gif/png" href="mouse_select_left.png">

    <link rel="stylesheet" href="<?php echo base_url()."assets/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/fontawesome-all.min.css" ?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/scss/style.css" ?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Panel Kiri -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="./"><h4>PANEL ADMIN</h4></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo site_url('admin') ?>"> <i class="menu-icon fa fa-tachometer-alt"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="menu-icon fa fa-laptop"></i>Barang</a>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="menu-icon fa fa-warehouse"></i>Gudang</a>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="menu-icon fa fa-shopping-cart"></i>Transaksi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="#">Masuk</a></li>
                            <li><i class="fa fa-table"></i><a href="#">Keluar</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="menu-icon fa fa-th"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="menu-icon fa fa-tasks"></i>Supplier</a>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="menu-icon fa fa-users"></i>Customer</a>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="menu-icon fa fa-user"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                    <li>
                        <a href="#"> 
                            <i class="menu-icon fa fa-sign-out-alt"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
    <!-- Right Panel -->

        <!-- Header-->  
        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><i class="menu-icon fa fa-truck"></i> Inventaris Barang PT. Kita Bersama</h1>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <!-- Right Panel -->

    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
</body>
</html>
