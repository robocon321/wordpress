<?php
  require_once(__DIR__.'/../models/PostModel.php');
  require_once(__DIR__.'/../models/ForumModel.php');

  class PostService {
    private $postModel;
    private $forumModel;

    public function __construct() {
      $this -> postModel = new PostModel();
      $this -> forumModel = new ForumModel();
    }

    public function filterPosts($search = '', $sort= 'view_count', $page = 0) {
      return $this -> postModel -> getPosts($page * 10, 10, $search, $sort, null, null);
    }

    public function getForumNews() {
      return $this -> forumModel -> getForums(0, 4, null, 'cre_time', null);
    }

    public function getForumPopulars() {
      return $this -> forumModel -> getForums(0, 4, null, 'view_count', null);
    }
   }
?>