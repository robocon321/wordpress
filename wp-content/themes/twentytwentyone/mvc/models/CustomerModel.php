<?php
require_once(__DIR__ . '/../core/Database.php');
class CustomerModel extends Database
{

  function customerModel($name, $email, $phone, $province, $district, $birthday, $street)
  {
    $arr = array(
      "name" => $name,
      "email" => $email,
      "phone" => $phone,
      "province" => $province,
      "district" => $district,
      "street" => $street,
      "birthday" => $birthday
    );
    return $arr;
  }

  public function insertCustomer($name = '', $birthday = '', $email = '', $phone = '', $province = '-1', $district = '-1', $street = '', $cre_time = '', $mod_time = '')
  {
    $cre_time = date("Y-m-d H:i:s");
    $mod_time = $cre_time;
    $province = ($province != '') ? $province : '-1';
    $district = ($district != '') ? $district : '-1';
    $query = "INSERT INTO `my_customers` (`id`, `name`, `phone`, `email`, `birthday`, `province`, `district`, `street`,`cre_time`, `mod_time`)" .
      " VALUES(0, '" . $name . "', '" . $phone . "', '" . $email . "', '" . $birthday . "', '" . $province . "', '" . $district . "',  '" . $street . "', '" . $cre_time . "', '" . $mod_time . "')";
    if (mysqli_query($this->conn, $query)) return $this->conn->insert_id;
    else return 0;
  }

  public function getCustomer($id = 0)
  {
    if ($id == 0) return null;
    else {
      $query = "SELECT `id`, `name`, `phone`, `email`, `birthday`, `province`, `district`, `street` FROM my_customers WHERE id = " . $id;
      $resultset = mysqli_query($this->conn, $query);

      if (mysqli_num_rows($resultset) > 0) {

        $result = mysqli_fetch_assoc($resultset);
        return json_encode($result);
      }
      return null;
    }
  }

  public function updateCustomer($id = 0, $fields = [])
  {
    if ($id == 0 || !isset($fields)) return 0;
    else {
      $query = "UPDATE my_customers SET ";
      foreach ($fields as $key => $value) {
        $query = $query . $key . " = '" . $value . "', ";
      }
      $query = substr($query, 0, -2);
      $query = $query . " WHERE id = " . $id;
      return  mysqli_query($this->conn, $query);
    }
  }

  public function getCustomerSummary(
    $search = '',
    $offset = 0,
    $limit = 10,
    $sortby = 'name',
    $isASC = true,
    $conditions = []
  ) {

    $query = "SELECT MC.id, MC.name, MC.email email, MC.phone phone, MC.province , 
    MC.district, MC.street
    FROM my_customers MC ";
    
    $query = $query . " WHERE MC.name LIKE '%" . $search . "%' ";

    if (isset($conditions)) {
      foreach ($conditions as $key => $value) {
        $query = $query . " AND " . $key . "=" . $value . " ";
      }
    }

    $query = $query . " GROUP BY MC.id ";

    if (isset($sortby)) {
      $query = $query . "ORDER BY " . $sortby . " ";
      if (isset($isASC)) $query = $query . "ASC ";
      else $query = $query . "DESC ";
    }

    if (isset($limit)) {
      if (isset($offset)) $query = $query . "LIMIT " . $offset . ", " . $limit . " ";
      else $query = $query . "LIMIT " . $limit;
    }

    return mysqli_query($this->conn, $query);
  }

  public function getTotalCustomer($search = '', $conditions = [])
  {
    $query = "SELECT COUNT(*) as count FROM my_customers WHERE 1 ";
    $query = $query . "AND name LIKE '%" . $search . "%' ";

    if (isset($conditions)) {
      foreach ($conditions as $key => $value) {
        $query = $query . " AND " . $key . "=" . $value . " ";
      }
    }

    $result = 0;
    while ($row = mysqli_fetch_array(mysqli_query($this->conn, $query))) {
      $result = $row['count'];
      break;
    }

    return $result;
  }

  public function deleteCustomerById($customer_id)
  {
    $query = "DELETE FROM my_customers WHERE id = " . $customer_id;
    mysqli_query($this->conn, $query);
  }
}
