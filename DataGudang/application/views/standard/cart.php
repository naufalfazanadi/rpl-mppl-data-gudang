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
            <button class="btn btn-warning rounded"><i class="fa fa-shopping-cart"></i>&nbsp;<?php echo $this->cart->total_items(). " Items"; ?></button></a><br>
          </div>
          <br>
          <?php echo form_open('barang/updateCart'); ?>
          <div class="table-responsive">
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
                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                  <td><?php echo $items['name']; ?></td>
                  <td><?php echo $this->cart->format_number($items['price']); ?></td>
                  <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                  <td colspan="3"> </td>
                  <td class="right"><strong>Total</strong></td>
                  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>
              </tbody>
            </table>
            <p><?php echo form_submit('', 'Update your Cart'); ?></p>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>