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
        <li class="breadcrumb-item active">Edit Supplier</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Supplier</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Supplier/proses_edit') ?>" method="GET">
              <input type="hidden" class="form-control" name="id" value="<?php echo $this->input->get('id'); ?>">
            <div class="form-group">
              <label>Kode Supplier</label>
              <input type="text" class="form-control" name="kode" value="<?php echo $this->input->get('kode'); ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Supplier</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $this->input->get('nama'); ?>" placeholder="Nama Supplier" required>
            </div>
            <div class="form-group">
              <label>Alamat Supplier</label>
              <input type="text" class="form-control" name="alamat" value="<?php echo $this->input->get('alamat'); ?>" placeholder="Alamat Supplier" required>
            </div>
            <div class="form-group">
              <label>Email Supplier</label>
              <input type="email" class="form-control" name="email" value="<?php echo $this->input->get('email'); ?>" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>No. Telp Supplier</label>
              <input type="text" class="form-control" name="telp" value="<?php echo $this->input->get('telp'); ?>" placeholder="No. Telp Supplier" required>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
          <br>
        </div>
      </div>
    </div>