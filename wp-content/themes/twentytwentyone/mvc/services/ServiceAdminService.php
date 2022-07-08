<?php
  require_once(__DIR__.'/../models/ServiceModel.php');

  class ServiceAdminService {
    private $serviceModel;

    public function __construct() {
      $this -> serviceModel = new ServiceModel();
    }

    public function getServiceSumary($search, $sort, $page = 0) {      
      return $this -> serviceModel -> getServiceSumary($search, $page * 10, 10, $sort, true);
    }

    public function getTotalService($search, $conditions) {
      return $this -> serviceModel -> getTotalService($search, $conditions);
    }
 }
?>