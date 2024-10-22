<?php
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
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page);
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
            $data['items'] = $this->Feeding_model->getAllPO();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        
}
?>
