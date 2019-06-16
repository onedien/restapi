<?php
header("Content-type:application/json");
require '../connect.php';
$sql = "UPDATE Customer SET name = '" . $_POST['name'] . "',email = '" . $_POST['email'] . "',password = '" . $_POST['password'] . "',gender = '" . $_POST['gender'] . "',ismarried = '" . $_POST['ismarried'] . "',address = '" . $_POST['address'] . "' WHERE id = '" . $_POST['id'] . "'";
$result = mysqli_query($koneksi, $sql);
$sql = "SELECT * FROM Customer WHERE id = '" . $_POST['id'] . "'";
$result = mysqli_query($koneksi, $sql);
$rows = mysqli_num_rows($result);
$data = $result->fetch_assoc();
$response = array();

if($rows > 0)
{
  if($result)
  {
    $response['code'] = 200;
    $response['message'] = "Updated Success";
  }else{
    $response['code'] = 0;
    $response['message'] = "Updated Failed";
  }
}else{
  $response['code'] = 0;
  $response['message'] = "Updated Failed, Not data selected";
}
echo json_encode($response, JSON_PRETTY_PRINT);
?>