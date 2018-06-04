<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Customer'); ?>">Customer</a>
        </li>
        <li class="breadcrumb-item active">Add Customer</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Data Customer</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Customer/proses_add') ?>" method="GET">
            <div class="form-group">
              <label>Kode Customer</label>
              <input type="text" class="form-control" name="kode" placeholder="Kode Customer" required>
            </div>
            <div class="form-group">
              <label>Nama Customer</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Customer" required>
            </div>
            <div class="form-group">
              <label>Alamat Customer</label>
              <input type="text" class="form-control" name="alamat" placeholder="Alamat Customer" required>
            </div>
            <div class="form-group">
              <label>Email Customer</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>No. Telp Customer</label>
              <input type="text" class="form-control" name="telp" placeholder="No. Telp Customer" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
        </div>
      </div>
    </div>