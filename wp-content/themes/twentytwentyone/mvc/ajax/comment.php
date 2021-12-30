<?php 
  require_once(__DIR__.'/../models/CommentModel.php');
  
  if(!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['content']) || !isset($_POST['avatar'])) echo(0);
  else {
  // get info from post

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $avatar = $_POST['avatar'];
    $commentParent = $_POST['comment-parent'];
    if(isset($_POST['comment-type'])) $commentType = $_POST['comment-type'];
    else $commentType = 'comment';

    $model = new CommentModel();
    $model -> insertComment($id, $name, $avatar, $email, $content, $commentParent, $commentType);
  // 
}

?>