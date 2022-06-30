<?php
class M_prodi extends CI_Model{

	function get_all_prodi(){
		$query=$this->db->query("SELECT * FROM prodi ORDER BY id DESC");
		return $query;	
	}

	function saveProdi($kode_prodi,$nama_prodi,$kode_fakultas){
		$query=$this->db->query("INSERT INTO prodi (kode_prodi,nama_prodi,kode_fakultas) VALUES ('$kode_prodi','$nama_prodi', '$kode_fakultas')");
		return $query;
	}

	function update($id,$kode_prodi,$nama_prodi, $kode_fakultas){
		$query=$this->db->query("UPDATE prodi set kode_prodi='$kode_prodi',nama_prodi='$nama_prodi', kode_fakultas='$kode_fakultas' where id='$id'");
		return $query;
	}
	

	function deleteProdi($id){
		$query=$this->db->query("DELETE FROM prodi where id='$id'");
		return $query;
	}

	function getProdi($id){
		$query=$this->db->query("SELECT * FROM prodi where id='$id'");
		return $query;
	}

	function get_prodiByKodeFakultas($kode_fakultas){
		$query=$this->db->query("SELECT * FROM prodi WHERE kode_fakultas='$kode_fakultas'");
		return $query->result();
	}


	  public function viewByKodeFakultas($kode_fakultas){
		$this->db->where('kode_fakultas', $kode_fakultas);
		$result = $this->db->get('prodi')->result(); // Tampilkan semua data prodi berdasarkan kode_fakultas
		
		return $result; 
	  }

}
