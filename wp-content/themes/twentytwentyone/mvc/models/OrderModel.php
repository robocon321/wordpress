<?php
require_once(__DIR__ . '/../core/Database.php');
class OrderModel extends Database
{
  public function getOrders($offset = null, $limit = null, $sortby = null, $isASC = true, $conditions = []) {
    $query = "SELECT MO.*, ME.name, ME.email, ME.phone phone_employee, MS.title, MS.content, MS.price FROM my_orders MO 
      JOIN my_employees ME ON MO.employee_id = ME.id 
      JOIN my_services MS ON MS.id = MO.service_id
      WHERE 1 ";

    if (isset($conditions)) {
      foreach ($conditions as $key => $value) {
        $query = $query . " AND " . $key . "=" . $value . " ";
      }
    }

    if (isset($sortby)) {
      $query = $query . "ORDER BY MO." . $sortby . " ";
      if (isset($isASC)) $query = $query . "ASC ";
      else $query = $query . "DESC ";
    }

    if (isset($limit)) {
      if (isset($offset)) $query = $query . "LIMIT " . $offset . ", " . $limit . " ";
      else $query = $query . "LIMIT " . $limit;
    }

    return mysqli_query($this->conn, $query);
  }

  public function getOrdersByIdCustomer($offset = null, $limit = null, $sortby = null, $isASC = true, $conditions = []) {
    $query = "SELECT MO.is_success, MT.customer_id, MS.title, MS.content, MS.price, MO.cre_time, MT.warranty_period
    FROM my_orders MO 
      JOIN my_tasks MT ON MT.order_id = MO.id 
      JOIN my_services MS ON MS.id = MO.service_id
      WHERE 1 ";

    if (isset($conditions)) {
      foreach ($conditions as $key => $value) {
        $query = $query . " AND " . $key . "=" . $value . " ";
      }
    }

    if (isset($sortby)) {
      $query = $query . "ORDER BY MO." . $sortby . " ";
      if (isset($isASC)) $query = $query . "ASC ";
      else $query = $query . "DESC ";
    }
    if (isset($limit)) {
      if (isset($offset)) $query = $query . "LIMIT " . $offset . ", " . $limit . " ";
      else $query = $query . "LIMIT " . $limit;
    }

    return mysqli_query($this->conn, $query);
  }

  public function getCountOrder($conditions) {
    $query = "SELECT count(*) FROM my_orders WHERE 1 ";
    if(isset($conditions)) {
      foreach ($conditions as $key => $value) {
        $query = $query." AND ".$key."=".$value." ";
      }
    }
    return mysqli_query($this -> conn, $query);
  }

  public function insertOrder($phone, $service_id, $is_success = false, $employee_id = null) {
    $cre_time = date("Y-m-d H:i:s");
    $mod_time = $cre_time;

    $query = "INSERT INTO my_orders VALUES(0, '".$phone."', ".$service_id.", '".$cre_time."', '".$mod_time."'";
    
    if($is_success) {
      $query = $query.", ".$is_success;
    } else {
      $query = $query.", NULL";
    }

    if($employee_id == null) {
      $query = $query.", NULL)";
    } else {
      $query = $query.", ".$employee_id.")";
    }

    if(mysqli_query($this -> conn, $query)) return $this -> conn -> insert_id;
    else return 0;

  }
}
