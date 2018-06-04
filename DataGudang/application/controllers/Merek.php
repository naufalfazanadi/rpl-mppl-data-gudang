<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_Merek');
	}

	// MENU MEREK HANYA UNTUK ADMIN
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
			$data['result'] = $this->M_Merek->getAll();
			$this->load->view('header');
			$this->load->view('table/merek', $data);
			$this->load->view('footer');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->M_Merek->getBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/merek', $data);
			$this->load->view('footer');
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('insert/merek');
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('edit/merek');
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_MEREK'] = null;
        $data['NAMA_MEREK'] = $this->input->get('nama');

        $this->M_Merek->insertData($data);

        redirect('merek');
	}

	public function proses_edit()
	{
        $data['NAMA_MEREK'] = $this->input->get('nama');

        $this->M_Merek->updateData($this->input->get('id'), $data);

        redirect('merek');
	}

	public function proses_delete()
	{
        $this->M_Merek->deleteData($this->input->get('id'));

        redirect('merek');
	}
}
