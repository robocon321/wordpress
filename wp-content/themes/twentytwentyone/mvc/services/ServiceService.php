<?php
  require_once(__DIR__.'/../models/ServiceModel.php');
  require_once(__DIR__.'/../models/ForumModel.php');

  class ServiceService {
    private $serviceModel;
    private $forumModel;

    public function __construct() {
      $this -> serviceModel = new ServiceModel();
      $this -> forumModel = new ForumModel();
    }

    public function filterServices($search = '', $sort= 'view_count', $page = 0) {
      return $this -> serviceModel -> getServices($page * 10, 10, $search, $sort, null, null);
    }

    public function getForumNews() {
      return $this -> forumModel -> getForums(0, 4, null, 'cre_time', null);
    }

    public function getForumPopulars() {
      return $this -> forumModel -> getForums(0, 4, null, 'view_count', null);
    }
   }
?>