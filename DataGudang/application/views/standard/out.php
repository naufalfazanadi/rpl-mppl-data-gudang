<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Barang</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Master Barang
        </div>
        <div class="card-body page navigation">
          <div class="pagination justify-content-end">
            <a href="<?php echo base_url('Barang/cart'); ?>"><button class="btn btn-warning rounded"><i class="fa fa-shopping-cart"></i>&nbsp;<?php echo $this->cart->total_items(). " Items"; ?></button></a><br>
          </div>
          <br>
          <form class="pagination justify-content-end" action="<?php echo base_url('Barang/get') ?>" method="GET">
            <div class="input-group" style="max-width: 50%">
              <div class="input-group-prepend">
                <span class="input-group-text">Search by:</span>
              </div>
              <select class="custom-select" name="getBy">
                <option value="KODE_BARANG" 
                  <?php if($this->input->get('getBy') == "KODE_BARANG") echo "selected" ?>>
                  Kode
                </option>

                <option value="NAMA_BARANG" 
                  <?php if($this->input->get('getBy') == "NAMA_BARANG") echo "selected" ?>>
                  Nama
                </option>

                <option value="NAMA_KATEGORI" 
                  <?php if($this->input->get('getBy') == "NAMA_KATEGORI") echo "selected" ?>>
                  Kategori
                </option>

                <option value="NAMA_MEREK" 
                  <?php if($this->input->get('getBy') == "NAMA_MEREK") echo "selected" ?>>
                  Merek
                </option>
              </select>
              <input class="form-control" name="search" type="text" value="<?php if($this->input->get('search')) echo $this->input->get('search') ?>" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><span><i class="fa fa-search"></i></span></button>
              <a class="btn btn-outline-success" href="<?php echo base_url('Barang') ?>"><span><i class="fa fa-refresh"></i> Refresh</span></a>
              </div>
            </div>
          </form>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Merek</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Merek</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($result as $hasil) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $hasil->KODE_BARANG; ?></td>
                  <td><?php echo $hasil->NAMA_BARANG; ?></td>
                  <td><?php echo $hasil->NAMA_KATEGORI; ?></td>
                  <td><?php echo $hasil->NAMA_MEREK; ?></td>
                  <td><?php echo $hasil->HARGA_BARANG; ?></td>
                  <td>
                    <?php 
                      $status = 0;
                      foreach ($stock as $stok) 
                      {
                        if ($hasil->ID_BARANG == $stok->ID_BARANG) 
                        {
                          echo $stok->JUMLAH_STOK;
                          $status = 1;
                          break;
                        }
                      }
                      if ($status == 0) 
                      {
                        echo "0";
                      }
                    ?>
                  </td>
                  <td>
                    <a href="
                      <?php echo base_url('Barang/addCart').
                        "?barang=".$hasil->ID_BARANG.
                        "&nama=".$hasil->NAMA_BARANG.
                        "&harga=".$hasil->HARGA_BARANG.
                        "&qty=1";
                      ?>">
                      <button class="btn btn-warning rounded" <?php if ($status == 0) {echo "disabled";} ?>><i class="fa fa-plus"></i> Add to Cart</button></a>
                    <!-- <a href=""><button class="btn btn-danger rounded">Hapus</button></a> -->
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