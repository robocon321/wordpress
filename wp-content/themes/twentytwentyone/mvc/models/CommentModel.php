<?php 
  require_once(__DIR__.'/../core/Database.php');
  class CommentModel extends Database {
    public function insertComment($post_id = null, $name = null, $avatar = null, $email = null, $content = null, $commentParent = 0, $commentType = 'comment') {
      $query = "INSERT INTO wp_comments VALUES
      (0, ".$post_id.", '".$name."', '".$email."', '".$avatar."', '', '', current_time(), current_time(), '".$content."', 0, 1, '', '".$commentType."', ".$commentParent.", 0)";

      if (mysqli_query($this -> conn, $query)) {
        echo(1);
      } else {
        echo(0);
      }
    }

    public function getComments($post_id = null, $commentType = 'comment', $email = null) {
      $query = "SELECT * FROM wp_comments WHERE 1 ";
      if(isset($post_id)) $query = $query."AND comment_post_ID = '".$post_id."' ";
      if(isset($email)) $query = $query."AND comment_author_email = '".$email."' ";
      if(isset($commentType)) $query = $query."AND comment_type = '".$commentType."' ";
      return mysqli_query($this -> conn, $query);
    }
  }
?>