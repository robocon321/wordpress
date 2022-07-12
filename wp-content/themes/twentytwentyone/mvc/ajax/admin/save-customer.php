<?php
require_once(__DIR__ . '/../../models/CustomerModel.php');



$model = new CustomerModel();

// get info from post
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$province = $_POST['province'];
$district = $_POST['district'];
$street = $_POST['street'];
$birthday = $_POST['birthday'];

$service_id = null;
$employee_id = null;
$status = 0;

if(isset($_POST['service_id'])) $service_id = $_POST['service_id'];
if(isset($_POST['status'])) $status = $_POST['status'];

//update customer
if ($_POST['customer_id'] != '') {
  $id = $_POST['customer_id'];

  $fields = $model->customerModel($name, $email, $phone, $province, $district, $birthday, $street);
  $model->updateCustomer($id, $fields);
} else {
  //add a new customer
  $model->insertCustomer($name, $birthday, $email, $phone, $province, $district, $street, $cre_time = '', $mod_time = '', $service_id, $status);
}
