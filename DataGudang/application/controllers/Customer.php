<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Customer');
	}

	public function index()
	{
		$data['result'] = $this->M_Customer->getAll();
		$this->load->view('v_customer', $data);
	}

	public function getByKode($xkode)
	{
		$data['result'] = $this->M_Customer->getbyKode($xkode);
		$this->load->view('v_customer', $data);
	}

	public function getByNama($xnama)
	{
		$data['result'] = $this->M_Customer->getbyNama($xnama);
		$this->load->view('v_customer', $data);
	}

	public function getByAlamat($xalamat)
	{
		$data['result'] = $this->M_Customer->getbyAlamat($xalamat);
		$this->load->view('v_customer', $data);
	}

	public function getByEmail($xemail)
	{
        $xemail = str_replace("%40", "@", $xemail);
		$data['result'] = $this->M_Customer->getbyEmail($xemail);
		$this->load->view('v_customer', $data);
	}

	public function getByTelp($xmerek)
	{
		$data['result'] = $this->M_Customer->getbyTelp($xmerek);
		$this->load->view('v_customer', $data);
	}
}
