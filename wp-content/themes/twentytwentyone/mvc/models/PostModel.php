<?php 
  class PostModel extends Database {    
    public function getPosts($offset = null, $limit = null, $search = null, $sortby = null, $isASC = true, $conditions = []) {
      $query = "SELECT * FROM wp_posts WP 
      JOIN wp_term_relationships WTR ON WP.ID = WTR.object_id 
      JOIN wp_term_taxonomy WTT ON WTT.term_taxonomy_id = WTR.term_taxonomy_id
      JOIN wp_terms WT ON WT.term_id = WTT.term_id 
      JOIN wp_users WU ON WU.ID = WP.post_author 
      WHERE WP.post_type = 'post' ";

      if(isset($conditions)) {
        foreach ($conditions as $key => $value) {
          $query = $query." AND ".$key."=".$value." ";
        }
      }
      if(isset($search)) $query = $query."AND WP.post_title LIKE '%".$search."%' ";

      if(isset($sortby)) {
        $query = $query."ORDER BY WP.".$sortby." ";
        if(isset($isASC)) $query = $query."ASC ";
        else $query = $query."DESC ";
      }

      if(isset($limit)) {
        if(isset($offset)) $query = $query."LIMIT ".$offset.", ".$limit." ";
        else $query = $query."LIMIT ".$limit;
      }

      return mysqli_query($this -> conn, $query);
    }

    public function getPostMeta($id = null, $metakey = '') {
      $query = "SELECT * FROM wp_postmeta WHERE 1 ";

      if(isset($id)) $query = $query."AND post_id = ".$id." ";
      if(isset($metakey)) $query = $query."AND meta_key = '".$metakey."' ";

      return mysqli_query($this -> conn, $query);
    }

    public function updatePost($conditions = [], $updates = []) {
      $query = "UPDATE wp_posts SET ";
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