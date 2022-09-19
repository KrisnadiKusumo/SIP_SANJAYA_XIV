<?php

class FiksiController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelFiksi");
	}

	public function index()
	{
		$dataFiksi = $this->ModelFiksi->getAll();
		$data = array(
			"fiksis" => $dataFiksi
		);
		$this->load->view('content/fiksi/listFiksi', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){
		$this->load->view("content/fiksi/formTambahFiksi");
	}

	public function insert()
	{
		$data = array(
			"kode_fiksi" => $this->input->post("kode_fiksi"),
			"judul_fiksi" => $this->input->post("judul_fiksi"),
			"pengarang_fiksi" => $this->input->post("pengarang_fiksi"),
			"klasifikasi_fiksi" => $this->input->post("klasifikasi_fiksi"),
			"sumber_asal_fiksi" => $this->input->post("sumber_asal_fiksi"),
			"bahasa_fiksi" => $this->input->post("bahasa_fiksi"),
			"macam_fiksi" => $this->input->post("macam_fiksi"),
			"harga_fiksi" => $this->input->post("harga_fiksi"),
			"keterangan_fiksi" => $this->input->post("keterangan_fiksi"),
			"jumlah_fiksi" => $this->input->post("jumlah_fiksi"),
		);

		$id = $this->ModelFiksi->insertGetId($data);
		redirect('FiksiController');
	}


	public function ubah($id)
	{
		$fiksi = $this->ModelFiksi->getByPrimaryKey($id);
		$data = array(
			"fiksi" => $fiksi,
		);
		$this->load->view('content/fiksi/formUbahFiksi',$data);
	}

	public function update()
	{
		$id = $this->input->post('kode_fiksi');
		$data = array(
			"judul_fiksi" => $this->input->post("judul_fiksi"),
			"pengarang_fiksi" => $this->input->post("pengarang_fiksi"),
			"klasifikasi_fiksi" => $this->input->post("klasifikasi_fiksi"),
			"sumber_asal_fiksi" => $this->input->post("sumber_asal_fiksi"),
			"bahasa_fiksi" => $this->input->post("bahasa_fiksi"),
			"macam_fiksi" => $this->input->post("macam_fiksi"),
			"harga_fiksi" => $this->input->post("harga_fiksi"),
			"keterangan_fiksi" => $this->input->post("keterangan_fiksi"),
			"jumlah_fiksi" => $this->input->post("jumlah_fiksi"),
		);
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelFiksi->update($id, $data);
		redirect('FiksiController');
	}

	public function delete()
	{
		$id = $this->input->post('kode_fiksi');
		$this->ModelFiksi->delete($id);
		redirect('FiksiController');
	}
}
