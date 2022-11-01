<?php


class ModelLogin extends CI_Model
{
	public function ceklogin($username,$password){
		return $this->db->get_where('user',['username'=>$username, 'password'=>$password])->row();
	}
}
