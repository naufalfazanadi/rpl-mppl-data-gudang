<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('User'); ?>">User</a>
        </li>
        <li class="breadcrumb-item active">Edit User</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data User</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('User/proses_edit') ?>" method="GET">
              <input type="hidden" class="form-control" name="id" value="<?php echo $this->input->get('id'); ?>">
            <div class="form-group">
              <label>Tipe User</label>
              <select class="custom-select" name="tipe">
                <?php foreach ($result as $hasil) { ?>
                <option value="<?php echo $hasil->ID_TIPE_USER; ?>" 
                  <?php 
                    if ($hasil->ID_TIPE_USER == $this->input->get('id'))
                    {
                      echo "selected";
                    }
                  ?>
                  >
                  <?php echo $hasil->NAMA_TIPE_USER; ?>
                </option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $this->input->get('username'); ?>" required>
            </div>
            <div class="form-group">
              <label>Nama User</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $this->input->get('nama'); ?>" placeholder="Nama User" required>
            </div>
            <div class="form-group">
              <label>Email User</label>
              <input type="email" class="form-control" name="email" value="<?php echo $this->input->get('email'); ?>" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>No. Telp User</label>
              <input type="text" class="form-control" name="telp" value="<?php echo $this->input->get('telp'); ?>" placeholder="No. Telp User" required>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
          <br>
        </div>
      </div>
    </div>