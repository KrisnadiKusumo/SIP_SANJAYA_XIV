<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelLogin');
	}

	public function index()
	{
		$this->load->view('content/login');
	}

	public function proseslogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->ModelLogin->ceklogin($username,$password);
		$row = $cek;
		if ($cek){
			$this->session->set_userdata('username',$row->username);
			$this->session->set_flashdata('pesan','Login Berhasil');
			redirect('Dashboard','refresh');
		}
		redirect('Login');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('Login');
	}
}
