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
  }

?>