<?php
  require_once(__DIR__.'/../models/CustomerModel.php');
  require_once(__DIR__.'/../models/OrderModel.php');

  class CustomerDetailAdminService {
    private $customerModel;
    private $orderModel;

    public function __construct() {
      $this -> customerModel = new CustomerModel();
      $this -> orderModel = new OrderModel();
    }

    public function getCustomer($id) {
      return  json_decode($this -> customerModel ->getCustomer($id), TRUE);
    }
   
    public function getOrdersByIdCustomer($customerId) {
      return $this -> orderModel -> getOrdersByIdCustomer($offset = 0, $limit = 100, $sortby = 'id', $isASC = true, $conditions = array("customer_id" => $customerId));
    }
 }
?>