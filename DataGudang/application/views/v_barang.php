<body>
	<div id="container" style="margin-left: 50px; margin-top: 80px">
		<nav aria-label="Page navigation example" style="margin-right: 100px">
		  <ul class="pagination justify-content-end">
		    <li class="page-item disabled">
		      <a class="page-link" href="#" tabindex="-1">Previous</a>
		    </li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item">
		      <a class="page-link" href="#">Next</a>
		    </li>
		  </ul>
		</nav>
		<a href="<?php echo base_url().'v_insert' ?>"><button class="btn btn-info rounded">Tambah Barang Baru</button></a><br><br>
		<div id="body">
			<table border="2" cellpadding="15">
				<thead class="thead-dark">
				<tr>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Kategori</th>
					<th>Merek</th>
					<th>Harga</th>
					<th>Stok</th>
					<th>ACTION</th>
				</tr>
				</thead>
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
			</table>
			<br><a href="<?php echo base_url().'v_insert' ?>"><button class="btn btn-info rounded">Tambah Barang Baru</button></a><br><br>
		</div>
	</div>
</body>