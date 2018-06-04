<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_Customer');
	}

	// MENU CUSTOMER HANYA UNTUK ADMIN
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

	// CUSTOMER
	public function index()
	{
		if ($this->verify())
		{
			$data['result'] = $this->M_Customer->getAll();
			$this->load->view('header');
			$this->load->view('table/customer', $data);
			$this->load->view('footer');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->M_Customer->getBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/customer', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('insert/customer');
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('edit/customer');
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_CUSTOMER'] = null;
		$data['KODE_CUSTOMER'] = $this->input->get('kode');
        $data['NAMA_CUSTOMER'] = $this->input->get('nama');
        $data['ALAMAT_CUSTOMER'] = $this->input->get('alamat');
        $data['EMAIL_CUSTOMER'] = $this->input->get('email');
        $data['TELP_CUSTOMER'] = $this->input->get('telp');

        $this->M_Customer->insertData($data);

        redirect('customer');
	}

	public function proses_edit()
	{
		$data['KODE_CUSTOMER'] = $this->input->get('kode');
        $data['NAMA_CUSTOMER'] = $this->input->get('nama');
        $data['ALAMAT_CUSTOMER'] = $this->input->get('alamat');
        $data['EMAIL_CUSTOMER'] = $this->input->get('email');
        $data['TELP_CUSTOMER'] = $this->input->get('telp');

        $this->M_Customer->updateData($this->input->get('id'), $data);

        redirect('customer');
	}

	public function proses_delete()
	{
        $this->M_Customer->deleteData($this->input->get('id'));

        redirect('customer');
	}
}
