<?php 
  require_once(__DIR__.'/../core/Database.php');
  class FeedbackModel extends Database {    
    public function insertFeedback($name, $email = '', $phone = '', $content) {
      $cre_time = date("Y-m-d H:i:s");
      $mod_time = $cre_time;

      $query = "INSERT INTO my_feedbacks VALUES(0, '".$name."', '".$email."', '".$phone."', '".$content."', '".$cre_time."', '".$mod_time."', 0)";
      if(mysqli_query($this -> conn, $query)) return $this -> conn -> insert_id;
      else return 0;
    }

    public function getFeedbacks($search = '', $offset = 0, $limit = 10, $sortby = 'name', $isASC = true, $conditions = []) {
      $query = "SELECT * FROM my_feedbacks ";

      $query = $query." WHERE name LIKE '%".$search."%' ";

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

    public function getTotalFeedback($search = '', $conditions = []) {
      $query = "SELECT COUNT(*) as count FROM my_feedbacks WHERE 1 ";
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

    public function getFeedback($id = 0) {
      if($id == 0) return null;
      else {
        $query = "SELECT * FROM my_feedbacks WHERE id = ".$id;
        return mysqli_query($this -> conn, $query);
      }
    }

    public function updateFeedback($id = 0, $fields = []) {
      if($id == 0 || !isset($fields)) return 0;
      else {
        $query = "UPDATE my_feedbacks SET ";
        foreach($fields as $key => $value) {
          $query = $query.$key." = '".$value."', ";
        }
        $query = substr($query, 0, -2);
        $query = $query." WHERE id = ".$id;
        return mysqli_query($this -> conn, $query);
      }
    } 
    public function deleteFeedback() {
      return null;
    }
  }
?>