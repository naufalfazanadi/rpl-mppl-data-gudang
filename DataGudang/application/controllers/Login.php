<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_User');
	}

	public function index()
	{
		if ($this->session->userdata('isLoggedIn'))
		{
			if ($this->session->userdata('tipe') == "Admin")
			{
				redirect('Admin');
			}
			else
			{
				redirect('Standard');
			}
		}
		
		else
		{
			$this->load->view('login');
		}
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$record = $this->M_User->login($username, $password);

		if ($record)
		{
			$row = $record->row();
			$tipe;

			if ($row->ID_TIPE_USER == 1) 
			{
				$tipe = "Admin";
			}
			else
			{
				$tipe = "Standard";
			}

			$arSession = [
				'isLoggedIn' => TRUE,
				'id' => $row->ID_AKUN,
				'username' => $row->USERNAME,
				'password' => $row->PASSWORD,
				'nama' => $row->NAMA_USER,
				'email' => $row->EMAIL_USER,
				'telp' => $row->TELP_USER,
				'tipe' => $tipe,
				'isWrong' => 0
			];

			$this->session->set_userdata($arSession);
			redirect('Login');
		}
		else
		{
			$arSession = [
				// status login gagal (untuk flash message bahwa username / password salah)
				'isWrong' => 1
			];
			$this->session->set_userdata($arSession);
			redirect('Login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("Login");
	}
}
