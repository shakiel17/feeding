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
        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM user ORDER BY fullname ASC");
            return $result->result_array();
        }
        public function save_user(){
            $id=$this->input->post('id');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $fullname=$this->input->post('fullname');
            $check=$this->db->query("SELECT * FROM user WHERE username = '$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO user(username,`password`,fullname) VALUES('$username', '$password', '$fullname')");
                }else{
                    $result=$this->db->query("UPDATE user SET `password` = '$password',username='$username',fullname='$fullname' WHERE id='$id'");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_user($id){
            $result=$this->db->query("DELETE FROM user WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function getAllFish(){
            $result=$this->db->query("SELECT * FROM fish ORDER BY `description` ASC");
            return $result->result_array();
        }
        public function save_fish(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $category=$this->input->post('category');
            $feed_usage=$this->input->post('feed_usage');
            $datearray=date('Y-m-d');            
            $timearray=date('H:i:s');
            $check=$this->db->query("SELECT * FROM fish WHERE `description` = '$description' AND category='$category' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO fish(`description`,category,feed_usage,datearray,timearray) VALUES('$description', '$category', '$feed_usage','$datearray','$timearray')");
                }else{
                    $result=$this->db->query("UPDATE fish SET `description` = '$description',category='$category',feed_usage='$feed_usage' WHERE id='$id'");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_fish($id){
            $result=$this->db->query("DELETE FROM fish WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function getAllFeeds(){
            $result=$this->db->query("SELECT * FROM stocks ORDER BY `description` ASC");
            return $result->result_array();
        }
        public function save_feeds(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $category=$this->input->post('quantity');
            $feed_usage=$this->input->post('stockalert');
            $code=date('YmdHis');
            $datearray=date('Y-m-d');            
            $timearray=date('H:i:s');
            $check=$this->db->query("SELECT * FROM stocks WHERE `description` = '$description' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO stocks(`code`,`description`,stockalert,datearray,timearray) VALUES('$code','$description','$feed_usage','$datearray','$timearray')");
                    $result=$this->db->query("INSERT INTO stocktable(stock_id,quantity,trantype,datearray,timearray) VALUES('$code','$category','in','$datearray','$timearray')");
                }else{
                    $result=$this->db->query("UPDATE stocks SET `description` = '$description',stockalert='$feed_usage' WHERE id='$id'");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_feeds($id){
            $result=$this->db->query("DELETE FROM stocks WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getQty($code){
            $result=$this->db->query("SELECT SUM(quantity) as quantity FROM stocktable WHERE stock_id='$code' GROUP BY stock_id");
            return $result->row_array();
        }
    }
?>
