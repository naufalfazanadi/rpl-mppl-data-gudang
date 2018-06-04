<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($page_name)) {echo $page_name .' - Data Gudang PT. Kita Bersama';} else echo "Dashboard - Data Gudang PT. Kita Bersama" ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/fontawesome-all.min.css" ?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/scss/style.css" ?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<header style="height: 60px; background: #ffffff; color: black;" class="">
	<?php
		$cur_date = date('l, d F Y');
		if ($this->session->userdata('log_in')) {
			?>
			<p class="lead" style="float: right; padding-right: 15px; margin-top: 11px;"><?php echo $cur_date ?> | <?php echo $this->session->userdata('username') ?></p>
			<?php
		}
	?>
	
	<div style="padding-left: 20px; padding-top: 2px;">
		<h2 style="margin: 0">Data Gudang PT. Kita Bersama</h2>
		<p style="margin: 0;">By: Resky & Nurmaulani</p>
	</div>
</header>
<div class="row" style="margin-bottom: -10px;">
<div class="container-fluid main-content" >

