<?php 
  require_once(__DIR__.'/../models/ForumModel.php');
  
  if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['avatar']) || !isset($_POST['content']) || !isset($_POST['title'])) echo(0);
  else {
  // get info from post

    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $avatar = $_POST['avatar'];
    $title = $_POST['title'];

    $model = new ForumModel();
    $id = $model -> insertForum($title, $name, $avatar, $email, $content);

    if($id) {
      if(isset($_POST['tags'])) {
        $tags = $_POST['tags'];
        $tagArr = explode(", ", $tags);
        $tagArrMap = array_map(function ($val) {
          return trim($val, " ");
        }, $tagArr);
        $tagArrFilter = array_filter($tagArrMap, function ($val) {
          return strlen($val) > 0;
        });
        if(count($tagArrFilter) > 0) echo($model -> insertForumMeta($id, array('tag'), $tagArrFilter));
        else echo 0;
      } else {
        echo 0;
      }
    } else {
      echo 0;
    }
  }

?>