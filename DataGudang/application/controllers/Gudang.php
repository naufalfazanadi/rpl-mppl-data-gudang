<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_Gudang');
	}

	// MENU GUDANG HANYA UNTUK ADMIN
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

	// SUPPLIER
	public function index()
	{
		if ($this->verify())
		{
			$data['result'] = $this->M_Gudang->getAll();
			$this->load->view('header');
			$this->load->view('table/gudang', $data);
			$this->load->view('footer');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->M_Gudang->getBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/gudang', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('insert/gudang');
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('edit/gudang');
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_GUDANG'] = null;
        $data['KODE_GUDANG'] = $this->input->get('kode');
        $data['NAMA_GUDANG'] = $this->input->get('nama');
        $data['ALAMAT_GUDANG'] = $this->input->get('alamat');

        $this->M_Gudang->insertData($data);

        redirect('gudang');
	}

	public function proses_edit()
	{
		$data['KODE_GUDANG'] = $this->input->get('kode');
        $data['NAMA_GUDANG'] = $this->input->get('nama');
        $data['ALAMAT_GUDANG'] = $this->input->get('alamat');

        $this->M_Gudang->updateData($this->input->get('id'), $data);

        redirect('gudang');
	}

	public function proses_delete()
	{
        $this->M_Gudang->deleteData($this->input->get('id'));

        redirect('gudang');
	}
}
