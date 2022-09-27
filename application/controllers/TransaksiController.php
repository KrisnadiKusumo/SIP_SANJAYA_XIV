<?php

class TransaksiController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelTransaksi");
	}

	public function index()
	{
		$dataTransaksi = $this->ModelTransaksi->getAll();
		$data = array(
			"transaksis" => $dataTransaksi
		);
		$this->load->view('content/transaksi/listTransaksi', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){
		$this->load->view("content/transaksi/formTambahTransaksi");
	}

	public function insert()
	{
		$deadline = date('Y-m-d', strtotime($this->input->post("tgl_pinjam").'+7 day'));
		$data = array(
			"kode_transaksi" => $this->input->post("kode_transaksi"),
			"id_anggota" => $this->input->post("id_anggota"),
			"kode_buku" => $this->input->post("kode_buku"),
			"tgl_pinjam" => $this->input->post("tgl_pinjam"),
			"status" => $this->input->post("status"),
			"tgl_deadline" => $deadline
		);

		$id = $this->ModelTransaksi->insertGetId($data);
		redirect('TransaksiController');
	}


	public function ubah($id)
	{
		$buku = $this->ModelBuku->getByPrimaryKey($id);
		$data = array(
			"buku" => $buku,
		);
		$this->load->view('content/buku/formUbahBuku',$data);
	}

	public function update()
	{
		$id = $this->input->post('kode_buku');
		$data = array(
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku")
		);
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelBuku->update($id, $data);
		redirect('BukuController');
	}

	public function kembali()
	{
		$id = $this->input->post('kode_transaksi');
		$now = date("Y-m-d");
		$data = array(
			"status" => 'Sudah',
			"tgl_kembali"=> $now
		);
		$this->ModelTransaksi->update($id, $data);
		redirect('TransaksiController');
	}
}
