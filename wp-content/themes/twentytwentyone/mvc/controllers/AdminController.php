<?php
  class AdminController extends Controller {
    
    public function doController($params = null) {
      $route = $params['page'];
      $controller = 'EmployeeAdminController';
      switch($route) {
        case 'services':
          $controller = 'ServiceAdminController';
          break;
        case 'customers':
          $controller = 'CustomerAdminController';
          break;
        default :
        break;
      }
      unset($params['page']);
      
      require_once __DIR__.'/'.$controller.'.php';
      $controller = new $controller();
      $controller -> doGet($params);
    }
  }
?>