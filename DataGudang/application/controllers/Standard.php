<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('MV_Barang');
		$this->load->model('MV_Stok');
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
			$this->load->view('header_standard');
			$this->load->view('dashboard_standard');
			$this->load->view('footer');
		}
	}
}
