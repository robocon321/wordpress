<?php
  class ServiceController extends Controller{
    
    public function doGet($params = null) {
      $data = [];
      if(isset($params['id'])) {
        $service = $this -> service("ServiceDetailService");
        
        $data['service'] = $service -> getService($params['id']);
        if(!$data['service'] -> num_rows) $this -> doGet();
        $data['forums_new'] = $service -> getForumNews();     
        $data['forums_popular'] = $service -> getForumPopulars();
        $data['tags'] = $service -> getTags($params['id']);
        $data['comments'] = $service -> getComments($params['id']);
        $data['service-popular'] = $service -> getServicePopulars();
        $service -> increaseViewCountService($params['id']);

        $this -> view('service-detail', $data);
      } else {
        $service = $this -> service('ServiceService');

        $data['services_filter'] = $service -> filterServices(
          isset($params['search']) ? $params['search'] : '', 
          isset($params['sort']) ?  $params['sort'] : 'view_count', 
          isset($params['pg']) ? ((int) $params['pg']) - 1  : 0);
        $data['forums_new'] = $service -> getForumNews();     
        $data['forums_popular'] = $service -> getForumPopulars();
  
        $this -> view('service', $data);  
      }
    }
  }
?>