<?php
class Prodi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_prodi');
		$this->load->model('m_fakultas');
	}

	function index(){
		$data['title'] = "Prodi";
		$data['data']=$this->m_prodi->get_all_prodi();
		$data['fakultas']=$this->m_fakultas->get_all_fakultas();
		$this->template->display('v_prodi', $data);
	}
  
	function detail($id){
		$data['title'] = "Detail Prodi";
		$id = $this->uri->segment(3);
		$data['prodi'] = $this->m_prodi->getProdi($id)->row_array();
		$prodi = $data['prodi'];
		$data['fakultas'] =  $this->db->get_where('fakultas', array('kode_fakultas' =>  $prodi['kode_fakultas']))->row_array();
		$this->template->display('v_prodi_detail', $data);
	}

	function create(){
		$kode_prodi=$this->input->post('kode_prodi');
		$nama_prodi=$this->input->post('nama_prodi');	
		$kode_fakultas=$this->input->post('kode_fakultas');
		$this->m_prodi->saveProdi($kode_prodi,$nama_prodi,$kode_fakultas);
		$this->session->set_flashdata('msgsuccess', 'Data Berhasil disimpan');
		redirect('prodi');
	}

	function update(){
		$id=$this->input->post('id');
		$kode_prodi = $this->input->post('kode_prodi');
		$nama_prodi=$this->input->post('nama_prodi');
		$kode_fakultas=$this->input->post('kode_fakultas');
		$this->m_prodi->update($id,$kode_prodi,$nama_prodi, $kode_fakultas);
		echo $this->session->set_flashdata('msgsuccess','Data Berhasil diupdate!');
		redirect('prodi');
	
	}

	function delete(){
		$id=$this->input->post('id');
		$data = $this->m_prodi->deleteProdi($id);
		echo json_encode($data);
	}



	 
}
