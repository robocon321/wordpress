<?php 
  require_once(__DIR__.'/../models/FeedbackModel.php');
  
  if(!isset($_POST['name']) || strlen($_POST['name']) == 0 || !isset($_POST['content']) || strlen($_POST['content']) == 0) echo(0);
  else {
  // get info from post

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $content = $_POST['content'];

    $model = new FeedbackModel();
    $result = $model -> insertFeedback($name, $email, $phone, $content);
    $response = [];
    if($result) {
      $response['is_success'] = true;
      $response['message'] = 'Thành công';
    } else {
      $response['is_success'] = false;
      $response['message'] = 'Thất bại';
    }
    echo(json_encode($response));
}

?>