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
        <li class="breadcrumb-item active">Add User</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Data User</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('User/proses_add') ?>" method="GET">
            <div class="form-group">
              <label>Tipe User</label>
              <select class="custom-select" name="tipe">
                <?php foreach ($result as $hasil) { ?>
                <option value="<?php echo $hasil->ID_TIPE_USER; ?>" selected>
                  <?php echo $hasil->NAMA_TIPE_USER; ?>
                </option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label>Nama User</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama User" required>
            </div>
            <div class="form-group">
              <label>Email User</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>No. Telp User</label>
              <input type="text" class="form-control" name="telp" placeholder="No. Telp User" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
        </div>
      </div>
    </div>