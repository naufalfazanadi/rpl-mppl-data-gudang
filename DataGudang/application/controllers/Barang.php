<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->model('MV_Barang');
		$this->load->model('MV_Stok');
		$this->load->model('M_Kategori');
		$this->load->model('M_Merek');
		$this->load->model('M_Gudang');
		$this->load->model('M_Supplier');
		$this->load->model('M_Customer');
		$this->load->model('MV_Transaksi');
		$this->load->model('MV_Detail_Transaksi');
	}

	// MENU MASTER BARANG
	public function verify()
	{
		if ($this->session->userdata('isLoggedIn'))
		{
			// Jika HANYA UNTUK ADMIN
			if ($this->session->userdata('tipe') == "Admin")
			{
				return 1;
			}

			// Jika HANYA UNTUK Standard User
			else
			{
				return 2;
			}
		}
		else
		{
			// $this->load->view('login');
			redirect('login');
		}
	}


	// MASTER BARANG
	public function index()
	{
		if ($this->verify() == 1)
		{
			$data['result'] = $this->MV_Barang->getAll();
			$data['stock'] = $this->MV_Stok->getAll();
			$this->load->view('header');
			$this->load->view('table/barang', $data);
			$this->load->view('footer');
		}

		else if ($this->verify() == 2)
		{
			redirect('standard');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->MV_Barang->getBy($xparam, $xargs);
			$data['stock'] = $this->MV_Stok->getAll();
			$this->load->view('header');
			if ($this->verify() == 1)
			{
				$this->load->view('table/barang', $data);
			}
			else
			{
				if ($this->input->get('page') == "out") 
				{
					$this->load->view('standard/out', $data);
				}
				else
				{
					$this->load->view('standard/supply', $data);
				}
			}
			$this->load->view('footer');
		}
	}

	public function order()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('by');
			$xargs = $this->input->get('sort');
			$data['result'] = $this->MV_Barang->orderBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/barang', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify() == 1)
		{
			$data['merek'] = $this->M_Merek->getAll();
			$data['kategori'] = $this->M_Kategori->getAll();
			$this->load->view('header');
			$this->load->view('insert/barang', $data);
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify() == 1)
		{
			$data['merek'] = $this->M_Merek->getAll();
			$data['kategori'] = $this->M_Kategori->getAll();
			$this->load->view('header');
			$this->load->view('edit/barang', $data);
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_BARANG'] = null;
		$data['ID_KATEGORI'] = $this->input->get('kategori');
		$data['ID_MEREK'] = $this->input->get('merek');
		$data['KODE_BARANG'] = $this->input->get('kode');
        $data['NAMA_BARANG'] = $this->input->get('nama');
        $data['HARGA_BARANG'] = $this->input->get('harga');

        $this->MV_Barang->insertData($data);

        redirect('barang');
	}

	public function proses_edit()
	{
		$data['ID_KATEGORI'] = $this->input->get('kategori');
		$data['ID_MEREK'] = $this->input->get('merek');
		$data['KODE_BARANG'] = $this->input->get('kode');
        $data['NAMA_BARANG'] = $this->input->get('nama');
        $data['HARGA_BARANG'] = $this->input->get('harga');

        $this->MV_Barang->updateData($this->input->get('id'), $data);

        redirect('barang');
	}

	public function proses_delete()
	{
        $this->MV_Barang->deleteData($this->input->get('id'));

        redirect('barang');
	}



	// ===========================================================
	// STANDARD USER LEVEL
	public function out()
	{
		if ($this->verify() == 2)
		{
			$data['result'] = $this->MV_Barang->getAll();
			$data['stock'] = $this->MV_Stok->getAll();
			$this->load->view('header_standard');
			$this->load->view('standard/out', $data);
			$this->load->view('footer');
		}
	}

	public function cart()
	{
		if ($this->verify() == 2)
		{
			$this->load->view('header_standard');
			$this->load->view('standard/cart');
			$this->load->view('footer');
		}
	}

	public function addCart()
	{
		$x = rand(1,999);

		$data = array(
		        'id'      => $this->input->get('barang')."_".$x,
		        'qty'     => $this->input->get('qty'),
		        'price'   => $this->input->get('harga'),
		        'name'    => $this->input->get('nama'),
		        'id_barang' => $this->input->get('barang')
		);

		$this->cart->insert($data);

		redirect('barang/out');
	}

	public function updateCart()
	{
		$n = $this->input->get('n');
		for ($i=1; $i <= $n; $i++) 
		{ 
			$data = array(
		        'rowid' => $this->input->get('rowid_'.$i),
		        'qty'   => $this->input->get('qty_'.$i)
			);

			$this->cart->update($data);
		}


		// $this->cart->update($data);
		redirect('barang/cart');
	}

	public function checkout()
	{
		$data['customer'] = $this->M_Customer->getAll();

		if ($this->verify() == 2)
		{
			$this->load->view('header_standard');
			$this->load->view('standard/checkout', $data);
			$this->load->view('footer');
		}
	}

	public function proses_checkout()
	{
		$x = rand(1, 100);
		if ($x < 10) 
		{
			$unique = date("dmy")."00".$x;
		}
		else if ($x < 100) 
		{
			$unique = date("dmy")."0".$x;
		}
		else
		{
			$unique = date("dmy").$x;
		}

		$data['ID_TRANSAKSI'] = null;
		$data['ID_TIPE_TRANSAKSI'] = 2;
		$data['ID_CUSTOMER'] = $this->input->get('id_customer');
		$data['ID_AKUN'] = $this->session->userdata('id');
        $data['ID_SUPPLIER'] = 99;
        $data['KODE_TRANSAKSI'] = $unique;
        $data['WAKTU_TRANSAKSI'] = date("Y-m-d H:m:s");
        $data['JUMLAH_QTY'] = $this->cart->total_items();
        $data['JUMLAH_HARGA'] = $this->cart->total();


        $this->MV_Transaksi->insertData($data);

        $data['current'] = $this->MV_Transaksi->getBy("KODE_TRANSAKSI", $data['KODE_TRANSAKSI']);
        $current_id_transaksi = $data['current'][0]->ID_TRANSAKSI;
        echo $current_id_transaksi;

        foreach ($this->cart->contents() as $items)
        {
        	$detail['ID_DETAIL_TRANSAKSI'] = null;
        	$detail['ID_BARANG'] = $items['id_barang'];
        	$detail['ID_TRANSAKSI'] = $current_id_transaksi;
        	$detail['HARGA_JUAL'] = $items['price'];
        	$detail['QTY'] = $items['qty'];

        	$this->MV_Detail_Transaksi->insertData($detail);
        }

        $this->cart->destroy();

        $this->load->view('done');
	}

	public function supply()
	{
		if ($this->verify() == 2)
		{
			$data['barang'] = $this->MV_Barang->getAll();
			$data['stock'] = $this->MV_Stok->getAll();
			$this->load->view('header_standard');
			$this->load->view('standard/supply', $data);
			$this->load->view('footer');
		}
	}

	public function supplyCart()
	{
		if ($this->verify() == 2)
		{
			$this->load->view('header_standard');
			$this->load->view('standard/supplyCart');
			$this->load->view('footer');
		}
	}

	public function addSupplyCart()
	{
		$x = rand(1,999);

		$data = array(
		        'id'      => $this->input->get('barang')."_".$x,
		        'qty'     => $this->input->get('qty'),
		        'price'   => $this->input->get('harga'),
		        'name'    => $this->input->get('nama'),
		        'id_barang' => $this->input->get('barang')
		);

		$this->cart->insert($data);

		redirect('barang/supply');
	}

	public function updateSupplyCart()
	{
		$n = $this->input->get('n');
		for ($i=1; $i <= $n; $i++) 
		{ 
			$data = array(
		        'rowid' => $this->input->get('rowid_'.$i),
		        'qty'   => $this->input->get('qty_'.$i)
			);

			$this->cart->update($data);
		}

		redirect('barang/supplycart');
	}

	public function checksupply()
	{
		$data['gudang'] = $this->M_Gudang->getAll();
		$data['supplier'] = $this->M_Supplier->getAll();

		if ($this->verify() == 2)
		{
			$this->load->view('header_standard');
			$this->load->view('standard/checksupply', $data);
			$this->load->view('footer');
		}
	}

	public function proses_checksupply()
	{
		$x = rand(1, 100);
		if ($x < 10) 
		{
			$unique = date("dmy")."00".$x;
		}
		else if ($x < 100) 
		{
			$unique = date("dmy")."0".$x;
		}
		else
		{
			$unique = date("dmy").$x;
		}

		$data['ID_TRANSAKSI'] = null;
		$data['ID_TIPE_TRANSAKSI'] = 2;
		$data['ID_CUSTOMER'] = 99;
		$data['ID_AKUN'] = $this->session->userdata('id');
        $data['ID_SUPPLIER'] = $this->input->get('id_supplier');
        $data['KODE_TRANSAKSI'] = $unique;
        $data['WAKTU_TRANSAKSI'] = date("Y-m-d H:m:s");
        $data['JUMLAH_QTY'] = $this->cart->total_items();
        $data['JUMLAH_HARGA'] = $this->cart->total();


        $this->MV_Transaksi->insertData($data);

        $data['current'] = $this->MV_Transaksi->getBy("KODE_TRANSAKSI", $data['KODE_TRANSAKSI']);
        $current_id_transaksi = $data['current'][0]->ID_TRANSAKSI;
        echo $current_id_transaksi;

        foreach ($this->cart->contents() as $items)
        {
        	$detail['ID_DETAIL_TRANSAKSI'] = null;
        	$detail['ID_BARANG'] = $items['id_barang'];
        	$detail['ID_TRANSAKSI'] = $current_id_transaksi;
        	$detail['HARGA_JUAL'] = $items['price'];
        	$detail['QTY'] = $items['qty'];

        	$this->MV_Detail_Transaksi->insertData($detail);
        }

        $this->cart->destroy();

        $this->load->view('done');
	}
}