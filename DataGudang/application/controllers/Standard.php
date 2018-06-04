<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('MV_Barang');
		$this->load->model('M_Supplier');
	}

	public function verify()
	{
		if ($this->session->userdata('isLoggedIn'))
		{
			if ($this->session->userdata('tipe') == "Standard")
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

	public function index()
	{
		if ($this->verify())
		{
			$data['countBarang'] = $this->MV_Barang->count();
			$this->load->view('header');
			$this->load->view('dashboard_standard', $data);
			$this->load->view('footer');
		}
	}

	// SUPPLIER
	public function supplier()
	{
		if ($this->verify())
		{
			$data['result'] = $this->M_Supplier->getAll();
			$this->load->view('header');
			$this->load->view('table/supplier', $data);
			$this->load->view('footer');
		}
	}

	public function supplierGetBy()
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

	public function addSupplier()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('insert/supplier');
			$this->load->view('footer');
		}
	}

	public function editSupplier()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('edit/supplier');
			$this->load->view('footer');
		}
	}

	public function proses_addSupplier()
	{
		$data['ID_SUPPLIER'] = null;
		$data['KODE_SUPPLIER'] = $this->input->get('kode');
        $data['NAMA_SUPPLIER'] = $this->input->get('nama');
        $data['ALAMAT_SUPPLIER'] = $this->input->get('alamat');
        $data['EMAIL_SUPPLIER'] = $this->input->get('email');
        $data['TELP_SUPPLIER'] = $this->input->get('telp');

        $this->M_Supplier->insertData($data);

        redirect('Admin/supplier');
	}

	public function proses_editSupplier()
	{
		$data['KODE_SUPPLIER'] = $this->input->get('kode');
        $data['NAMA_SUPPLIER'] = $this->input->get('nama');
        $data['ALAMAT_SUPPLIER'] = $this->input->get('alamat');
        $data['EMAIL_SUPPLIER'] = $this->input->get('email');
        $data['TELP_SUPPLIER'] = $this->input->get('telp');

        $this->M_Supplier->updateData($this->input->get('id'), $data);

        redirect('Admin/supplier');
	}

	public function proses_deleteSupplier()
	{
        $this->M_Supplier->deleteData($this->input->get('id'));

        redirect('Admin/supplier');
	}
}
