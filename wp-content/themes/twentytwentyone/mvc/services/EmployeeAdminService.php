<?php
  require_once(__DIR__.'/../models/EmployeeModel.php');

  class EmployeeAdminService {
    private $employeeModel;

    public function __construct() {
      $this -> employeeModel = new EmployeeModel();
    }

    public function getEmployeeSumary($search, $sort, $page = 0) {
      return $this -> employeeModel -> getEmployeeSumary($search, $page * 10, 10, $sort, true);
    }

    public function getTotalEmployee($search, $conditions) {
      return $this -> employeeModel -> getTotalEmployee($search, $conditions);
    }
 }
?>