<?php 
  require_once(__DIR__.'/../../models/EmployeeModel.php');
  
  $response = [];
  
  if(!isset($_POST['id']) || !isset($_POST['name']) || 
  !isset($_POST['email']) || !isset($_POST['phone']) || 
  !isset($_POST['province']) || !isset($_POST['district']) || 
  !isset($_POST['academic-level']) || !isset($_POST['fields']) || 
  !isset($_POST['work-time']) || !isset($_POST['status']) || !isset($_POST['birthday'])){
    $response['success'] = false;
    $response['message'] = 'Thất bại';
  }
  else {
  // get info from post

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $academyLevel = $_POST['academic-level'];
    $fields = $_POST['fields'];
    $workTime = $_POST['work-time'];
    $status = $_POST['status'];
    $birthday = $_POST['birthday'];

    $model = new EmployeeModel();
    if($model -> updateEmployee($id, array(
                            "name" => $name, 
                            "email" => $email, 
                            "phone" => $phone, 
                            "province" => $province, 
                            "district" => $district,
                            "academic_level" => $academyLevel,
                            "fields" => $fields,
                            "work_time" => $workTime,
                            "status" => $status,
                            "birthday" => $birthday
    ))) {
      $response['success'] = true;
      $response['message'] = "Thành công";
    } else {
      $response['success'] = false;
      $response['message'] = "Query thất bại";
    }
  }

  echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>