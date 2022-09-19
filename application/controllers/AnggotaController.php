<?php


class AnggotaController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelAnggota");
	}

	public function index()
	{
		$dataAnggota = $this->ModelAnggota->getAll();
		$data = array(
			"anggotas" => $dataAnggota
		);
		$this->load->view('content/anggota/listAnggota', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){
		$this->load->view("content/anggota/formTambahAnggota");
	}

	public function insert()
	{
		$data = array(
			"id_anggota" => $this->input->post("id_anggota"),
			"nama_anggota" => $this->input->post("nama_anggota"),
			"alamat_anggota" => $this->input->post("alamat_anggota"),
			"no_telp_anggota" => $this->input->post("no_telp_anggota"),

		);

		$id = $this->ModelAnggota->insertGetId($data);
		redirect('AnggotaController');
	}


	public function ubah($id)
	{
		$anggota = $this->ModelAnggota->getByPrimaryKey($id);
		$data = array(
			"anggota" => $anggota,
		);
		$this->load->view('content/anggota/formUbahAnggota',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_anggota');
		$data = array(
			"nama_anggota" => $this->input->post("nama_anggota"),
			"alamat_anggota" => $this->input->post("alamat_anggota"),
			"no_telp_anggota" => $this->input->post("no_telp_anggota")
		);
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelAnggota->update($id, $data);
		redirect('AnggotaController');
	}

	public function delete()
	{
		$id = $this->input->post('id_anggota');
		$this->ModelAnggota->delete($id);
		redirect('AnggotaController');
	}
}
