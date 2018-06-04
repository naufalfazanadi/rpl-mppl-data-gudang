<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User</li>
      </ol>
      <a href="<?php echo base_url('User/add'); ?>">
        <button class="btn btn-success">
          <span>
            <i class="fa fa-plus"></i>
          </span>
          Tambah User
        </button>
      </a>
      <br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data User</div>
        <div class="card-body page navigation">
          <form class="pagination justify-content-end" action="<?php echo base_url('User/get') ?>" method="GET">
            <div class="input-group" style="max-width: 50%">
              <div class="input-group-prepend">
                <span class="input-group-text">Search by:</span>
              </div>
              <select class="custom-select" name="getBy">
                <option value="ID_TIPE_USER" 
                  <?php if($this->input->get('getBy') == "ID_TIPE_USER") echo "selected" ?>>
                  Tipe User(1/2)
                </option>

                <option value="USERNAME" 
                  <?php if($this->input->get('getBy') == "USERNAME") echo "selected" ?>>
                  Username
                </option>

                <option value="NAMA_USER" 
                  <?php if($this->input->get('getBy') == "NAMA_USER") echo "selected" ?>>
                  Nama
                </option>

                <option value="EMAIL_USER" 
                  <?php if($this->input->get('getBy') == "EMAIL_USER") echo "selected" ?>>
                  Email
                </option>

                <option value="TELP_USER" 
                  <?php if($this->input->get('getBy') == "TELP_USER") echo "selected" ?>>
                  Telp
                </option>
              </select>
              <input class="form-control" name="search" type="text" value="<?php if($this->input->get('search')) echo $this->input->get('search') ?>" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><span><i class="fa fa-search"></i></span></button>
              <a class="btn btn-outline-success" href="<?php echo base_url('User') ?>"><span><i class="fa fa-refresh"></i> Refresh</span></a>
              </div>
            </div>
          </form>
          <small>*tipe admin:</small><br>
          <small>1 = admin account</small><br>
          <small>2 = standard account</small>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tipe User</th>
                  <th>Username</th>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>Telp</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($result as $hasil) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $hasil->ID_TIPE_USER; ?></td>
                  <td><?php echo $hasil->USERNAME; ?></td>
                  <td><?php echo $hasil->NAMA_USER; ?></td>
                  <td><?php echo $hasil->EMAIL_USER; ?></td>
                  <td><?php echo $hasil->TELP_USER; ?></td>
                  <td>
                    <a href="
                      <?php echo base_url('User/edit').
                        "?tipe=".$hasil->ID_TIPE_USER.
                        "&username=".$hasil->USERNAME.
                        "&nama=".$hasil->NAMA_USER.
                        "&email=".$hasil->EMAIL_USER.
                        "&telp=".$hasil->TELP_USER.
                        "&id=".$hasil->ID_AKUN;
                      ?>">
                      <button class="btn btn-warning rounded"><i class="fa fa-edit"></i> Edit</button></a>
                    <a href="<?php echo base_url('User/proses_delete')."?id=".$hasil->ID_AKUN;?>">
                      <button class="btn btn-danger rounded"><i class="fa fa-remove"></i> Hapus</button>
                    </a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>