<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Merek'); ?>">Merek</a>
        </li>
        <li class="breadcrumb-item active">Edit Merek</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Merek</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Merek/proses_edit') ?>" method="GET">
              <input type="hidden" class="form-control" name="id" value="<?php echo $this->input->get('id'); ?>">
            <div class="form-group">
              <label>Nama Merek</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $this->input->get('nama'); ?>" placeholder="Nama Merek" required>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
          <br>
        </div>
      </div>
    </div>