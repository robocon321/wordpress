<?php 
  class Utils extends Database {    
    public function search($strSearch = '', $options = [], $offset = 0, $limit = 0, $sortby = 'view_count', $isDES = false) {
      $query = 'SELECT * FROM (';
      for($i = 0; $i < count($options); $i ++) {
        if($options[$i] === 'wp_posts') {
          $query = $query.'SELECT ID id, post_title title, post_content content, post_modified mod_time, view_count, "posts" type FROM wp_posts WHERE post_type = "post" ';
        } else if($options[$i] === 'my_forums') {
          $query = $query.'SELECT id, title, content, mod_time, view_count, "forums" type FROM my_forums ';
        } else {
          $query = $query.'SELECT id, title, content, mod_time, view_count, "services" type FROM my_services ';
        }
        $query = $query.'UNION ';
      }

      $query = substr($query, 0, -6);
      $query = $query.') tb ';
      
      $query = $query.'WHERE title LIKE "%'.$strSearch.'%" ';
      $query = $query.'ORDER BY '.$sortby.' ';
      
      if($isDES) $query = $query.'DESC ';
      else $query = $query.'ASC ';

      if(isset($offset)) $query = $query."LIMIT ".$offset.", ".$limit." ";
      else $query = $query."LIMIT ".$limit;

      return mysqli_query($this -> conn, $query);
    }
  }
?>