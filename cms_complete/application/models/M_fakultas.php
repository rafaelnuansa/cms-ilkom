<?php
class M_fakultas extends CI_Model{

	function get_all_fakultas(){
		$query=$this->db->query("SELECT * FROM fakultas ORDER BY id DESC");
		return $query;	
	}

	function saveFakultas($kode_fakultas,$nama_fakultas){
		$query=$this->db->query("INSERT INTO fakultas (kode_fakultas,nama_fakultas) VALUES ('$kode_fakultas','$nama_fakultas')");
		return $query;
	}

	function update($id,$kode_fakultas,$nama_fakultas){
		$query=$this->db->query("UPDATE fakultas set kode_fakultas='$kode_fakultas',nama_fakultas='$nama_fakultas' where id='$id'");
		return $query;
	}
	

	function deleteFakultas($id){
		$query=$this->db->query("DELETE FROM fakultas where id='$id'");
		return $query;
	}

	function getFakultas($id){
		$query=$this->db->query("SELECT * FROM fakultas where id='$id'");
		return $query;
	}

	function get_fakultas(){
        $hasil=$this->db->query("SELECT * FROM fakultas ORDER BY nama_fakultas ASC");
        return $hasil;
    }
 
    function get_prodi($id){
        $hasil=$this->db->query("SELECT * FROM prodi WHERE id='$id'");
        return $hasil->result();
    }

	public function view(){
		return $this->db->get('fakultas')->result(); // Tampilkan semua data yang ada di tabel prodi
	  }

}
