<?php 
require_once(__DIR__.'/../../models/ServiceModel.php');
require_once(__DIR__.'/../../core/utils.php');

$response = [];

if(!isset($_POST['title']) || !isset($_POST['thumbnail']) || 
!isset($_POST['content']) || !isset($_POST['price']) || !isset($_POST['id'])){
  $response['success'] = false;
  $response['message'] = 'Thất bại';
}
else {
// get info from post

  $title = $_POST['title'];
  $thumbnail = $_POST['thumbnail'];
  $content = $_POST['content'];
  $price = $_POST['price'];
  $id = decrypt($_POST['id']);  

  $model = new ServiceModel();
  if($model -> updateService(array(), array("title" => $title, "thumbnail" => $thumbnail, "content" => $content, "price" => $price))) {
    $response['success'] = true;
    $response['message'] = "Thành công";
  } else {
    $response['success'] = false;
    $response['message'] = "Query thất bại";
  }
}
echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>