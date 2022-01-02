<?php
  class EmployeeAdminController extends Controller {

    public function doGet($params = null) {
      if(isset($params['id'])) {
        echo("Hello world");
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