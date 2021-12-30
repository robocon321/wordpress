<?php
  class ForumController extends Controller {
    
    public function doGet($params = null) {
      $data = [];
      if(isset($params['id'])) {
        $service = $this -> service("ForumDetailService");
        
        $data['forum'] = $service -> getForum($params['id']);
        if(!$data['forum'] -> num_rows) $this -> doGet();
        $data['posts_new'] = $service -> getPostNews();
        $data['posts_popular'] = $service -> getPostPopulars();
        $data['tags'] = $service -> getTags($params['id']);
        $data['comments'] = $service -> getComments($params['id']);
        $data['forum-popular'] = $service -> getForumPopulars();
        $service -> increaseViewCountForum($params['id']);

        $this -> view('forum-detail', $data);
      } else {
        $service = $this -> service('ForumService');

        $data['forums_filter'] = $service -> filterForums(
          isset($params['search']) ? $params['search'] : '', 
          isset($params['sort']) ?  $params['sort'] : 'view_count', 
          isset($params['pg']) ? ((int) $params['pg']) - 1  : 0);
        $data['posts_new'] = $service -> getPostNews();     
        $data['posts_popular'] = $service -> getPostPopulars();
  
        $this -> view('forum', $data);  
      }
    }
  }
?>