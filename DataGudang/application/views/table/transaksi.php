<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Transaksi</li>
      </ol>
      <h1>Transaksi</h1>
      <hr>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-black o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-plus"></i>
              </div>
              <div class="mr-5">
                <strong>Record Transaksi Masuk</strong>
                <!-- <p>asas<p> -->
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('Transaksi/masuk'); ?>">
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
                <i class="fa fa-fw fa-minus"></i>
              </div>
              <div class="mr-5">
                <strong>Record Transaksi Keluar</strong>
                <!-- <p>asas<p> -->
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('Transaksi/keluar'); ?>">
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
                <i class="fa fa-fw fa-exchange"></i>
              </div>
              <div class="mr-5">
                <strong>Record Detail Transaksi</strong>
                <!-- <p>asas<p> -->
              </div>
            </div>
            <a class="card-footer text-black clearfix small z-1" href="<?php echo base_url('Detail_Transaksi'); ?>">
              <span class="float-left">Masuk</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>