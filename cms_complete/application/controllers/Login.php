<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('v_login');
    }
	
    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $auth=$this->m_login->authentication($username,$password);
        echo json_encode($auth);
        if($auth->num_rows() > 0){
         $this->session->set_userdata('logged_in',true);
         $this->session->set_userdata('username',$username);
         $users=$auth->row_array();
            $id=$users['id'];
            $username=$users['username'];
            $this->session->set_userdata('id',$id);
            $this->session->set_userdata('username',$username);
            redirect('dashboard');
       }else{
         echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('login');
       }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}
