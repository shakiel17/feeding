<?php
use Twilio\Rest\Client;
//$message="This is a sample text message!";            
// $sid = "AC6e8357d805dd1ba26306e8ca0599c5ad";
// $token = "044b1590a11e5ec0b752dd795ab41f2c";
// $twilio_client = new Client($sid,$token);
// $phone= "+15303792212";

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

$appdate=date('Y-m-d');
$time=date('H:i:s');
// $apptime1="06:00:00";
// $apptime2="16:00:00";
$amtime1=$notif['amtime1'];
$amtime2=$notif['amtime2'];
$pmtime1=$notif['pmtime1'];
$pmtime2=$notif['pmtime2'];
$query=$this->Feeding_model->db->query("SELECT * FROM fish GROUP BY category");
$result=$query->result_array();
$message="It`s feeding time! ";
foreach($result as $r){
  $message .= $r['category']." ".$r['feed_usage']."g".", "; 
}
$check=$this->Feeding_model->db->query("SELECT * FROM `notification` WHERE applicable_date='$appdate'");
if($check->num_rows()>0){
  $res=$check->result_array();
  $has=count($res);
}else{
  $has=0;
}

$query1=$this->Feeding_model->db->query("SELECT * FROM user LIMIT 1");
if($query1->num_rows() > 0){
  $res1=$query1->row_array();
  $contactno=$res1['contactno'];
}else{
  $contactno="";
}
$query2=$this->Feeding_model->db->query("SELECT * FROM `admin` LIMIT 1");
if($query2->num_rows()>0){
  $res2=$query2->row_array();
  $email2=$res2['email'];
}else{
  $email2="";
}

$emails=$contactno.",".$email2;

$subject="Feeding Time";
$this->load->library('email',$config);
$this->email->set_newline("\r\n");
$this->email->from('Online Fish Feeding');
$this->email->to($emails);
//$this->email->subject($subject);
$this->email->message($message);

if($has==2){

}else if($has==1){
  if(date('H:i:s') >=  $pmtime1 && date('H:i:s') <= $pmtime2){
    if($this->email->send()){
      // try{
      //       $twilio_client->messages->create("$contactno",array(
      //           'from' => $phone,
      //           'body' => $message
      //       ));
      $this->Feeding_model->db->query("INSERT INTO `notification`(`message`,datearray,timearray,applicable_date,applicable_time) VALUES('$message','$appdate','$time','$appdate','$pmtime1')");
    // }catch(Exception $ex){
    //       echo 'SMS failed due to '.$ex;
    
    }
  }
  if(date('H:i:s') >=  $amtime1 && date('H:i:s') <= $amtime2){
    if($this->email->send()){
      // try{
      //   $twilio_client->messages->create("$contactno",array(
      //       'from' => $phone,
      //       'body' => $message
      //   ));
      $this->Feeding_model->db->query("INSERT INTO `notification`(`message`,datearray,timearray,applicable_date,applicable_time) VALUES('$message','$appdate','$time','$appdate','$amtime1')");
    // }catch(Exception $ex){
    //   echo 'SMS failed due to '.$ex;    
  }    
  }
}else{
  if(date('H:i:s') >=  $pmtime1 && date('H:i:s') <= $pmtime2){
    if($this->email->send()){
      // try{
      //       $twilio_client->messages->create("$contactno",array(
      //           'from' => $phone,
      //           'body' => $message
      //       ));
      $this->Feeding_model->db->query("INSERT INTO `notification`(`message`,datearray,timearray,applicable_date,applicable_time) VALUES('$message','$appdate','$time','$appdate','$pmtime1')");
    // }catch(Exception $ex){
    //       echo 'SMS failed due to '.$ex;    
    }
  }
  if(date('H:i:s') >=  $amtime1 && date('H:i:s') <= $amtime2){
    if($this->email->send()){
      // try{
      //   $twilio_client->messages->create("$contactno",array(
      //       'from' => $phone,
      //       'body' => $message
      //   ));
      $this->Feeding_model->db->query("INSERT INTO `notification`(`message`,datearray,timearray,applicable_date,applicable_time) VALUES('$message','$appdate','$time','$appdate','$amtime1')");
    // }catch(Exception $ex){
    //   echo 'SMS failed due to '.$ex;    
  }    
  }
    
  //   try{
  //     $twilio_client->messages->create($contactno,array(
  //         'from' => $phone,
  //         'body' => $message
  //     ));
  //     //echo 'SMS has been sent!';
  // }catch(Exception $ex){
  //     //echo 'SMS failed due to '.$ex;
  // }    
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta http-equiv="refresh" content="120">
  <title>Online Inventory AND Fish Feeding Guide</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url();?>design/assets/css/app.min.css">
  <link rel="stylesheet" href="<?=base_url();?>design/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url();?>design/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url();?>design/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?=base_url();?>design/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?=base_url();?>design/assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <?=form_open(base_url()."authenticate",array('class' => 'needs-validation', 'novalidate' => ''));?>                
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Login as</label>                      
                    </div>
                    <select name="type" class="form-control" required>
                        <option value="user">Caretaker</option>
                        <option value="admin">Administrator</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select login as
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <?php
                    if($this->session->error){
                  ?>
                  <div class="alert alert-danger"><?=$this->session->error;?></div>
                  <?php
                    }
                  ?>
                <?=form_close();?>               
              </div>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?=base_url();?>design/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?=base_url();?>design/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=base_url();?>design/assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>