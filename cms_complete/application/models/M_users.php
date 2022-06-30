<?php
class M_users extends CI_Model{

	function get_all_users(){
		$query=$this->db->query("SELECT * FROM users ORDER BY id DESC");
		return $query;	
	}

	function saveUser($username,$nama_lengkap,$password){
		$query=$this->db->query("INSERT INTO users (username,nama_lengkap,password) VALUES ('$username','$nama_lengkap',md5('$password'))");
		return $query;
	}

	function update($id,$username,$nama_lengkap,$password){
		$query=$this->db->query("UPDATE users set username='$username',nama_lengkap='$nama_lengkap',password=md5('$password') where id='$id'");
		return $query;
	}
	
	function updateNoPass($id,$username,$nama_lengkap){
		$query=$this->db->query("UPDATE users set username='$username',nama_lengkap='$nama_lengkap' where id='$id'");
		return $query;
	}

	function deleteUser($id){
		$query=$this->db->query("DELETE FROM users where id='$id'");
		return $query;
	}

	function getUsername($id){
		$query=$this->db->query("SELECT * FROM users where id='$id'");
		return $query;
	}

	function resetPass($id,$password){
		$query=$this->db->query("UPDATE users set password=md5('$password') where id='$id'");
		return $query;
	}

	function get_user_login($id){
		$query=$this->db->query("SELECT * FROM users where id='$id'");
		return $query;
	}


}
