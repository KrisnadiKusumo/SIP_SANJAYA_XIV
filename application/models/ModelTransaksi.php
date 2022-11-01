<?php


class ModelTransaksi extends CI_Model
{
	var $table = "transaksi";
	var $table2 = "detail";
	var $primaryKey = "kode_transaksi";
	var $primaryKey2 = "kode_detail";

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllDetail($id)
	{
		$this->db->select('*');
		$this->db->from('detail d');
		$this->db->join('transaksi t','t.kode_transaksi = d.kode_transaksi','left');
		$this->db->join('buku b','b.kode_buku = d.kode_buku','left');
		$this->db->where('d.kode_transaksi',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getIdTrans($id)
	{
		$this->db->select('t.kode_transaksi');
		$this->db->from('detail d');
		$this->db->join('transaksi t','t.kode_transaksi = d.kode_transaksi','left');
		$this->db->where('d.kode_detail',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getDetailPrimary($id)
	{
		$this->db->select('*');
		$this->db->from('detail d');
		$this->db->join('transaksi t','t.kode_transaksi = d.kode_transaksi','left');
		$this->db->join('buku b','b.kode_buku = d.kode_buku','left');
		$this->db->where('d.kode_detail',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getNewNomor()
	{
		$this->db->select_ifnull(max('kode_transaksi'==0));
		$query = $this->db->get();
		return $query->row()->nomor + 1;
	}

	public function createNoTransasaksi()
	{
		$newNomor = self::getNewNomor();
		$kodeTransaksi = 'TRX-'.date('Y').'-'.date('M').'-'.date('D').'-'
			.str_pad($newNomor,5,'0',STR_PAD_LEFT);
	}

	public function getAllActive()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->join('buku b','b.kode_buku = t.kode_buku','left');
		$this->db->where('t.status','belum');
		$query = $this->db->get();
		return $query->result();
	}

	// function untuk get data by primary_key
	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function jumlahTransaksi(){
		return $this->db
			->where(['status'=>'1'])
			->from("detail")
			->count_all_results();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function insertGetIdDet($data)
	{
		$this->db->insert($this->table2, $data);
		return $this->db->insert_id();
	}

	public function insertGetIdTrans($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey2, $id);
		return $this->db->update($this->table2, $data);
	}


	public function delete($id)
	{
		return $this->db->where($this->primaryKey, $id)->delete($this->table);
	}
}
