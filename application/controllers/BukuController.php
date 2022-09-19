<?php

class BukuController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelBuku");
	}

	public function index()
	{
		$dataBuku = $this->ModelBuku->getAll();
		$data = array(
			"bukus" => $dataBuku
		);
		$this->load->view('content/buku/listBuku', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){
		$this->load->view("content/buku/formTambahBuku");
	}

	public function insert()
	{
		$data = array(
			"kode_buku" => $this->input->post("kode_buku"),
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku")
		);

		$id = $this->ModelBuku->insertGetId($data);
		redirect('BukuController');
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

	public function delete()
	{
		$id = $this->input->post('kode_buku');
		$this->ModelBuku->delete($id);
		redirect('BukuController');
	}
}
