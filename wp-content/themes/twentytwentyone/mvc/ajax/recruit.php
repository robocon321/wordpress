<?php 
  require_once(__DIR__.'/../models/EmployeeModel.php');
  $model = new EmployeeModel();

  $response = [];

  if(!isset($_POST['name']) || strlen(trim($_POST['name'])) === 0 || 
    !isset($_POST['birthday']) || 
    !isset($_POST['email']) || strlen(trim($_POST['email'])) === 0 || 
    !isset($_POST['phone']) || strlen(trim($_POST['phone'])) === 0 ||
    !isset($_POST['province']) || 
    !isset($_POST['district']) || 
    !isset($_POST['academic-level']) || strlen(trim($_POST['academic-level'])) === 0 || 
    !isset($_POST['fields']) || strlen(trim($_POST['fields'])) === 0 || 
    !isset($_POST['work-time']) || strlen(trim($_POST['work-time'])) === 0) {
    $response['success'] = false;
    $response['message'] = 'Bạn nhập thiếu dữ liệu';
  } else {
    $result = $model -> insertEmployee($_POST['name'], 
                            $_POST['birthday'], 
                            $_POST['email'],
                            $_POST['phone'],
                            $_POST['province'],
                            $_POST['district'],
                            $_POST['academic-level'],
                            $_POST['fields'],
                            $_POST['work-time']);
    if($result) {
      $response['success'] = true;
      $response['message'] = 'Thành công';
    } else {
      $response['success'] = false;
      $response['message'] = 'Thất bại';
    }
  }

  echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>