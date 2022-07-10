<?php
require_once(__DIR__ . '/../../models/TaskModel.php');



$model = new TaskModel();

// get info from post
$id_emp = $_POST['id_emp'];
$id_service = $_POST['id_service'];
$phone_cus = $_POST['phone_cus'];
$address_cus = $_POST['address_cus'];

$customer_id = $_POST['id_cus'];
$payment_fee = $_POST['payment_fee'];
$warranty_period = $_POST['warranty_period'];
$status = $_POST['status'];

$note = $_POST['note'];
$place_time = $_POST['place_time'];

//update customer
if ($_POST['task_id'] != '') {
  $id = $_POST['task_id'];

  $fields = $model->taskModel($customer_id, $payment_fee, $warranty_period, $note, $place_time, $id_emp);
  $model->updateTask($id, $fields, $id_service, $phone_cus, $customer_id, $status, $address_cus);
} else {
  //add a new customer
  $data = $model->insertTask($id_emp, $id_service, $phone_cus, $customer_id, $payment_fee, $warranty_period, $status, $note, $place_time, $address_cus);
}
echo $data;
