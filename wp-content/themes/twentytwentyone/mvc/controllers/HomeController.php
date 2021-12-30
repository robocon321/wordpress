<?php
  class HomeController extends Controller{
    public function doGet($params = null) {
      $data = [];
      $service = $this -> service('HomeService');

      $data['posts_popular'] = $service -> getPostPopulars();
      $data['posts_new'] = $service -> getPostNews();
      $data['services_new'] = $service -> getServiceNews();
      $data['forums_new'] = $service -> getForumNews();     
      $data['forums_popular'] = $service -> getForumPopulars();

      $this -> view('home', $data);
    }
  }
?>