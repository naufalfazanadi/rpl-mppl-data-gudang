<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Customer</title>

		<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
		</style>
	</head>
	<body>
		<div id="container">
			<h1>Customer</h1>
			<div id="body">
				<table border="2" cellpadding="10">
					<tr>
						<td>Kode Customer</td>
						<td>Nama Customer</td>
						<td>Alamat</td>
						<td>Email</td>
						<td>Telepon</td>
						<td>ACTION</td>
					</tr>
					<?php foreach ($result as $hasil) { ?>
						<tr>
							<td><?php echo $hasil->kode_customer; ?></td>
							<td><?php echo $hasil->nama_customer; ?></td>
							<td><?php echo $hasil->alamat_customer; ?></td>
							<td><a href="mailto:<?php echo $hasil->email; ?>"><?php echo $hasil->email; ?></a></td>
							<td><?php echo $hasil->telp; ?></td>
							<td>
								<a href=""><button>Edit</button></a>
								<a href=""><button>Hapus</button></a>
							</td>
						</tr>
					<?php } ?>
				</table>
				<br><br><a href="<?php echo base_url().'v_insert' ?>"><button>Tambah</button></a><br>
			</div>
		</div>
	</body>
</html>