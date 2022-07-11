<?php 
  require_once(__DIR__.'/../core/Database.php');
  class UserModel extends Database {
    public function getUsers($offset = null, $limit = null, $search = '', $sortby = null, $isASC = true, $conditions = []) {
      $query = "SELECT * FROM wp_users WHERE 1 ";

      $query = $query." AND user_nicename LIKE '%".$search."%' ";

      if(isset($conditions)) {
        foreach ($conditions as $key => $value) {
          $query = $query." AND ".$key."=".$value." ";
        }
      }

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
  }  
?>