<?php
  require_once(__DIR__.'/../models/ForumModel.php');

  class ForumAdminService {
    private $forumModel;

    public function __construct() {
      $this -> forumModel = new ForumModel();
    }

    public function getForumSumary($search, $sort, $page = 0) {
      return $this -> forumModel -> getForums($page * 10, 10, $search, $sort, true);
    }

    public function getTotalForum($search, $conditions) {
      return $this -> forumModel -> getTotalForum($search, $conditions);
    }

    public function deleteForum(){
      return $this -> forumModel -> deleteForum();
    }
 }
?>