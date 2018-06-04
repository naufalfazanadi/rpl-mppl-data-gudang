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
      <div class="card-header" align="center">Login</div>
      <div class="card-body">
        <form action="<?php echo base_url('login/proses_login') ?>" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email atau Username</label>
            <input class="form-control" id="exampleInputEmail1" name="username" type="text" placeholder="Masukkan email atau username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
          </div>
          <?php if ($this->session->userdata('isWrong')) { ?>
            <div class="alert alert-danger" role="alert">
              Maaf, username atau password yang anda masukkan salah
            </div>
          <?php } ?>
          <input class="btn btn-primary btn-block" type="submit" value="Login">
        </form>
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