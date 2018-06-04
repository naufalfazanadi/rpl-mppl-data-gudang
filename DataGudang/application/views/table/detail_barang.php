<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Detail Barang</li>
      </ol>
      <a href="<?php echo base_url('Detail_Barang/add'); ?>">
        <button class="btn btn-success">
          <span>
            <i class="fa fa-plus"></i>
          </span>
          Tambah Detail Barang
        </button>
      </a>
      <br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Detail Barang</div>
        <div class="card-body page navigation">
          <form class="pagination justify-content-end" action="<?php echo base_url('Detail_Barang/get') ?>" method="GET">
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

                <option value="NAMA_GUDANG" 
                  <?php if($this->input->get('getBy') == "NAMA_GUDANG") echo "selected" ?>>
                  Gudang
                </option>

                <option value="ALAMAT_GUDANG" 
                  <?php if($this->input->get('getBy') == "ALAMAT_GUDANG") echo "selected" ?>>
                  Alamat Gudang
                </option>

                <option value="LOKASI_BARANG" 
                  <?php if($this->input->get('getBy') == "LOKASI_BARANG") echo "selected" ?>>
                  Lokasi Barang
                </option>
              </select>
              <input class="form-control" name="search" type="text" value="<?php if($this->input->get('search')) echo $this->input->get('search') ?>" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><span><i class="fa fa-search"></i></span></button>
              <a class="btn btn-outline-success" href="<?php echo base_url('Detail_Barang') ?>"><span><i class="fa fa-refresh"></i> Refresh</span></a>
              </div>
            </div>
          </form>
          <form class="pagination justify-content-end" action="<?php echo base_url('Detail_Barang/stok') ?>" method="GET">
            <div class="input-group" style="max-width: 50%">
              <div class="input-group-prepend">
                <span class="input-group-text">Search by stok:</span>
              </div>
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
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Merek</th>
                  <th>Gudang</th>
                  <th>Alamat Gudang</th>
                  <th>Lokasi Barang</th>
                  <th>Stok</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Merek</th>
                  <th>Gudang</th>
                  <th>Alamat Gudang</th>
                  <th>Lokasi Barang</th>
                  <th>Stok</th>
                  <!-- <th>Action</th> -->
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
                  <td><?php echo $hasil->NAMA_GUDANG; ?></td>
                  <td><?php echo $hasil->ALAMAT_GUDANG; ?></td>
                  <td><?php echo $hasil->LOKASI_BARANG; ?></td>
                  <td><?php echo $hasil->STOK_BARANG; ?></td>
                  <!-- <td>
                    <a href="
                      <?php echo base_url('Detail_Barang/edit').
                        "?kode=".$hasil->KODE_BARANG.
                        "&nama=".$hasil->NAMA_BARANG.
                        "&kategori=".$hasil->NAMA_KATEGORI.
                        "&merek=".$hasil->NAMA_MEREK.
                        "&gudang=".$hasil->NAMA_GUDANG.
                        "&alamat=".$hasil->ALAMAT_GUDANG.
                        "&lokasi=".$hasil->LOKASI_BARANG.
                        "&stok=".$hasil->STOK_BARANG.
                        "&id=".$hasil->ID_DETAIL_BARANG;
                      ?>">
                      <button class="btn btn-warning rounded"><i class="fa fa-edit"></i> Edit</button></a> -->
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