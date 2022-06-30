<?php
class Fakultas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_fakultas');
	}

	function index(){
		$data['title'] = "Fakultas";
		$data['data']=$this->m_fakultas->get_all_fakultas();
		$this->template->display('v_fakultas', $data);
	}
 
	function create(){
		$kode_fakultas=$this->input->post('kode_fakultas');
		$nama_fakultas=$this->input->post('nama_fakultas');	
		$this->m_fakultas->saveFakultas($kode_fakultas,$nama_fakultas);
		$this->session->set_flashdata('msgsuccess', 'Data Berhasil disimpan');
		redirect('fakultas');
	}

	function detail($id){
		$data['title'] = 'Detail Fakultas';
		$id = $this->uri->segment(3);
		$data['fakultas'] = $this->m_fakultas->getFakultas($id)->row_array();
		$this->template->display('v_fakultas_detail', $data);

	}
	function update(){
		$id=$this->input->post('id');
		$kode_fakultas=$this->input->post('kode_fakultas');
		$nama_fakultas=$this->input->post('nama_fakultas');
		$this->m_fakultas->update($id,$kode_fakultas,$nama_fakultas);
		echo $this->session->set_flashdata('msgsuccess','Data Berhasil diupdate!');
		redirect('fakultas');
	
	}

	function delete(){
		$id=$this->input->post('id');
		$data = $this->m_fakultas->deleteFakultas($id);
		echo json_encode($data);
	}



	 
}
