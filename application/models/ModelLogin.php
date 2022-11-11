<?php


class ModelLogin extends CI_Model
{
	var $table = "user";
	var $primaryKey = "username";

	public function ceklogin($username,$password){
		return $this->db->get_where($this->table,['username'=>$username, 'password'=>$password])->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}
}
