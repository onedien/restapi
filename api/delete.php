<?php
header("Content-type:application/json");
require '../connect.php';
$sql = "DELETE FROM Customer WHERE id = '" . $_POST['id'] . "'";
$result = mysqli_query($koneksi, $sql);
$rows = mysqli_num_rows($result);
$response = array();

if($rows > 0)
{
  if($result)
  {
    $response['code'] = 200;
    $response['message'] = "Deleted Success";
  }else{
    $response['code'] = 0;
    $response['message'] = "Failed to Delete";
  }
}else{
  $response['code'] = 0;
  $response['message'] = "Failed to Delete , data Not Found";
}
echo json_encode($response, JSON_PRETTY_PRINT);
?>