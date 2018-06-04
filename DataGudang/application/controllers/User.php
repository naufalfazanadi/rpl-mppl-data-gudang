<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_User');
	}

	// MENU USER HANYA UNTUK ADMIN
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
			$data['result'] = $this->M_User->getAll();
			$this->load->view('header');
			$this->load->view('table/user', $data);
			$this->load->view('footer');
		}
	}

	public function get()
	{
		if ($this->verify())
		{
			$xparam = $this->input->get('getBy');
			$xargs = $this->input->get('search');
			$data['result'] = $this->M_User->getBy($xparam, $xargs);
			$this->load->view('header');
			$this->load->view('table/user', $data);
			$this->load->view('footer');
		}
	}

	public function getType()
	{
		if ($this->verify())
		{
			$data['result'] = $this->M_User->getAllType();
			return $data;
		}
	}

	public function add()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('insert/user', $this->getType());
			$this->load->view('footer');
		}
	}

	public function edit()
	{
		if ($this->verify())
		{
			$this->load->view('header');
			$this->load->view('edit/user', $this->getType());
			$this->load->view('footer');
		}
	}

	public function proses_add()
	{
		$data['ID_AKUN'] = null;
		$data['ID_TIPE_USER'] = $this->input->get('tipe');
        $data['USERNAME'] = $this->input->get('username');
        $data['PASSWORD'] = $this->input->get('password');
        $data['NAMA_USER'] = $this->input->get('nama');
        $data['EMAIL_USER'] = $this->input->get('email');
        $data['TELP_USER'] = $this->input->get('telp');

        $this->M_User->insertData($data);

        redirect('user');
	}

	public function proses_edit()
	{
		$data['ID_TIPE_USER'] = $this->input->get('tipe');
        $data['USERNAME'] = $this->input->get('username');
        $data['NAMA_USER'] = $this->input->get('nama');
        $data['EMAIL_USER'] = $this->input->get('email');
        $data['TELP_USER'] = $this->input->get('telp');

        $this->M_User->updateData($this->input->get('id'), $data);

        redirect('user');
	}

	public function proses_delete()
	{
        $this->M_User->deleteData($this->input->get('id'));

        redirect('user');
	}
}
