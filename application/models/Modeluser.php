<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeluser extends CI_Model {

	function user_list()
	{
		$hasil=$this->db->get('user');
		return $hasil->result();
	}

	function simpan_user($username,$email,$password)
	{
		$hasil=$this->db->query("insert into user (username,email,password) values ('$username','$email','$password')");
		return $hasil;
	}

	function get_user_by_id($username)
	{
		$hsl=$this->db->query("select *from user where username='$username' ");
		if($hsl->num_rows()>0)
		{
			foreach ($hsl->result() as $data) {
				$hasil=array(
				'username'=>$data->username,
				'email'=>$data->email,
				'password'=>$data->password,
				);
				
			}
		}
		return $hasil;
	}

	function update_user($username,$email,$password){
		$hasil=$this->db->query("UPDATE user SET password='$password',email='$email' WHERE username='$username'");
		return $hasil;
	}

	function hapus_user($username){
		$hasil=$this->db->query("DELETE FROM user WHERE username='$username'");
		return $hasil;
	}

}

/* End of file Modeluser.php */
/* Location: ./application/models/Modeluser.php */