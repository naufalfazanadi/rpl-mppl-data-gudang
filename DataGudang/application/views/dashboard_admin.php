<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <h1>Dashboard</h1>
      <hr>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cube"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan Master Barang</strong>
                <p><?php echo $countBarang; ?> items<p>
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('barang') ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan Kategori</strong>
                <p><?php echo $countKategori; ?> kategori<p>
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('kategori') ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-certificate"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan Merek</strong>
                <p><?php echo $countMerek; ?> merek<p>
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('merek') ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cogs"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan Stok dan Detail Barang</strong>
                <!-- <p>asas<p> -->
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="#">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-home"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan Gudang</strong>
                <p><?php echo $countGudang; ?> gudang<p>
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('gudang') ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-inbox"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan Supplier</strong>
                <p><?php echo $countSupplier; ?> supplier<p>
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('supplier') ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-smile-o"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan Customer</strong>
                <p><?php echo $countCustomer; ?> customer<p>
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('customer') ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">
                <strong>Pengelolaan User</strong>
                <p><?php echo $countUser; ?> users<p>
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('user') ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-exchange"></i>
              </div>
              <div class="mr-5">
                <strong>Record Transaksi</strong>
                <!-- <p>asas<p> -->
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="#">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>