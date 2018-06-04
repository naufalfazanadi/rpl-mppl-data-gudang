<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Gudang'); ?>">Gudang</a>
        </li>
        <li class="breadcrumb-item active">Add Gudang</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Data Gudang</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Gudang/proses_add') ?>" method="GET">
            <div class="form-group">
              <label>Kode Gudang</label>
              <input type="text" class="form-control" name="kode" placeholder="Kode Gudang" required>
            </div>
            <div class="form-group">
              <label>Nama Gudang</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Gudang" required>
            </div>
            <div class="form-group">
              <label>Alamat Gudang</label>
              <input type="text" class="form-control" name="alamat" placeholder="Alamat Gudang" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
        </div>
      </div>
    </div>