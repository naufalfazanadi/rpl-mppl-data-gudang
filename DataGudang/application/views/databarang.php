<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Barang</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Master Barang</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
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
                <?php foreach ($result as $hasil) { ?>
                <tr>
                  <td><?php echo $hasil->KODE_BARANG; ?></td>
                  <td><?php echo $hasil->NAMA_BARANG; ?></td>
                  <td><?php echo $hasil->NAMA_KATEGORI; ?></td>
                  <td><?php echo $hasil->NAMA_MEREK; ?></td>
                  <td><?php echo $hasil->HARGA_BARANG; ?></td>
                  <td><?php echo $hasil->JUMLAH_STOK; ?></td>
                  <td>
                    <a href=""><button class="btn btn-warning rounded">Edit</button></a>
                    <a href=""><button class="btn btn-danger rounded">Hapus</button></a>
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