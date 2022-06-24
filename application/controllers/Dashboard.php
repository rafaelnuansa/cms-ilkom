<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
	}
	function index(){
		if($this->session->userdata('akses')=='1'){
			$data['title'] = "Dashboard";
			$this->template->display('v_dashboard', $data);
		}else{
			redirect('login');
		}
	
	}
	
}
