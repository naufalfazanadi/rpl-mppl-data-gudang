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

<body class="bg-dark">
  <div class="container" style="margin-top: 30px">
    <h1 align="center" style="color: white">Sistem Inventaris PT. Kita Bersama</h1>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" align="center">Transaction Done</div>
      <div class="card-body">
        <div class="alert alert-success" role="alert">
          <h6>Transaksi telah selesai</h6>
        </div>
        <h6>Silahkan kembali ke dashboard atau logout</h6>
        <div align="center">
          <a href="
          <?php 
            if($this->session->userdata('tipe') == "Admin")
            {
              echo base_url('Admin'); 
            }
            else
            {
              echo base_url('Standard'); 
            }
          ?>">
            <button class="btn btn-success">
              <span><i class="fa fa-dashboard"></i></span> Kembali ke Dashboard
            </button>
          </a>
          <br><br>
          <a href="<?php echo base_url('login/logout'); ?>">
            <button class="btn btn-danger">
              <span><i class="fa fa-sign-out"></i></span> Logout
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets') ?> /vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets') ?> /vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets') ?> /vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>