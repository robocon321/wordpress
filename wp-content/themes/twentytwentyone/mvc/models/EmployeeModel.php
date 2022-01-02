<?php 
  require_once(__DIR__.'/../core/Database.php');
  class EmployeeModel extends Database {    
    public function insertEmployee($name = '', $birthday = '', $email = '', $phone = '', $province = '', $district = '', $academic_level = '', $fields = '', $work_time = '', $cre_time = '', $mod_time = '') {
      $cre_time = date("Y-m-d H:i:s");
      $mod_time = $cre_time;

      $query = "INSERT INTO my_employees VALUES(0, '".$name."', '".$birthday."', '".$email."', '".$phone."', '".$province."', '".$district."', '".$academic_level."', '".$fields."', '".$work_time."', '".$cre_time."', '".$mod_time."', 0)";
      if(mysqli_query($this -> conn, $query)) return $this -> conn -> insert_id;
      else return 0;
    }

    public function getEmployeeSumary($search = '', $offset = 0, $limit = 10, $sortby = 'name', $isASC = true, $conditions = []) {
      $query = "SELECT ME.name name, ME.email email, ME.phone phone, ME.province province, ME.status status, ME.district district , COUNT(MO.service_id) total, 
      (
          SELECT COUNT(id) FROM my_orders WHERE is_success = 1 AND employee_id = MO.employee_id
      ) success_true
      FROM my_employees ME LEFT JOIN my_orders MO ON ME.id = MO.employee_id ";

      $query = $query." WHERE ME.name LIKE '%".$search."' ";

      if(isset($conditions)) {
        foreach ($conditions as $key => $value) {
          $query = $query." AND ".$key."=".$value." ";
        }
      }

      $query = $query." GROUP BY MO.employee_id ";
      if(isset($sortby)) {
        $query = $query."ORDER BY ".$sortby." ";
        if(isset($isASC)) $query = $query."ASC ";
        else $query = $query."DESC ";
      }

      if(isset($limit)) {
        if(isset($offset)) $query = $query."LIMIT ".$offset.", ".$limit." ";
        else $query = $query."LIMIT ".$limit;
      }

      return mysqli_query($this -> conn, $query);
    }

    public function getTotalEmployee($search = '', $conditions = []) {
      $query = "SELECT COUNT(*) as count FROM my_employees WHERE 1 ";
      $query = $query. "AND name LIKE '%".$search."%' ";
      
      if(isset($conditions)) {
        foreach ($conditions as $key => $value) {
          $query = $query." AND ".$key."=".$value." ";
        }
      }

      $result = 0;
      while($row = mysqli_fetch_array(mysqli_query($this -> conn, $query))) {
        $result = $row['count'];
        break;
      }

      return $result;
    }
  }

  
?>