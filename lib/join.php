<?php
error_reporting(0);
ini_set('display_errors', 0);


include_once 'validation/validation.php';

include_once 'sendEmail.php';

$upload_dir = "../assets/img";

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = $_POST;

//print_r($_FILES);

//print_r($data);
//die();
// validate the data and send it to administrator into a email

 $val = new Validation();

 $response = ['status' => 1, 'message' => "Successfully join the team"];
 //$val->name('email')->value($data->email)->pattern('email')->required();
 //$val->name('name')->value($data->name)->pattern('words')->required();
 //$val->name('message')->value($data->message)->pattern('text')->required();
 /*
 if ($val->isSuccess()) {
     $response = send_email($data->name, $data->email, $data->message);
 } else {
     $response = array('status' => 0, 'message' => $val->getErrors());
 }*/
 header("Content-typ: application/json");
 echo json_encode($response);
 exit;