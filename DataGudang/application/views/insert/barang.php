<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Admin'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Barang'); ?>">Barang</a>
        </li>
        <li class="breadcrumb-item active">Add Barang</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Add Data Barang</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Barang/proses_add') ?>" method="GET">
            <div class="form-group">
              <label>Kode Barang</label>
              <input type="text" class="form-control" name="kode" placeholder="Kode Barang" required>
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Barang" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="custom-select" name="kategori">
                <?php foreach ($kategori as $hasil) { ?>
                <option value="<?php echo $hasil->ID_KATEGORI; ?>" 
                  >
                  <?php echo $hasil->NAMA_KATEGORI; ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Merek</label>
              <select class="custom-select" name="merek">
                <?php foreach ($merek as $hasil) { ?>
                <option value="<?php echo $hasil->ID_MEREK; ?>" 
                  >
                  <?php echo $hasil->NAMA_MEREK; ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" min="1" class="form-control" name="harga" placeholder="Harga" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
        </div>
      </div>
    </div>