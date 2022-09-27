<?php


class ModelTransaksi extends CI_Model
{
	var $table = "transaksi";
	var $primaryKey = "kode_transaksi";

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->join('buku b','b.kode_buku = t.kode_buku','left');
		$query = $this->db->get();
		return $query->result();
	}

	// function untuk get data by primary_key
	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		return $this->db->where($this->primaryKey, $id)->delete($this->table);
	}
}
