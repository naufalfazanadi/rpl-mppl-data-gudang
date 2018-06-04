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
		$this->load->model('MV_Transaksi');
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
			$this->out();
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->MV_Barang->getBy($xparam, $xargs);
			$this->load->view('header');
			if ($this->verify() == 1)
			{
				$this->load->view('table/barang', $data);
			}
			else
			{

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
			$this->load->view('header');
			$this->load->view('standard/out', $data);
			$this->load->view('footer');
		}
	}

	public function cart()
	{
		if ($this->verify() == 2)
		{
			$this->load->view('header');
			$this->load->view('standard/cart');
			$this->load->view('footer');
		}
	}

	public function addCart()
	{
		$x = rand(1,999);
		/*if ($x < 10) 
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
		}*/

		// echo $unique;

		$data = array(
		        'id'      => $this->input->get('barang')."_".$x,
		        'qty'     => $this->input->get('qty'),
		        'price'   => $this->input->get('harga'),
		        'name'    => $this->input->get('nama'),
		        'id_barang' => $this->input->get('barang')
		);

		$this->cart->insert($data);

		redirect('barang');
	}

	public function updateCart()
	{
		// Recieve post values,calcute them and update
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];

			$data = array(
			'rowid' => $rowid,
			'price' => $price,
			'amount' => $amount,
			'qty' => $qty
			);

			$this->cart->update($data);
		}
		redirect('barang/cart');
	}
}