<?php 
  require_once(__DIR__.'/../core/Database.php');
  class ForumModel extends Database {    
    public function getForums($offset = null, $limit = null, $search = null, $sortby = null, $isASC = true, $conditions = []) {
      $query = "SELECT * FROM my_forums WHERE 1 ";
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

    public function getForum($id = 0) {
      if($id == 0) return null;
      else {
        $query = "SELECT * FROM my_forums WHERE id = ".$id;
        return mysqli_query($this -> conn, $query);
      }
    }


    public function getTotalForum($search = '', $conditions = []) {
      $query = "SELECT COUNT(*) as count FROM my_forums WHERE 1 ";
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
    public function getForumMeta($id = null, $metakey = '') {
      $query = "SELECT * FROM my_forummeta WHERE 1 ";

      if(isset($id)) $query = $query."AND forum_id = ".$id." ";
      if(isset($metakey)) $query = $query."AND meta_key = '".$metakey."' ";

      return mysqli_query($this -> conn, $query);
    }

    public function updateForum($conditions = [], $updates = []) {
      $query = "UPDATE my_forums SET ";
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


    public function insertForum($title, $author_name, $author_avatar, $email, $content) {
      $cre_time = date("Y-m-d H:i:s");
      $mod_time = $cre_time;
      $query = 'INSERT INTO my_forums VALUES(0, "'.$title.'", "'.$author_name.'", "'.$author_avatar.'", "'.$email.'", "'.$content.'", 0, "'.$cre_time.'", "'.$mod_time.'", 1)';
      if(mysqli_query($this -> conn, $query)) return mysqli_insert_id($this -> conn);
      else return 0;  
    }

    public function insertForumMeta($forum_id, $keys, $values) {
      $query = 'INSERT INTO my_forummeta VALUES';
      if(count($keys) === 1) {
        for($i = 0; $i < count($values); $i ++) {
          $row = '(0, '.$forum_id.', "'.$keys[0].'", "'.$values[$i].'"),';
          $query = $query.$row;
        }
      } else {
        for($i = 0; $i < count($values); $i ++) {
          $row = '(0, '.$forum_id.', "'.$keys[$i].'", "'.$values[$i].'"),';
          $query = $query.$row;
        }
      }
      $query = substr($query, 0, -1);
      return mysqli_query($this -> conn, $query);
    }

    public function deleteForum() {
      return null;
    }
  }