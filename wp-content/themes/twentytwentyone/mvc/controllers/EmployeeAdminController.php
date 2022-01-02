<?php
  class EmployeeAdminController extends Controller {

    public function doGet($params = null) {
      if(isset($params['id'])) {
        $data = [];
        $service = $this -> service("EmployeeDetailAdminService");
        $data['employee'] = $service -> getEmployee($params['id']);
        $data['orders'] = $service -> getOrders($params['id']);
        $this -> view("employee-detail-admin", $data);
      } else {
        $data = [];
        $service = $this -> service("EmployeeAdminService");
        $data['employees'] = $service -> getEmployeeSumary(
          isset($params['search']) ? $params['search'] : '', 
          isset($params['sort']) ?  $params['sort'] : 'name', 
          isset($params['pg']) ? ((int) $params['pg']) - 1  : 0);
          
        $data['total-employee'] = $service -> getTotalEmployee('', array());
        $data['total-page'] = ceil($data['total-employee'] / 10);
        $this -> view("employee-admin", $data);
      }
    }
  }
?>