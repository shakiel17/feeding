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
            $contactno=$this->input->post('contactno');
            $check=$this->db->query("SELECT * FROM user WHERE username = '$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO user(username,`password`,fullname,contactno) VALUES('$username', '$password', '$fullname','$contactno')");
                }else{
                    $result=$this->db->query("UPDATE user SET `password` = '$password',username='$username',fullname='$fullname',contactno='$contactno' WHERE id='$id'");
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
            $result=$this->db->query("SELECT SUM(quantity) as quantity FROM stocktable WHERE stock_id='$code' AND refno <> '' GROUP BY stock_id");
            return $result->row_array();
        }
        public function getAllPO($status){
            $result=$this->db->query("SELECT *,COUNT(stock_id) as no_of_items FROM purchaseorder WHERE `status`='$status' GROUP BY pono ORDER BY datearray DESC");            
            return $result->result_array();
        }
        public function getAllPOByNo($pono,$status){
            $result=$this->db->query("SELECT po.*,s.description FROM purchaseorder po INNER JOIN stocks s ON s.code=po.stock_id WHERE po.`status`='$status' AND po.pono='$pono' ORDER BY s.description ASC");
            return $result->result_array();
        }
        public function add_to_cart($code,$pono,$quantity){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $check=$this->db->query("SELECT * FROM purchaseorder WHERE stock_id='$code' AND pono='$pono' AND `status`='pending'");
            if($check->num_rows() >0 ){
                $r=$check->row_array();
                $qty=$r['quantity'];
                $tqty=$qty+$quantity;
                $result=$this->db->query("UPDATE purchaseorder SET quantity='$tqty' WHERE stock_id='$code' AND pono='$pono' AND `status`='pending'");
            }else{
                $result=$this->db->query("INSERT INTO purchaseorder(pono,invno,stock_id,quantity,expiration,`status`,datearray,timearray) VALUES('$pono','','$code','$quantity','','pending','$date','$time')");
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function remove_po_item($id){
            $result=$this->db->query("DELETE FROM purchaseorder WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function post_receiving($code,$pono,$invno,$expiration){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $query=$this->db->query("SELECT * FROM purchaseorder WHERE pono='$pono' AND stock_id='$code' AND `status`='pending'");
            $res=$query->row_array();
            $qty=$res['quantity'];            
            $result=$this->db->query("INSERT INTO stocktable(refno,invno,stock_id,quantity,expiration,trantype,datearray,timearray) VALUES('$pono','$invno','$code','$qty','$expiration','in','$date','$time')");            
            $result=$this->db->query("UPDATE purchaseorder SET `status`='received',invno='$invno',expiration='$expiration',rrdate='$date',rrtime='$time' WHERE stock_id='$code' AND pono='$pono' AND `status`='pending'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllDispensingByFishDate($fish,$date){
            $result=$this->db->query("SELECT * FROM dispensing WHERE fish_id='$fish' AND datearray='$date'");
            return $result->result_array();
        }

        public function submit_feeding(){
            $fish=$this->input->post('fish_id');
            $stock=$this->input->post('stock_id');
            $quantity=$this->input->post('quantity');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $remqty=$quantity;            
            $query=$this->db->query("SELECT *,SUM(quantity) as soh FROM stocktable WHERE stock_id='$stock' AND refno <> '' GROUP BY refno HAVING soh > 0 ORDER BY refno ASC");
            $res=$query->result_array();
            $count=0;
            foreach($res as $item){
                if($remqty > 0){                    
                    if($item['soh'] >= $remqty){
                        $result=$this->db->query("INSERT INTO stocktable(refno,invno,stock_id,quantity,expiration,trantype,datearray,timearray) VALUES('$item[refno]','','$stock','-$remqty','$item[expiration]','out','$date','$time')");
                        $result=$this->db->query("INSERT INTO dispensing(fish_id,stock_id,pono,quantity,datearray,timearray) VALUES('$fish','$stock','$item[refno]','$remqty','$date','$time')");                       
                    }else{                    
                        $this->db->query("INSERT INTO stocktable(refno,invno,stock_id,quantity,expiration,trantype,datearray,timearray) VALUES('$item[refno]','','$stock','-$item[soh]','$item[expiration]','out','$date','$time')");
                        $result=$this->db->query("INSERT INTO dispensing(fish_id,stock_id,pono,quantity,datearray,timearray) VALUES('$fish','$stock','$item[refno]','$item[soh]','$date','$time')");
                        $remqty = $remqty-$item['soh'];
                    }
                    $count++;                    
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }

        }
    }
?>
