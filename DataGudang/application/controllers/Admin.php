<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('MV_Barang');
		$this->load->model('MV_Transaksi');
		$this->load->model('MV_Detail_Transaksi');
		$this->load->model('M_Customer');
		$this->load->model('M_Gudang');
		$this->load->model('M_Kategori');
		$this->load->model('M_Merek');
		$this->load->model('M_Supplier');
		$this->load->model('M_User');
	}

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

	public function index()
	{
		if ($this->verify())
		{
			$data['countBarang'] = $this->MV_Barang->count();
			$data['countCustomer'] = $this->M_Customer->count();
			$data['countGudang'] = $this->M_Gudang->count();
			$data['countKategori'] = $this->M_Kategori->count();
			$data['countMerek'] = $this->M_Merek->count();
			$data['countSupplier'] = $this->M_Supplier->count();
			$data['countUser'] = $this->M_User->count();
			$data['countTransaksiIn'] = $this->MV_Transaksi->countIn();
			$data['countTransaksiOut'] = $this->MV_Transaksi->countOut();
			$data['countDetailTransaksi'] = $this->MV_Detail_Transaksi->count();
			
			$this->load->view('header');
			$this->load->view('dashboard_admin', $data);
			$this->load->view('footer');
		}
	}
}
