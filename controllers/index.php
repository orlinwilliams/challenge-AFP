<?php
include_once('email.php');

//-----------------Validations-----------------
if (!isset($_POST['data'])) {
  echo json_encode(['error' => true, 'message' => 'data not exist']);
}
if (!isset($_POST['emailClient'])) {
  echo json_encode(['error' => true, 'message' => 'emailClient not exist']);
}
$data = $_POST['data'];
$emailClient = $_POST['emailClient'];
$errors = array();
if (!isset($data['name']) || $data['name'] == '') {
  array_push($errors, 'name');
}
if (!isset($data['idNumber']) || $data['idNumber'] == '') {
  array_push($errors, 'idNumer');
}
if (!isset($data['dateOfBirth']) || $data['dateOfBirth'] == '') {
  array_push($errors, 'dateOfBirth');
}
if (!isset($data['address']) || $data['address'] == '') {
  array_push($errors, 'address');
}
if (!isset($data['phone']) || $data['phone'] == '') {
  array_push($errors, 'phone');
}
if (!($data['email']) || $data['email'] == '') {
  array_push($errors, 'email');
}
if (!isset($emailClient['mainEmail']) || $emailClient['mainEmail'] == '') {
  array_push($errors, 'mainEmail');
}
if (!isset($emailClient['emailCc'])) {
  array_push($errors, 'emailCc');
}
if (count($errors) > 0) {
  echo json_encode(['error' => true, 'message' => "fields are empty or do not exist", 'fields' => $errors]);
}
//-----------Send email------------------
else {
  $email = new Email($data, $emailClient);
  if ($email->sendEmail()) {
    echo json_encode(['error' => false, 'message' => 'email send successfuly']);
  } else {
    echo json_encode(['error' => true, 'message' => 'email not send, check mail class configuration']);
  }
}
