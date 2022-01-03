<?php
  class ServiceAdminController extends Controller {

    public function doGet($params = null) {
      if(isset($params['id'])) {
        // $data = [];
        // $service = $this -> service("EmployeeDetailAdminService");
        // $data['employee'] = $service -> getEmployee($params['id']);
        // $data['orders'] = $service -> getOrders($params['id']);
        // $this -> view("employee-detail-admin", $data);
      } else {
        $data = [];
        $service = $this -> service("ServiceAdminService");
        $data['services'] = $service -> getServiceSumary(
          isset($params['search']) ? $params['search'] : '', 
          isset($params['sort']) ?  $params['sort'] : 'name', 
          isset($params['pg']) ? ((int) $params['pg']) - 1  : 0);
          
        $data['total-service'] = $service -> getTotalService('', array());
        $data['total-page'] = ceil($data['total-service'] / 10);
        $this -> view("service-admin", $data);
      }
    }
  }
?>