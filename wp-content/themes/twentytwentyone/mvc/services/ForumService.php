<?php
  require_once(__DIR__.'/../models/PostModel.php');
  require_once(__DIR__.'/../models/ForumModel.php');

  class ForumService {
    private $postModel;
    private $forumModel;

    public function __construct() {
      $this -> postModel = new PostModel();
      $this -> forumModel = new ForumModel();
    }

    public function filterForums($search = '', $sort= 'view_count', $page = 0) {
      return $this -> forumModel -> getForums($page * 10, 10, $search, $sort, null, null);
    }

    public function getPostNews() {
      return $this -> postModel -> getPosts(0, 4, null, 'post_modified', null);
    }

    public function getPostPopulars() {
      return $this -> postModel -> getPosts(0, 4, null, 'view_count', null);
    }
   }
?>