<?php 
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
  }
?>