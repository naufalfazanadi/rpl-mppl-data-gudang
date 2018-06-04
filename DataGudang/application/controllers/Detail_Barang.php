<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('MV_Detail_Barang');
		$this->load->model('M_Kategori');
		$this->load->model('M_Merek');
		$this->load->model('M_Gudang');
	}

	// MENU MASTER BARANG HANYA UNTUK ADMIN
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


	// DETAIL BARANG
	public function index()
	{
		if ($this->verify())
		{
			$data['result'] = $this->MV_Detail_Barang->getAll();
			$this->load->view('header');
			$this->load->view('table/detail_barang', $data);
			$this->load->view('footer');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->MV_Detail_Barang->getBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/detail_barang', $data);
			$this->load->view('footer');
		}
	}

	public function stok()
	{
		if ($this->verify())
		{
			$xmin = $this->input->get('min');
			$xmax = $this->input->get('max');
			$data['result'] = $this->MV_Detail_Barang->stok($xmin, $xmax);
			$this->load->view('header');
			$this->load->view('table/detail_barang', $data);
			$this->load->view('footer');
		}
	}

	public function order()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('by');
			$xargs = $this->input->get('sort');
			$data['result'] = $this->MV_Detail_Barang->orderBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/detail_barang', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$data['merek'] = $this->M_Merek->getAll();
			$data['kategori'] = $this->M_Kategori->getAll();
			$data['gudang'] = $this->M_Gudang->getAll();
			$this->load->view('header');
			$this->load->view('insert/detail_barang', $data);
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify())
		{
			$data['merek'] = $this->M_Merek->getAll();
			$data['kategori'] = $this->M_Kategori->getAll();
			$data['gudang'] = $this->M_Gudang->getAll();
			$this->load->view('header');
			$this->load->view('edit/detail_barang', $data);
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_DETAIL_BARANG'] = null;
		$data['ID_BARANG'] = $this->input->get('barang');
		$data['ID_GUDANG'] = $this->input->get('gudang');
		$data['STOK_BARANG'] = $this->input->get('stok');
        $data['LOKASI_BARANG'] = $this->input->get('lokasi');

        $this->MV_Detail_Barang->insertData($data);

        redirect('detail_barang');
	}

	public function proses_edit()
	{
		$data['ID_BARANG'] = $this->input->get('barang');
		$data['ID_GUDANG'] = $this->input->get('gudang');
		$data['STOK_BARANG'] = $this->input->get('stok');
        $data['LOKASI_BARANG'] = $this->input->get('lokasi');

        $this->MV_Detail_Barang->updateData($this->input->get('id'), $data);

        redirect('detail_barang');
	}

	public function proses_delete()
	{
        $this->MV_Detail_Barang->deleteData($this->input->get('id'));

        redirect('detail_barang');
	}
}
