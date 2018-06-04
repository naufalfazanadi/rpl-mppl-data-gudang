<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Customer</li>
      </ol>
      <a href="<?php echo base_url('Customer/add'); ?>">
        <button class="btn btn-success">
          <span>
            <i class="fa fa-plus"></i>
          </span>
          Tambah Customer
        </button>
      </a>
      <br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Customer</div>
        <div class="card-body page navigation">
          <form class="pagination justify-content-end" action="<?php echo base_url('Customer/get') ?>" method="GET">
            <div class="input-group" style="max-width: 50%">
              <div class="input-group-prepend">
                <span class="input-group-text">Search by:</span>
              </div>
              <select class="custom-select" name="getBy">
                <option value="KODE_CUSTOMER" 
                  <?php if($this->input->get('getBy') == "KODE_CUSTOMER") echo "selected" ?>>
                  Kode
                </option>

                <option value="NAMA_CUSTOMER" 
                  <?php if($this->input->get('getBy') == "NAMA_CUSTOMER") echo "selected" ?>>
                  Nama
                </option>

                <option value="ALAMAT_CUSTOMER" 
                  <?php if($this->input->get('getBy') == "ALAMAT_CUSTOMER") echo "selected" ?>>
                  Alamat
                </option>

                <option value="EMAIL_CUSTOMER" 
                  <?php if($this->input->get('getBy') == "EMAIL_CUSTOMER") echo "selected" ?>>
                  Email
                </option>

                <option value="TELP_CUSTOMER" 
                  <?php if($this->input->get('getBy') == "TELP_CUSTOMER") echo "selected" ?>>
                  Telp
                </option>
              </select>
              <input class="form-control" name="search" type="text" value="<?php if($this->input->get('search')) echo $this->input->get('search') ?>" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><span><i class="fa fa-search"></i></span></button>
              <a class="btn btn-outline-success" href="<?php echo base_url('Customer') ?>"><span><i class="fa fa-refresh"></i> Refresh</span></a>
              </div>
            </div>
          </form>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat</th>
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
                  <td><?php echo $hasil->KODE_CUSTOMER; ?></td>
                  <td><?php echo $hasil->NAMA_CUSTOMER; ?></td>
                  <td><?php echo $hasil->ALAMAT_CUSTOMER; ?></td>
                  <td><?php echo $hasil->EMAIL_CUSTOMER; ?></td>
                  <td><?php echo $hasil->TELP_CUSTOMER; ?></td>
                  <td>
                    <a href="
                      <?php echo base_url('Customer/edit').
                        "?kode=".$hasil->KODE_CUSTOMER.
                        "&nama=".$hasil->NAMA_CUSTOMER.
                        "&alamat=".$hasil->ALAMAT_CUSTOMER.
                        "&email=".$hasil->EMAIL_CUSTOMER.
                        "&telp=".$hasil->TELP_CUSTOMER.
                        "&id=".$hasil->ID_CUSTOMER;
                      ?>">
                      <button class="btn btn-warning rounded"><i class="fa fa-edit"></i> Edit</button></a>
                    <a href="<?php echo base_url('Customer/proses_delete')."?id=".$hasil->ID_CUSTOMER;?>">
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