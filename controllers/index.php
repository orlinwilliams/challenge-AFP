<?php 
  include_once('email.php');
  if(!isset($_POST['data'])){
    echo json_encode(['error' => true, 'message'=> 'data not exist']);
  }
  if(!isset($_POST['emailClient'])){
    echo json_encode(['error' => true, 'message'=> 'emailClient not exist']);
  }
  $data = $_POST['data'] ;
  $emailClient = $_POST['emailClient'];  
  if($data['name'] == ''){
    echo json_encode(['error' => true, 'message'=> 'name not exist']);
  }
  if($data['idNumber'] == ''){
    echo json_encode(['error' => true, 'message'=> 'idNumber not exist']);
  }
  if($data['dateOfBirth'] == ''){
    echo json_encode(['error' => true, 'message'=> 'dateOfBirth not exist']);
  }
  if($data['address'] == ''){
    echo json_encode(['error' => true, 'message'=> 'address not exist']);
  }
  if($data['phone'] == ''){
    echo json_encode(['error' => true, 'message'=> 'phone not exist']);
  }
  if($data['email'] == ''){
    echo json_encode(['error' => true, 'message'=> 'email not exist']);
  }
  if($emailClient['mainEmail'] == ''){
    echo json_encode(['error' => true, 'message'=> 'email to send not exist']);
  }
  $email = new Email($data, $emailClient);
  if($email->sendEmail()){
    echo json_encode(['error' => false, 'message'=> 'email send successfuly']);
  }
  else{
    echo json_encode(['error' => true, 'message'=> 'email not send']);
  }

  