<?php 
  require_once(__DIR__.'/../../models/FeedbackModel.php');
  
  $response = [];
  
  if(!isset($_POST['id'])){
    $response['success'] = false;
    $response['message'] = 'Thất bại';
  }
  else {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $model = new FeedbackModel();
    if($model -> updateFeedback($id, array('status' => abs(1 - $status)))) {
      $response['success'] = true;
      $response['message'] = "Thành công";
    } else {
      $response['success'] = false;
      $response['message'] = "Thất bại";
    }
  }

  echo(json_encode($response));
?>