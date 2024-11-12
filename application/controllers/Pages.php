<?php
use Twilio\Rest\Client;
//ini_set('display_errors' ,0);
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login || $this->session->admin_login){
                redirect(base_url()."main");
            }
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->load->view('pages/'.$page);                        
        }
        public function authenticate(){
            $type=$this->input->post('type');
            if($type=="user"){
                $log="user_login";
            }else{
                $log="admin_login";
            }
            $user=$this->Feeding_model->authenticate();
            if($user){
                $user_data=array(
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    $log => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."main");
            }else{
                $this->session->set_flashdata('error','Invalid username or password!');
                redirect(base_url());
            }
        }
        public function logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('user_login');
            $this->session->unset_userdata('admin_login');
            redirect(base_url());
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }
            $data['users'] = $this->Feeding_model->getAllUsers();
            $data['feeds'] = $this->Feeding_model->getAllFeeds();
            $data['fish'] = $this->Feeding_model->getAllFish();
            $data['items'] = $this->Feeding_model->getAllPO("received");
            $data['alert'] = $this->Feeding_model->getAllFeeds();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function manage_user(){
            $page = "manage_user";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }
            $data['users'] = $this->Feeding_model->getAllUsers();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_user(){
            $save=$this->Feeding_model->save_user();
            if($save){
                $this->session->set_flashdata('success','User details successfully saved!');
            }else{
                $this->session->set_flashdata('error','Unable to save user details!');
            }
            redirect(base_url()."manage_user");
        }
        public function delete_user($id){
            $save=$this->Feeding_model->delete_user($id);
            if($save){
                $this->session->set_flashdata('success','User details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete user details!');
            }
            redirect(base_url()."manage_user");
        }

        public function manage_fish(){
            $page = "manage_fish";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }
            $data['items'] = $this->Feeding_model->getAllFish();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_fish(){
            $save=$this->Feeding_model->save_fish();
            if($save){
                $this->session->set_flashdata('success','Fish details successfully saved!');
            }else{
                $this->session->set_flashdata('error','Unable to save Fish details!');
            }
            redirect(base_url()."manage_fish");
        }
        public function delete_fish($id){
            $save=$this->Feeding_model->delete_fish($id);
            if($save){
                $this->session->set_flashdata('success','Fish details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete fish details!');
            }
            redirect(base_url()."manage_fish");
        }

        public function manage_feeds(){
            $page = "manage_feeds";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }
            $data['items'] = $this->Feeding_model->getAllFeeds();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_feeds(){
            $save=$this->Feeding_model->save_feeds();
            if($save){
                $this->session->set_flashdata('success','Feeds details successfully saved!');
            }else{
                $this->session->set_flashdata('error','Unable to save Feeds details!');
            }
            redirect(base_url()."manage_feeds");
        }
        public function delete_feeds($id){
            $save=$this->Feeding_model->delete_feeds($id);
            if($save){
                $this->session->set_flashdata('success','Feeds details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete feeds details!');
            }
            redirect(base_url()."manage_feeds");
        }

        public function purchase_order(){
            $page = "purchase_order";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }
            $this->session->unset_userdata('pono');
            $data['items'] = $this->Feeding_model->getAllPO('pending');
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function purchase_order_new(){
            $po=date('YmdHis');
            $this->session->set_userdata('pono',$po);
            redirect(base_url()."manage_purchase_order");
        }

        public function purchase_order_manage($po){            
            $this->session->set_userdata('pono',$po);
            redirect(base_url()."manage_purchase_order");
        }
        public function manage_purchase_order(){
            $page = "manage_purchase_order";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }            
            $pono=$this->session->pono;
            $data['items'] = $this->Feeding_model->getAllPOByNo($pono,'pending');
            $data['feeds'] = $this->Feeding_model->getAllFeeds();
            $data['pono'] = $pono;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function add_to_cart(){
            $code=$this->input->post('code');
            $quantity=$this->input->post('quantity');
            $pono=$this->input->post('pono');
            foreach($code as $id){
                $save=$this->Feeding_model->add_to_cart($id,$pono,$quantity);
            }
            if($save){
                $this->session->set_flashdata('success','Item(s) successfully added!');
            }else{
                $this->session->set_flashdata('failed','Unable to add items!');
            }
            redirect(base_url()."manage_purchase_order");
        }
        public function remove_po_item($id){
            $remove=$this->Feeding_model->remove_po_item($id);
            if($remove){
                $this->session->set_flashdata('success','Item successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove item!');
            }
            redirect(base_url()."manage_purchase_order");
        }
        public function purchase_receiving($pono){
            $page = "purchase_receiving";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }                        
            $data['items'] = $this->Feeding_model->getAllPOByNo($pono,'pending');            
            $data['pono'] = $pono;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function post_receiving(){
            $code=$this->input->post('code');
            $invno=$this->input->post('invno');
            $expiration=$this->input->post('expiration');
            $pono=$this->input->post('pono');
            $x=0;
            foreach($code as $id){
                $save=$this->Feeding_model->post_receiving($id,$pono,$invno,$expiration[$x]);
                $x++;
            }
            if($save){
                $this->session->set_flashdata('success','Post receiving successful!');
            }else{
                $this->session->set_flashdata('failed','Unable to post receiving!');
            }
            redirect(base_url()."purchase_order");
        }
        public function manage_feeding(){
            $page = "manage_feeding";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }
            $data['items'] = $this->Feeding_model->getAllFish();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function submit_feeding(){
            $fish=$this->input->post('fish_id');
            $stock=$this->input->post('stock_id');
            $quantity=$this->input->post('quantity');
            $x=0;
            foreach($fish as $item){
                $feeding=$this->Feeding_model->submit_feeding($item,$stock[$x],$quantity[$x]);
                $x++;
            }            
            if($feeding){
                $this->session->set_flashdata('success','Execute feeding successfully!');
            }else{
                $this->session->set_flashdata('failed','Unable to execute feeding!');
            }
            redirect(base_url()."manage_feeding");
        }

        public function manage_report(){
            $page = "manage_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }            
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function print_report(){
            $page = "print_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }            
            $data['startdate'] = $this->input->post('startdate');
            $data['enddate'] = $this->input->post('enddate');
            $data['type'] = $this->input->post('type');
            $this->load->view('pages/'.$page,$data);            
        }

        public function manage_expired(){
            $page = "manage_expired";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }            
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function remove_expired(){
            $refno=$this->input->post('refno');
            $code=$this->input->post('code');
            $expiration=$this->input->post('expiration');
            $quantity=$this->input->post('soh');
            $x=0;
            foreach($refno as $rrno){
                $feeding=$this->Feeding_model->remove_expired($rrno,$code[$x],$expiration[$x],$quantity[$x]);
                $x++;
            }            
            if($feeding){
                $this->session->set_flashdata('success','Expired feeds successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove expired feeds!');
            }
            redirect(base_url()."manage_expired");
        }
        public function send_sms(){
            $message="This is a sample text message!";            
            $sid = "AC6e8357d805dd1ba26306e8ca0599c5ad";
            $token = "2a630606b54f62fc6cc5753339a0f307";
            $twilio_client = new Client($sid,$token);
            $phone= "+15303792212";
            try{
                $twilio_client->messages->create('+639107524284',array(
                    'from' => $phone,
                    'body' => $message
                ));
                echo 'SMS has been sent!';
            }catch(Exception $ex){
                echo 'SMS failed due to '.$ex;
            }
            
        }

        public function manage_notification(){
            $page = "notification";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login || $this->session->admin_login){                
            }else{
                redirect(base_url());
            }
            $data['users'] = $this->Feeding_model->getAllNotification();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function remove_notification($id){
            $feeding=$this->Feeding_model->remove_notification($id);            
            if($feeding){
                $this->session->set_flashdata('success','Notification history successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove notification history!');
            }
            redirect(base_url()."manage_notification");
        }
}
?>
