<?php
  class PostController extends Controller{
    
    public function doGet($params = null) {
      $data = [];
      if(isset($params['id'])) {
        $service = $this -> service("PostDetailService");
        
        $data['post'] = $service -> getPost($params['id']);
        if(!$data['post'] -> num_rows) $this -> doGet();
        $data['forums_new'] = $service -> getForumNews();     
        $data['forums_popular'] = $service -> getForumPopulars();
        $data['tags'] = $service -> getTags($params['id']);
        $data['comments'] = $service -> getComments($params['id']);
        $data['post-popular'] = $service -> getPostPopulars();
        $service -> increaseViewCountPost($params['id']);

        $this -> view('post-detail', $data);
      } else {
        $service = $this -> service('PostService');

        $data['posts_filter'] = $service -> filterPosts(
          isset($params['search']) ? $params['search'] : '', 
          isset($params['sort']) ?  $params['sort'] : 'view_count', 
          isset($params['pg']) ? ((int) $params['pg']) - 1  : 0);
        $data['forums_new'] = $service -> getForumNews();     
        $data['forums_popular'] = $service -> getForumPopulars();
  
        $this -> view('post', $data);  
      }
    }
  }
?>