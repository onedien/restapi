<?php
header("Content-type:application/json");
require '../connect.php';
$sql = "INSERT INTO Customer (name,email,password,gender,ismarried,address) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['gender'] . "','" . $_POST['ismarried'] . "','" . $_POST['address'] . "')";
$result = mysqli_query($koneksi, $sql);
$sql = "SELECT * FROM Customer Order by id desc LIMIT 1";
$result = mysqli_query($koneksi, $sql);
$data = $result->fetch_assoc();

$response = array();

  if($result)
 
  {
    
      $response['code'] =200;
      $response['response'] = "success";
      $response['message'] = "Success! Data Inserted";
    
  
    
  
  }else{
  
    $response['code'] =0;
    $response['response'] = "Failed";
    $response['message'] = "Failed! Data Not Inserted";
    
  
  
  }


echo json_encode($response, JSON_PRETTY_PRINT);

?>