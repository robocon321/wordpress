<?php 
  require_once(__DIR__.'/../core/Database.php');

  class ServiceModel extends Database {    
    public function getServices($offset = null, $limit = null, $search = null, $sortby = null, $isASC = true, $conditions = []) {
      $query = "SELECT * FROM my_services WHERE 1 ";

      if(isset($conditions)) {
        foreach ($conditions as $key => $value) {
          $query = $query." AND ".$key."=".$value." ";
        }
      }
      if(isset($search)) $query = $query."AND title LIKE '%".$search."%' ";

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

    public function getServiceMeta($id = null, $metakey = '') {
      $query = "SELECT * FROM my_servicemeta WHERE 1 ";

      if(isset($id)) $query = $query."AND service_id = ".$id." ";
      if(isset($metakey)) $query = $query."AND meta_key = '".$metakey."' ";

      return mysqli_query($this -> conn, $query);
    }

    public function updateService($conditions = [], $updates = []) {
      $query = "UPDATE my_services SET ";
      if(isset($updates)) {
        foreach ($updates as $key => $value) {
          $query = $query.$key."=".$value.", ";
        }      
      }
      $query = substr_replace($query, "", -2);

      $query = $query." WHERE 1 ";
      if(isset($conditions)) {
        foreach ($conditions as $key => $value) {
          $query = $query." AND ".$key."=".$value." ";
        }
      }

      return mysqli_query($this -> conn, $query);    
    }

    public function getServiceSumary($search = '', $offset = 0, $limit = 10, $sortby = 'name', $isASC = true, $conditions = []) {
      $query = "SELECT WU.user_nicename name, WU.user_email email ,MS.id, MS.title, MS.price, MS.view_count, MS.mod_time, COUNT(*) count FROM 
      my_services MS LEFT JOIN my_orders MO ON MS.id = MO.service_id JOIN wp_users WU ON MS.author_id = WU.ID";

      $query = $query." WHERE MS.title LIKE '%".$search."%' ";

      if(isset($conditions)) {
        foreach ($conditions as $key => $value) {
          $query = $query." AND ".$key."=".$value." ";
        }
      }

      $query = $query." GROUP BY MO.service_id ";
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

    public function getTotalService($search = '', $conditions = []) {
      $query = "SELECT COUNT(*) count FROM my_services WHERE 1 ";
      $query = $query. "AND title LIKE '%".$search."%' ";
      
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

    public function insertService($values) {
      $cre_time = date('Y-m-d');
      $mod_time = $cre_time;
      $view_count = 0;
      $order_count = 0;

      $query = "INSERT INTO my_services VALUES('', '".$values['title']."', ".$values['author_id'].", '".$values['content']."', '".$values['thumbnail']."', '".$values['price']."', ".$view_count.", ".$order_count.", '".$cre_time."', '".$mod_time."')";
      return mysqli_query($this -> conn, $query);
    }

    public function getAllServices()
    {
      $query = "SELECT * FROM my_services ";
      return mysqli_query($this->conn, $query);
    }

  }
?>