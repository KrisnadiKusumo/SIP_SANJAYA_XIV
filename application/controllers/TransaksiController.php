<?php

class TransaksiController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('Login');
		}
		$this->load->model("ModelTransaksi");
	}

	public function index()
	{
		$dataTransaksi = $this->ModelTransaksi->getAll();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active'
		);
		$this->load->view('content/transaksi/listTransaksi', $data);
	}

	public function active()
	{
		$dataTransaksi = $this->ModelTransaksi->getAllActive();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active'
		);
		$this->load->view('content/transaksi/listTransaksiActive', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){
		$data = array(
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active'
		);
		$this->load->view("content/transaksi/formTambahTransaksi", $data);
	}

	public function insert()
	{
		$deadline = date('Y-m-d', strtotime($this->input->post("tgl_pinjam").'+7 day'));
		$buku1 = $this->input->post("kode_buku");
		$buku2 = $this->input->post("kode_buku2");

		if ($buku1 != '' && $buku2 != ''){
			$dataTrans = array(
				"kode_transaksi" => $this->input->post("kode_transaksi"),
				"id_anggota" => $this->input->post("id_anggota")
			);
			$data1 = array(
				"kode_transaksi" => $this->input->post("kode_transaksi"),
				"kode_buku" => $this->input->post("kode_buku"),
				"tgl_pinjam" => $this->input->post("tgl_pinjam"),
				"status" => 1,
				"tgl_deadline" => $deadline
			);
			$data2 = array(
				"kode_transaksi" => $this->input->post("kode_transaksi"),
				"kode_buku" => $this->input->post("kode_buku2"),
				"tgl_pinjam" => $this->input->post("tgl_pinjam"),
				"status" => 1,
				"tgl_deadline" => $deadline
			);
			$id = $this->ModelTransaksi->insertGetIdTrans($dataTrans);
			$id = $this->ModelTransaksi->insertGetIdDet($data1);
			$id = $this->ModelTransaksi->insertGetIdDet($data2);
		}else if ($buku1 != '' && $buku2 == ''){
			$dataTrans = array(
				"kode_transaksi" => $this->input->post("kode_transaksi"),
				"id_anggota" => $this->input->post("id_anggota")
			);
			$data1 = array(
				"kode_transaksi" => $this->input->post("kode_transaksi"),
				"kode_buku" => $this->input->post("kode_buku"),
				"tgl_pinjam" => $this->input->post("tgl_pinjam"),
				"status" => 1,
				"tgl_deadline" => $deadline
			);
			$id = $this->ModelTransaksi->insertGetIdTrans($dataTrans);
			$id = $this->ModelTransaksi->insertGetIdDet($data1);
		}else if($buku1 == '' && $buku2 != ''){
			$dataTrans = array(
				"kode_transaksi" => $this->input->post("kode_transaksi"),
				"id_anggota" => $this->input->post("id_anggota")
			);
			$data1 = array(
				"kode_transaksi" => $this->input->post("kode_transaksi"),
				"kode_buku" => $this->input->post("kode_buku2"),
				"tgl_pinjam" => $this->input->post("tgl_pinjam"),
				"status" => 1,
				"tgl_deadline" => $deadline
			);
			$id = $this->ModelTransaksi->insertGetIdTrans($dataTrans);
			$id = $this->ModelTransaksi->insertGetIdDet($data1);
		}
		redirect('TransaksiController');
	}

	public function detail($id)
	{
		$dataDetail = $this->ModelTransaksi->getAllDetail($id);
		$data = array(
			"details" => $dataDetail,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active'
		);
		$this->load->view('content/transaksi/detailTransaksi', $data);
	}

	public function ubah($id)
	{
		$buku = $this->ModelBuku->getByPrimaryKey($id);
		$data = array(
			"buku" => $buku,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active'
		);
		$this->load->view('content/buku/formUbahBuku',$data);
	}

	public function ubahDetail($id){
		$detail = $this->ModelTransaksi->getDetailPrimary($id);
		$data = array(
			"detail" => $detail,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active'
		);
		$this->load->view("content/transaksi/formUbahDetail",$data);
	}

	public function updateDetail()
	{
		$idT = $this->input->post('kode_transaksi');
		$id = $this->input->post('kode_detail');
		$data = array(
			"tgl_pinjam" => $this->input->post("tgl_pinjam")
		);
		$this->ModelTransaksi->update($id, $data);
		redirect('TransaksiController/detail/'.$idT);
	}

	public function kembalikan($kode_transaksi)
	{
		$id = $this->input->post('kode_detail');
		$now = date("Y-m-d");
		$data = array(
			"status" => 0,
			"tgl_kembali"=> $now
		);
		$this->ModelTransaksi->update($id, $data);
		redirect('TransaksiController/detail/'.$kode_transaksi);
	}
}
