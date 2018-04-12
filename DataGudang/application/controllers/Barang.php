<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Barang');
	}

	public function index()
	{
		$data['result'] = $this->M_Barang->getAll();
		$this->load->view('v_barang', $data);
	}

	public function getByKode($xkode)
	{
		$data['result'] = $this->M_Barang->getByKode($xkode);
		$this->load->view('v_barang', $data);
	}

	public function getByNama($xnama)
	{
		$data['result'] = $this->M_Barang->getByNama($xnama);
		$this->load->view('v_barang', $data);
	}

	public function getByKategori($xkategori)
	{
		$data['result'] = $this->M_Barang->getByKategori($xkategori);
		$this->load->view('v_barang', $data);
	}

	public function getByMerek($xmerek)
	{
		$data['result'] = $this->M_Barang->getByMerek($xmerek);
		$this->load->view('v_barang', $data);
	}

	public function getByLetak($xletak)
	{
		$data['result'] = $this->M_Barang->getByLetak($xletak);
		$this->load->view('v_barang', $data);
	}
}
