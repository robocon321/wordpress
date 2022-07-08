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
        case 'feedbacks':
          $controller = 'FeedbackAdminController';
          break;
        case 'forums':
          $controller = 'ForumAdminController';
          break;
        case 'statistic':
          $controller = 'StatisticAdminController';
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