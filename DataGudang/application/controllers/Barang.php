<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('MV_Barang');
		$this->load->model('M_Kategori');
		$this->load->model('M_Merek');
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


	// MASTER BARANG
	public function index()
	{
		if ($this->verify())
		{
			$data['result'] = $this->MV_Barang->getAll();
			$this->load->view('header');
			$this->load->view('table/barang', $data);
			$this->load->view('footer');
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
			$this->load->view('table/barang', $data);
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
		if ($this->verify())
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
		if ($this->verify())
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
}
