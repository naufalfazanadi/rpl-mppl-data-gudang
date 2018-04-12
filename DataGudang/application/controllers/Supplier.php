<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Supplier');
	}

	public function index()
	{
		$data['result'] = $this->M_Supplier->getAll();
		$this->load->view('v_supplier', $data);
	}

	public function getByKode($xkode)
	{
		$data['result'] = $this->M_Supplier->getbyKode($xkode);
		$this->load->view('v_supplier', $data);
	}

	public function getByNama($xnama)
	{
		$data['result'] = $this->M_Supplier->getbyNama($xnama);
		$this->load->view('v_supplier', $data);
	}

	public function getByAlamat($xalamat)
	{
		$data['result'] = $this->M_Supplier->getbyAlamat($xalamat);
		$this->load->view('v_supplier', $data);
	}

	public function getByEmail($xemail)
	{
        $xemail = str_replace("%40", "@", $xemail);
		$data['result'] = $this->M_Supplier->getbyEmail($xemail);
		$this->load->view('v_supplier', $data);
	}

	public function getByTelp($xmerek)
	{
		$data['result'] = $this->M_Supplier->getbyTelp($xmerek);
		$this->load->view('v_supplier', $data);
	}
}
