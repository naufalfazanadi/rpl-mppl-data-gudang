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
        <li class="breadcrumb-item active">Edit Gudang</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Gudang</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Gudang/proses_edit') ?>" method="GET">
              <input type="hidden" class="form-control" name="id" value="<?php echo $this->input->get('id'); ?>">
            <div class="form-group">
              <label>Kode Gudang</label>
              <input type="text" class="form-control" name="kode" value="<?php echo $this->input->get('kode'); ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Gudang</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $this->input->get('nama'); ?>" placeholder="Nama Gudang" required>
            </div>
            <div class="form-group">
              <label>Alamat Gudang</label>
              <input type="text" class="form-control" name="alamat" value="<?php echo $this->input->get('alamat'); ?>" placeholder="Alamat Gudang" required>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
          <br>
        </div>
      </div>
    </div>