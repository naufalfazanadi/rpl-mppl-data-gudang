<div class="content-wrapper">
    <div class="container-fluid">
      <h1 align="center" class="d-none d-print-block">Sistem Inventaris PT. Kita Bersama</h1>
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Transaksi'); ?>">Transaksi</a>
        </li>
        <li class="breadcrumb-item active">Transaksi Masuk</li>
      </ol>
      <button onclick="window.print()" class="d-print-none btn btn-success">
        <span>
          <i class="fa fa-print"></i>
        </span>
        &nbsp; Print
      </button>
      <br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Master Transaksi Masuk</div>
        <div class="card-body page navigation">
          <form class="d-print-none pagination justify-content-end" action="<?php echo base_url('Transaksi/getByIn') ?>" method="GET">
            <div class="input-group" style="max-width: 50%">
              <div class="input-group-prepend">
                <span class="input-group-text">Search by:</span>
              </div>
              <select class="custom-select" name="getBy">
                <option value="KODE_TRANSAKSI" 
                  <?php if($this->input->get('getBy') == "KODE_TRANSAKSI") echo "selected" ?>>
                  Kode Transaksi
                </option>

                <option value="USERNAME" 
                  <?php if($this->input->get('getBy') == "USERNAME") echo "selected" ?>>
                  Username
                </option>

                <option value="NAMA_SUPPLIER" 
                  <?php if($this->input->get('getBy') == "NAMA_SUPPLIER") echo "selected" ?>>
                  Supplier
                </option>
              </select>
              <input class="form-control" name="search" type="text" value="<?php if($this->input->get('search')) echo $this->input->get('search') ?>" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><span><i class="fa fa-search"></i></span></button>
              <a class="btn btn-outline-success" href="<?php echo base_url('Transaksi/masuk') ?>"><span><i class="fa fa-refresh"></i> Refresh</span></a>
              </div>
            </div>
          </form>
          <form class="d-print-none pagination justify-content-end" action="<?php echo base_url('Transaksi/getByRangeIn') ?>" method="GET">
            <div class="input-group" style="max-width: 50%">
              <div class="input-group-prepend">
                <span class="input-group-text">Search by:</span>
              </div>
              <select class="custom-select" name="getBy">
                <option value="JUMLAH_QTY" 
                  <?php if($this->input->get('getBy') == "JUMLAH_QTY") echo "selected" ?>>
                  Quantity
                </option>

                <option value="WAKTU_TRANSAKSI" 
                  <?php if($this->input->get('getBy') == "WAKTU_TRANSAKSI") echo "selected" ?>>
                  Waktu
                </option>

                <option value="JUMLAH_HARGA" 
                  <?php if($this->input->get('getBy') == "JUMLAH_HARGA") echo "selected" ?>>
                  Jumlah Harga
                </option>
              </select>
              <input class="form-control" name="min" type="text" value="<?php if($this->input->get('min')) echo $this->input->get('min') ?>" placeholder="Min" required>
              <div class="input-group-prepend">
                <span class="input-group-text">-</span>
              </div>
              <input class="form-control" name="max" type="text" value="<?php if($this->input->get('max')) echo $this->input->get('max') ?>" placeholder="Max" required>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><span><i class="fa fa-search"></i></span></button>
              </div>
            </div>
          </form>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Tipe</th>
                  <th>Username</th>
                  <th>Supplier</th>
                  <th>Waktu</th>
                  <th>Quantity</th>
                  <th>Jumlah Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($result as $hasil) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $hasil->KODE_TRANSAKSI; ?></td>
                  <td><?php echo $hasil->NAMA_TIPE_TRANSAKSI; ?></td>
                  <td><?php echo $hasil->USERNAME; ?></td>
                  <td><?php echo $hasil->NAMA_SUPPLIER; ?></td>
                  <td><?php echo $hasil->WAKTU_TRANSAKSI; ?></td>
                  <td><?php echo $hasil->JUMLAH_QTY; ?></td>
                  <td><?php echo $hasil->JUMLAH_HARGA; ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="d-print-none card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        <div class="d-none d-print-block card-footer small text-muted">Printed on 
          <?php 
            date_default_timezone_set("Asia/Jakarta");
            echo date("d-m-Y")." ".date("h:i:s"); 
          ?>              
        </div>
      </div>
    </div>