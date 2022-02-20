<?php
  require_once(__DIR__.'/../models/ServiceModel.php');
  require_once(__DIR__.'/../models/OrderModel.php');
  require_once(__DIR__.'/../models/UserModel.php');


  class ServiceDetailAdminService {
    private $serviceModel;
    private $orderModel;

    public function __construct() {
      $this -> serviceModel = new ServiceModel();
      $this -> orderModel = new OrderModel();
    }

    public function getTags($service_id) {
      return $this -> serviceModel -> getServiceMeta($service_id, 'tag');      
    }

    public function getService($service_id) {
      return $this -> serviceModel -> getServices(0, 1, '', 'title', true, array('id' => $service_id));
    }

    public function getTotalOrder($service_id) {
      return $this -> orderModel -> getCountOrder(array('service_id', $service_id));
    }
 }
?>