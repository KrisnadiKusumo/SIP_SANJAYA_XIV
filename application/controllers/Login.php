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
		$this->db->where('username',$username);
		$user = $this->db->get('user')->row();
		if ($user){
			if($user->password == $password) {
				$this->session->set_userdata('username', $user->username);
				$this->session->set_userdata('pesan', 'Login Berhasil');
				redirect('Dashboard', 'refresh');
			} else {
				$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Password salah!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			}
		} else{
			$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Username tidak ditemukan!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
		}
		redirect('Login');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('Login');
	}

	public function akunbaru()
	{
		$this->load->view('content/akunBaru');
	}

	public function prosesbaru()
	{
		$username = $this->input->post('username');
		$kode = $this->input->post("kode_verifikasi");
		if ($kode != 340110){
			$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Kode verifikasi salah!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			redirect('Login/akunbaru');
		}
		$password = $this->input->post("password");
		$password2 = $this->input->post("password-konfirmasi");
		if ($password != $password2) {
			$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Masukkan password dengan benar!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			redirect('Login/akunbaru');
		}
		$data = array(
			"username" => $username,
			"password" => $this->input->post("password")
		);
		$id = $this->ModelLogin->insert($data);
		$this->session->set_userdata('alert-login','<div class="alert alert-success alert-dismissible" role="alert">
						Akun berhasil dibuat!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
		redirect('Login');
	}

	public function usernameEmpty()
	{
		$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Username tidak boleh kosong!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
		redirect('Login');
	}

	public function ajaxCekUsername($username)
	{
		$this->db->where('username',$username);
		$cek = $this->db->get('user')->row();
		if($cek){
			echo '200';
		} else {
			echo '201';
		}
	}

	public function lupaPassword($username)
	{
		$this->db->where('username',$username);
		$cek = $this->db->get('user')->row();
		if(!$cek){
				$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Username tidak ditemukan!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
				redirect('Login');
		}
		$data['username'] = $username;
		$this->load->view('content/lupaPassword',$data);
	}

	public function prosesUbahPassword()
	{
		$username = $this->input->post('username');
		$kode = $this->input->post("kode_verifikasi");
		if ($kode != 340110){
			$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Kode verifikasi salah!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			redirect('Login/lupaPassword/'.$username);
		}
		$password = $this->input->post("password");
		$password2 = $this->input->post("password-konfirmasi");
		if ($password != $password2) {
			$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Masukkan password dengan benar!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			redirect('Login/lupaPassword/'.$username);
		}
		$data = array(
			"password" => $password
		);
		$this->ModelLogin->update($username, $data);
		$this->session->set_userdata('alert-login','<div class="alert alert-success alert-dismissible" role="alert">
						Password berhasil diubah!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
		redirect('Login');
	}
}
