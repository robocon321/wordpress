<?php 
  require_once(__DIR__.'/../models/OrderModel.php');
  
  if(!isset($_POST['phone']) || !isset($_POST['service_id'])) {
    $response['success'] = false;
    $response['message'] = 'Bạn nhập thiếu dữ liệu';
  }
  else {
  // get info order service

    $phone = $_POST['phone'];
    $service_id = $_POST['service_id'];
    $is_success = false;
    $employee_id = null;
    if(isset($_POST['is_success'])) $is_success = $_POST['is_success'];
    if(isset($_POST['employee_id'])) $employee_id = $_POST['employee_id'];

    $model = new OrderModel();
    $result = $model -> insertOrder($phone, $service_id, $is_success, $employee_id);
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