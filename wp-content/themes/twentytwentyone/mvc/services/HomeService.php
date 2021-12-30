<?php
  require_once(__DIR__.'/../models/PostModel.php');
  require_once(__DIR__.'/../models/ServiceModel.php');
  require_once(__DIR__.'/../models/ForumModel.php');

  class HomeService {
    private $postModel;
    private $serviceModel;
    private $forumModel;

    public function __construct() {
      $this -> postModel = new PostModel();
      $this -> serviceModel = new ServiceModel();
      $this -> forumModel = new ForumModel();
    }

    public function getPostPopulars() {
      return $this -> postModel -> getPosts(0, 3, null, 'view_count', null, null);
    }

    public function getPostNews() {
      return $this -> postModel -> getPosts(0, 4, null, 'post_modified', null, null);
    }

    public function getServiceNews() {
      return $this -> serviceModel -> getServices(0, 4, null, 'cre_time', null);
    }

    public function getForumNews() {
      return $this -> forumModel -> getForums(0, 4, null, 'cre_time', null);
    }

    public function getForumPopulars() {
      return $this -> forumModel -> getForums(0, 4, null, 'view_count', null);
    }
   }
?>