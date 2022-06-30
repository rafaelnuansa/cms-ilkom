<?php
class M_login extends CI_Model{

    function authentication($username,$password){
        $hasil=$this->db->query("SELECT * FROM users WHERE username='$username' AND password=md5('$password')");
        return $hasil;
    }

}
