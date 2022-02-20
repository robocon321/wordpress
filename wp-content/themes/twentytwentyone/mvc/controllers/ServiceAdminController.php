<?php
  class ServiceAdminController extends Controller {

    public function doGet($params = null) {
      if(isset($params['action'])) {        
        $this -> view('service-new-admin');
      } else {
        if(isset($params['id'])) {
          $data = [];
          $service = $this -> service("ServiceDetailAdminService");
          $data['service'] = $service -> getService($params['id']);
          $data['total-order'] = $service -> getTotalOrder($params['id']);
          $data['tags'] = $service -> getTags($params['id']);
          $data['author'] = $service -> getAuthor($params['id']);
          
          $this -> view("service-detail-admin", $data);
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
  }
?>