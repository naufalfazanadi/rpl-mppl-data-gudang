<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_Supplier');
	}

	// MENU SUPPLIER HANYA UNTUK ADMIN
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
			$data['result'] = $this->M_Supplier->getAll();
			$this->load->view('header');
			$this->load->view('table/supplier', $data);
			$this->load->view('footer');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->M_Supplier->getBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/supplier', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('insert/supplier');
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('edit/supplier');
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_SUPPLIER'] = null;
		$data['KODE_SUPPLIER'] = $this->input->get('kode');
        $data['NAMA_SUPPLIER'] = $this->input->get('nama');
        $data['ALAMAT_SUPPLIER'] = $this->input->get('alamat');
        $data['EMAIL_SUPPLIER'] = $this->input->get('email');
        $data['TELP_SUPPLIER'] = $this->input->get('telp');

        $this->M_Supplier->insertData($data);

        redirect('supplier');
	}

	public function proses_edit()
	{
		$data['KODE_SUPPLIER'] = $this->input->get('kode');
        $data['NAMA_SUPPLIER'] = $this->input->get('nama');
        $data['ALAMAT_SUPPLIER'] = $this->input->get('alamat');
        $data['EMAIL_SUPPLIER'] = $this->input->get('email');
        $data['TELP_SUPPLIER'] = $this->input->get('telp');

        $this->M_Supplier->updateData($this->input->get('id'), $data);

        redirect('supplier');
	}

	public function proses_delete()
	{
        $this->M_Supplier->deleteData($this->input->get('id'));

        redirect('supplier');
	}
}
