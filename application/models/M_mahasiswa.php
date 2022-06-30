<?php
class M_mahasiswa extends CI_Model{

	function get_all_mhs(){
		$query=$this->db->query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
		return $query;	
	}


	function saveMahasiswa($nama_mahasiswa,$nim_mahasiswa,$kode_prodi, $tanggal_lahir, $no_hp, $alamat, $foto){
		$query=$this->db->query("INSERT INTO mahasiswa (nama_mahasiswa,nim_mahasiswa,kode_prodi,tanggal_lahir, no_hp, alamat, foto) VALUES ('$nama_mahasiswa','$nim_mahasiswa', '$kode_prodi','$tanggal_lahir','$no_hp','$alamat', '$foto')");
		return $query;
	}

	function edit_mahasiswa($where,$table){		
		return $this->db->get_where($table,$where);
	}
	 
	function getMahasiswa($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update($data, $where){
		$this->db->update('mahasiswa', $data, $where);
	}
	function deleteMhs($id){
		$query=$this->db->query("DELETE FROM mahasiswa where id_mahasiswa='$id'");
		return $query;
	}
}
