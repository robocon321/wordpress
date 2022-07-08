<?php
  require_once(__DIR__.'/../models/TaskModel.php');

  class TaskDetailAdminService {
    private $taskModel;

    public function __construct() {
      $this -> taskModel = new TaskModel();
    }

    public function getTask($id) {
      return  json_decode($this -> taskModel ->getTask($id), TRUE);
    }

    public function getEmployee($id) {
      return  json_decode($this -> taskModel ->getEmployeeByTaskId($id), TRUE);
    }

    public function getCustomer($id) {
      return  json_decode($this -> taskModel ->getCustomerByTaskId($id), TRUE);
    }

    public function getService($id) {
      return  json_decode($this -> taskModel ->getServiceByTaskId($id), TRUE);
    }
 }
