<?php
  require_once(__DIR__.'/../models/CustomerModel.php');

  class CustomerAdminService {
    private $customerModel;

    public function __construct() {
      $this -> customerModel = new CustomerModel();
    }

    public function getCustomerSummary($search, $sort, $page = 0) {
      return $this -> customerModel -> getCustomerSummary($search, $page * 10, 10, $sort, true);
    }

    public function getTotalCustomer($search, $conditions) {
      return $this -> customerModel -> getTotalCustomer($search, $conditions);
    }

    public function deleteCustomerById($customer_id){
      return $this -> customerModel -> deleteCustomerById($customer_id);
    }
 }
?>