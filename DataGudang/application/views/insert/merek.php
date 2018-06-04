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
        <li class="breadcrumb-item active">Add Merek</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Data Merek</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Merek/proses_add') ?>" method="GET">
            <div class="form-group">
              <label>Nama Merek</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Merek" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
        </div>
      </div>
    </div>