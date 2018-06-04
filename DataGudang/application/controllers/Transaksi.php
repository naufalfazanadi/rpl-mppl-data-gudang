<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('MV_Transaksi');
		$this->load->model('M_Customer');
		$this->load->model('M_Supplier');
		$this->load->model('M_User');
	}

	// MENU REKAP TRANSAKSI HANYA UNTUK ADMIN
	public function verify()
	{
		if ($this->session->userdata('isLoggedIn'))
		{
			if ($this->session->userdata('tipe') == "Admin")
			{
				return TRUE;
			}
			else
			{
				$this->load->view('blank');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}


	// MASTER TRANSAKSI
	public function index()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('table/transaksi');
			$this->load->view('footer');
		}
	}

	public function masuk()
	{
		if ($this->verify())
		{
			$data['result'] = $this->MV_Transaksi->getAllIn();
			$this->load->view('header');
			$this->load->view('table/transaksi_masuk', $data);
			$this->load->view('footer');
		}
	}

	public function keluar()
	{
		if ($this->verify())
		{
			$data['result'] = $this->MV_Transaksi->getAllOut();
			$this->load->view('header');
			$this->load->view('table/transaksi_keluar', $data);
			$this->load->view('footer');
		}
	}

	public function getByIn()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->MV_Transaksi->getByIn($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/transaksi_masuk', $data);
			$this->load->view('footer');
		}
	}

	public function getByOut()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->MV_Transaksi->getByOut($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/transaksi_keluar', $data);
			$this->load->view('footer');
		}
	}

	public function order()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('by');
			$xargs = $this->input->get('sort');
			$data['result'] = $this->MV_Transaksi->orderBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/transaksi_keluar', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$data['merek'] = $this->M_Merek->getAll();
			$data['kategori'] = $this->M_Kategori->getAll();
			$this->load->view('header');
			$this->load->view('insert/transaksi', $data);
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

        $this->MV_Transaksi->insertData($data);

        redirect('barang');
	}

	public function proses_edit()
	{
		$data['ID_KATEGORI'] = $this->input->get('kategori');
		$data['ID_MEREK'] = $this->input->get('merek');
		$data['KODE_BARANG'] = $this->input->get('kode');
        $data['NAMA_BARANG'] = $this->input->get('nama');
        $data['HARGA_BARANG'] = $this->input->get('harga');

        $this->MV_Transaksi->updateData($this->input->get('id'), $data);

        redirect('barang');
	}

	public function proses_delete()
	{
        $this->MV_Transaksi->deleteData($this->input->get('id'));

        redirect('barang');
	}
}
