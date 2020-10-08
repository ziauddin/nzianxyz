<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'validation/Validation/Validation.php';
include_once 'sendEmail.php';

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

//print_r($data);
//die();
// validate the data and send it to administrator into a email

 $val = new Validation();

 $val->name('email')->value($data->email)->pattern('email')->required();
 $val->name('name')->value($data->name)->pattern('words')->required();
 $val->name('message')->value($data->message)->pattern('text')->required();
 
 if($val->isSuccess()){
     $response = send_email($data->name, $data->email, $data->message);
 }else{
    $response = array('status' => 0, 'message' => $val->getErrors());
 }
 header("Content-typ: application/json");
 echo json_encode($response);
 exit;

?>