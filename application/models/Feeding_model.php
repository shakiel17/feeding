<?php
    date_default_timezone_set('Asia/Manila');
    class Feeding_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $type=$this->input->post('type');
            if($type=="user"){
                $result=$this->db->query("SELECT * FROM user WHERE username = '$username' AND `password` = '$password'");
            }else{
                $result=$this->db->query("SELECT * FROM `admin` WHERE username = '$username' AND `password` = '$password'");
            }
            if($result){
                return $result->row_array();
            }else{
                return false;
            }
        }
    }
?>
