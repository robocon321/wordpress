<?php
  require_once(__DIR__.'/../models/ForumModel.php');

  class ForumDetailAdminService {
    private $forumModel;

    public function __construct() {
      $this -> forumModel = new ForumModel();
    }

    public function getForum($id){
      return $this -> forumModel -> getForum($id);
    }

    public function getTags($id) {
      return $this -> forumModel -> getForumMeta($id, 'tag');
    }
 }
?>