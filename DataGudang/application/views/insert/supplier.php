<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Supplier'); ?>">Supplier</a>
        </li>
        <li class="breadcrumb-item active">Add Supplier</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Data Supplier</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Supplier/proses_add') ?>" method="GET">
            <div class="form-group">
              <label>Kode Supplier</label>
              <input type="text" class="form-control" name="kode" placeholder="Kode Supplier" required>
            </div>
            <div class="form-group">
              <label>Nama Supplier</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Supplier" required>
            </div>
            <div class="form-group">
              <label>Alamat Supplier</label>
              <input type="text" class="form-control" name="alamat" placeholder="Alamat Supplier" required>
            </div>
            <div class="form-group">
              <label>Email Supplier</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>No. Telp Supplier</label>
              <input type="text" class="form-control" name="telp" placeholder="No. Telp Supplier" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
        </div>
      </div>
    </div>