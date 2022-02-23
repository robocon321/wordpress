<?php
  require_once(__DIR__.'/../models/ServiceModel.php');
  require_once(__DIR__.'/../models/ForumModel.php');
  require_once(__DIR__.'/../models/CommentModel.php');

  class ServiceDetailService {
    private $serviceModel;
    private $forumModel;
    private $commentModel;

    public function __construct() {
      $this -> serviceModel = new ServiceModel();
      $this -> forumModel = new ForumModel();
      $this -> commentModel = new CommentModel();
    }
    public function getService($id) {
      return $this -> serviceModel -> getservices(0, 1, null, null, null, array('id' => $id));
    }

    public function getTags($id) {
      return $this -> serviceModel -> getServiceMeta($id, 'tag');
    }

    public function getForumNews() {
      return $this -> forumModel -> getForums(0, 4, null, 'cre_time', null);
    }

    public function getForumPopulars() {
      return $this -> forumModel -> getForums(0, 4, null, 'view_count', null);
    }

    public function getComments($service_id) {
      return $this -> commentModel -> getComments($service_id, 'service');
    }

    public function getServicePopulars() {
      return $this -> serviceModel -> getServices(0, 2, null, 'view_count', null, null);
    }

    public function increaseViewCountService($service_id) {
      return $this -> serviceModel -> updateService(array("id" => $service_id), array("view_count" => "view_count + 1"));
    }

   }
?>