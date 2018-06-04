<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Kategori'); ?>">Kategori</a>
        </li>
        <li class="breadcrumb-item active">Add Kategori</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Data Kategori</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Kategori/proses_add') ?>" method="GET">
            <div class="form-group">
              <label>Kode Kategori</label>
              <input type="text" class="form-control" name="kode" placeholder="Kode Kategori" required>
            </div>
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
        </div>
      </div>
    </div>