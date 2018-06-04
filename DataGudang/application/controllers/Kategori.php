<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_Kategori');
	}

	// MENU KATEGORI HANYA UNTUK ADMIN
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

	// KATEGORI
	public function index()
	{
		if ($this->verify())
		{
			$data['result'] = $this->M_Kategori->getAll();
			$this->load->view('header');
			$this->load->view('table/kategori', $data);
			$this->load->view('footer');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->M_Kategori->getBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/kategori', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('insert/kategori');
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('edit/kategori');
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_KATEGORI'] = null;
        $data['KODE_KATEGORI'] = $this->input->get('kode');
        $data['NAMA_KATEGORI'] = $this->input->get('nama');

        $this->M_Kategori->insertData($data);

        redirect('kategori');
	}

	public function proses_edit()
	{
		$data['KODE_KATEGORI'] = $this->input->get('kode');
        $data['NAMA_KATEGORI'] = $this->input->get('nama');

        $this->M_Kategori->updateData($this->input->get('id'), $data);

        redirect('kategori');
	}

	public function proses_delete()
	{
        $this->M_Kategori->deleteData($this->input->get('id'));

        redirect('kategori');
	}
}
