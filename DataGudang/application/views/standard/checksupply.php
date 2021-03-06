<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Standard'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Barang'); ?>">Barang</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Barang/Supplycart'); ?>">Supply Cart</a>
        </li>
        <li class="breadcrumb-item active">Checksupply</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Checksupply
        </div>
        <div class="card-body page navigation">
          <div class="table-responsive">
            <form action="<?php echo base_url('Barang/proses_checksupply') ?>" method="GET">
              <label>Pilih Supplier</label>
              <select class="custom-select" name="id_supplier">
                <?php foreach ($supplier as $value): ?>
                  <?php if ($value->ID_SUPPLIER != 99) { ?>
                <option value="<?php echo $value->ID_SUPPLIER ?>">
                  <?php echo $value->NAMA_SUPPLIER; ?>
                </option>
                  <?php } ?>
                <?php endforeach; ?>
              </select>
              <label>Pilih Gudang</label>
              <select class="custom-select" name="id_gudang">
                <?php foreach ($gudang as $value): ?>
                  <?php if ($value->ID_GUDANG != 99) { ?>
                <option value="<?php echo $value->ID_GUDANG ?>">
                  <?php echo $value->NAMA_GUDANG; ?>
                </option>
                  <?php } ?>
                <?php endforeach; ?>
              </select>
              <br><br>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Qty</th>
                  <th>Nama Barang</th>
                  <th>Harga Barang</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <input type="hidden" name="<?php echo "rowid"."_".$i ?>" value="<?php echo $items['rowid'] ?>">
                    <input type="hidden" name="<?php echo "qty"."_".$i ?>" value="<?php echo $items['qty']; ?>">
                  <td><?php echo $items['qty']; ?></td>
                  <td><?php echo $items['name']; ?></td>
                  <td>Rp <?php echo $this->cart->format_number($items['price']); ?></td>
                  <td>Rp <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                  <td colspan="3"> </td>
                  <td class="right"><strong>Total</strong></td>
                  <td class="right">Rp <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>
              </tbody>
            </table>
            <input type="hidden" name="n" value="<?php echo $i ?>">
            <button class="btn btn-danger" type="submit">Proses Transaksi</button>
            <a class="btn btn-secondary" href="<?php echo base_url('Barang/Cart'); ?>">Cancel</a>
            </form>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>