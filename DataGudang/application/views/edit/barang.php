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
        <li class="breadcrumb-item active">Edit Barang</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Barang</div>
        <div class="card-body">
          <form class="" action="<?php echo base_url('Barang/proses_edit') ?>" method="GET">
              <input type="hidden" class="form-control" name="id" value="<?php echo $this->input->get('id'); ?>">
            <div class="form-group">
              <label>Kode Barang</label>
              <input type="text" class="form-control" name="kode" value="<?php echo $this->input->get('kode'); ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $this->input->get('nama'); ?>" placeholder="Nama Barang" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="custom-select" name="kategori">
                <?php foreach ($kategori as $hasil) { ?>
                <option value="<?php echo $hasil->ID_KATEGORI; ?>" 
                  <?php if($this->input->get('kategori') == $hasil->NAMA_KATEGORI) echo "selected" ?>>
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
                  <?php if($this->input->get('merek') == $hasil->NAMA_MEREK) echo "selected" ?>>
                  <?php echo $hasil->NAMA_MEREK; ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" class="form-control" name="harga" value="<?php echo $this->input->get('harga'); ?>" placeholder="Harga" required>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="<?php echo base_url('Barang/proses_delete')."?id=".$this->input->get('id');?>">
                      <button class="btn btn-danger rounded"><i class="fa fa-remove"></i> Hapus</button>
                    </a>
          </form>
          <br>
        </div>
      </div>
    </div>