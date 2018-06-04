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
        <li class="breadcrumb-item active">Edit Kategori</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Kategori</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Kategori/proses_edit') ?>" method="GET">
              <input type="hidden" class="form-control" name="id" value="<?php echo $this->input->get('id'); ?>">
            <div class="form-group">
              <label>Kode Kategori</label>
              <input type="text" class="form-control" name="kode" value="<?php echo $this->input->get('kode'); ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $this->input->get('nama'); ?>" placeholder="Nama Kategori" required>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
          <br>
        </div>
      </div>
    </div>