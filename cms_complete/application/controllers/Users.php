<?php
class Users extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_users');
	}

	function index(){
		$data['title'] = "Users";
		$id=$this->session->userdata('id');
		$data['user']=$this->m_users->get_user_login($id);
		$data['data']=$this->m_users->get_all_users();
		$this->template->display('v_users', $data);
	}

	function create(){
		$username=$this->input->post('username');
		$nama_lengkap=$this->input->post('nama_lengkap');
		$password=$this->input->post('xpassword');
		$confirm_password=$this->input->post('xpassword2');
		if ($password <> $confirm_password) {
			  $this->session->set_flashdata('msgerror', 'Konfirmasi Password Tidak Sesuai');
			  redirect('users');
		}else{
			  $this->m_users->saveUser($username,$nama_lengkap,$password);
			  $this->session->set_flashdata('msgsuccess', 'Data Berhasil disimpan');
			  redirect('users');
			  
		  }
	}

	function update(){
		$id=$this->input->post('id');
		$nama_lengkap=$this->input->post('nama_lengkap');
		$username=$this->input->post('username');
		$password=$this->input->post('xpassword');
		$confirm_password=$this->input->post('xpassword2');
		if (empty($password) && empty($confirm_password)) {
			$this->m_users->updateNoPass($id,$username,$nama_lengkap);
			echo $this->session->set_flashdata('msgsuccess','Data Berhasil diupdate!');
			   redirect('users');
		 }elseif ($password <> $confirm_password) {
			 echo $this->session->set_flashdata('msgerror','Gagal Mengupdate Data!');
			   redirect('users');
		 }else{
			   $this->m_users->update($id,$username,$nama_lengkap,$password);
			echo $this->session->set_flashdata('msgsuccess','Data Berhasil diupdate!');
			   redirect('users');
		   }
	}

	
	function reset_password(){
        $id=$this->uri->segment(3);
        $get=$this->m_users->getUsername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['username'];
        }
        $pass=rand(123456,999999);
        $this->m_users->resetPass($id,$pass);
        echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('uname',$b);
        echo $this->session->set_flashdata('upass',$pass);
	    redirect('users');
   
    }

	function delete(){
		$id=$this->input->post('id');
		$data = $this->m_users->deleteUser($id);
		echo json_encode($data);
	}



	 
}
