<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Inventaris PT. Kita Bersama</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url('assets') ?> /vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets') ?> /vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets') ?> /css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Sistem Inventaris PT. Kita Bersama</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url('Admin'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Barang">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBarang" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Barang</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseBarang">
            <li>
              <a href="<?php echo base_url('Barang') ?>"><i class="fa fa-fw fa-cube"></i> Master Barang</a>
            </li>
            <li>
              <a href="<?php echo base_url('kategori') ?>"><i class="fa fa-fw fa-list"></i> Kategori</a>
            </li>
            <li>
              <a href="<?php echo base_url('merek') ?>"><i class="fa fa-fw fa-certificate"></i> Merek</a>
            </li>
            <li>
              <a href="<?php echo base_url('Detail_barang') ?>"> <i class="fa fa-fw fa-cogs"></i> Stok dan Detail Barang</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo base_url('gudang') ?>">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Gudang</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo base_url('Supplier') ?>">
            <i class="fa fa-fw fa-inbox"></i>
            <span class="nav-link-text">Supplier</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo base_url('Customer') ?>">
            <i class="fa fa-fw fa-smile-o"></i>
            <span class="nav-link-text">Customer</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo base_url('User') ?>">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">User</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transaksi">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTransaksi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-exchange"></i>
            <span class="nav-link-text">Record Transaksi</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseTransaksi">
            <li>
              <a href="<?php echo base_url('Transaksi/masuk') ?>"><i class="fa fa-fw fa-plus"></i> Masuk</a>
            </li>
            <li>
              <a href="<?php echo base_url('Transaksi/keluar') ?>"><i class="fa fa-fw fa-minus"></i> Keluar</a>
            </li>
            <li>
              <a href="<?php echo base_url('Detail_Transaksi') ?>"><i class="fa fa-fw fa-exchange"></i> Detail Transaksi</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text"><?php echo $this->session->userdata('nama'); ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown" style="min-width: 300px">
            <h6 class="dropdown-header"><?php echo $this->session->userdata('nama')." (".$this->session->userdata('tipe').")"; ?></h6>
            <div class="dropdown-divider"></div>
            <table cellpadding="2px" style="margin: 20px">
              <tr>
                <td>Nama</td>
                <td>: </td>
                <td><?php echo $this->session->userdata('nama'); ?></td> 
              </tr>
              <tr>
                <td>Username</td>
                <td>: </td>
                <td><?php echo $this->session->userdata('username'); ?></td> 
              </tr>
              <tr>
                <td>Email</td>
                <td>: </td>
                <td><?php echo $this->session->userdata('email'); ?></td> 
              </tr>
              <tr>
                <td>Telp</td>
                <td>: </td>
                <td><?php echo $this->session->userdata('telp'); ?></td> 
              </tr>
            </table>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>