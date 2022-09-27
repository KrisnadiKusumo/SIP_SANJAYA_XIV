<?php

class BukuController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelBuku");
	}

	public function buku()
	{
		$dataBuku = $this->ModelBuku->getAllBuku();
		$data = array(
			"bukus" => $dataBuku
		);
		$this->load->view('content/buku/listBuku', $data);
	}

	public function fiksi()
	{
		$dataFiksi = $this->ModelBuku->getAllFiksi();
		$data = array(
			"fiksis" => $dataFiksi
		);
		$this->load->view('content/fiksi/listFiksi', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambahBuku(){
		$this->load->view("content/buku/formTambahBuku");
	}

	public function tambahFiksi(){
		$this->load->view("content/fiksi/formTambahFiksi");
	}

	public function insertBuku()
	{
		$data = array(
			"kode_buku" => $this->input->post("kode_buku"),
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);

		$id = $this->ModelBuku->insertGetId($data);
		redirect('BukuController/buku');
	}

	public function insertFiksi()
	{
		$data = array(
			"kode_buku" => $this->input->post("kode_buku"),
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);

		$id = $this->ModelBuku->insertGetId($data);
		redirect('BukuController/fiksi');
	}

	public function ubahBuku($id)
	{
		$buku = $this->ModelBuku->getByPrimaryKey($id);
		$data = array(
			"buku" => $buku,
		);
		$this->load->view('content/buku/formUbahBuku',$data);
	}

	public function ubahFiksi($id)
	{
		$buku = $this->ModelBuku->getByPrimaryKey($id);
		$data = array(
			"buku" => $buku,
		);
		$this->load->view('content/fiksi/formUbahFiksi',$data);
	}

	public function updateBuku()
	{
		$id = $this->input->post('kode_buku');
		$data = array(
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);
		$this->ModelBuku->update($id, $data);
		redirect('BukuController/buku');
	}

	public function updateFiksi()
	{
		$id = $this->input->post('kode_buku');
		$data = array(
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);
		$this->ModelBuku->update($id, $data);
		redirect('BukuController/fiksi');
	}

	public function deleteBuku()
	{
		$id = $this->input->post('kode_buku');
		$this->ModelBuku->delete($id);
		redirect('BukuController/buku');
	}

	public function deleteFiksi()
	{
		$id = $this->input->post('kode_buku');
		$this->ModelBuku->delete($id);
		redirect('BukuController/fiksi');
	}
}
