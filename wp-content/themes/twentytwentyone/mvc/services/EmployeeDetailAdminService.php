<?php
  require_once(__DIR__.'/../models/EmployeeModel.php');
  require_once(__DIR__.'/../models/OrderModel.php');

  class EmployeeDetailAdminService {
    private $employeeModel;
    private $orderModel;

    public function __construct() {
      $this -> employeeModel = new EmployeeModel();
      $this -> orderModel = new OrderModel();
    }

    public function getEmployee($id) {
      return $this -> employeeModel -> getEmployee($id);
    }

    public function getOrders($employeeId) {
      return $this -> orderModel -> getOrders($offset = 0, $limit = 100, $sortby = 'id', $isASC = true, $conditions = array("employee_id" => $employeeId));
    }
 }
?>