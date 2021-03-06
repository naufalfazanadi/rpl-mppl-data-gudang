<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Standard'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('Barang/out'); ?>">Ambil Barang</a>
        </li>
        <li class="breadcrumb-item active">Cart</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Cart
        </div>
        <div class="card-body page navigation">
          <div class="pagination justify-content-end">
            <button class="btn btn-warning rounded"><i class="fa fa-shopping-cart"></i>&nbsp;<?php echo $this->cart->total_items(). " Items"; ?></button></a><br>
          </div>
          <br>
          <div class="table-responsive">
            <form action="<?php echo base_url('Barang/updateCart') ?>" method="GET">
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
                  <td>
                    <input style="max-width: 50px" type="number" name="<?php echo "qty"."_".$i ?>" value="<?php echo $items['qty']; ?>">
                  </td>
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
            <button class="btn btn-primary" type="submit">Update Cart</button>
            <a class="btn btn-danger" href="<?php echo base_url('Barang/Checkout'); ?>">Checkout</a>
            </form>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>