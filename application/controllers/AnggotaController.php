<?php


class AnggotaController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('Login');
		}
		$this->load->model("ModelAnggota");
	}

	public function index()
	{
		$dataAnggota = $this->ModelAnggota->getAll();
		$data = array(
			"anggotas" => $dataAnggota,
			"isActive1" => '',
			"isActive2" => 'active',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => ''
		);
		$this->load->view('content/anggota/listAnggota', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){
		$data = array(
			"isActive1" => '',
			"isActive2" => 'active',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => ''
		);
		$this->load->view("content/anggota/formTambahAnggota",$data);
	}

	public function insert()
	{
		$foto = '';
		if($_FILES['foto_anggota']['tmp_name']) {
			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000;
			$config['max_width'] = 10000;
			$config['max_height'] = 10000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('foto_anggota');

			$gambar = $this->upload->data();
			$foto = $gambar['file_name'];
		}

		$data = array(
			"id_anggota" => $this->input->post("id_anggota"),
			"nama_anggota" => $this->input->post("nama_anggota"),
			"alamat_anggota" => $this->input->post("alamat_anggota"),
			"no_telp_anggota" => $this->input->post("no_telp_anggota"),
			"foto_anggota" => $foto,
		);

		$id = $this->ModelAnggota->insertGetId($data);
		redirect('AnggotaController');
	}


	public function ubah($id)
	{
		$anggota = $this->ModelAnggota->getByPrimaryKey($id);
		$data = array(
			"anggota" => $anggota,
			"isActive1" => '',
			"isActive2" => 'active',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => ''
		);
		$this->load->view('content/anggota/formUbahAnggota',$data);
	}

	public function Detail($id)
	{
		$anggota = $this->ModelAnggota->getByPrimaryKey($id);
		$data = array(
			"anggota" => $anggota,
			"isActive1" => '',
			"isActive2" => 'active',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => ''
		);
		$this->load->view('content/anggota/DetailAnggota',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_anggota');
		$data = array(
			"nama_anggota" => $this->input->post("nama_anggota"),
			"alamat_anggota" => $this->input->post("alamat_anggota"),
			"no_telp_anggota" => $this->input->post("no_telp_anggota")
		);
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
