<?php
  class ForumAdminController extends Controller {

    public function doGet($params = null) {
      if(isset($params['action'])) {        
        $this -> view('forum-admin');
      } else {
        if(isset($params['id'])) {
          $data = [];
          $service = $this -> service("ForumDetailAdminService");
          $data['forum'] = $service -> getForum($params['id']);
          $data['tags'] = $service -> getTags($params['id']);
          
          $this -> view("forum-detail-admin", $data);
        } else {
          $data = [];
          $service = $this -> service("ForumAdminService");
          $data['forums'] = $service -> getForumSumary(
            isset($params['search']) ? $params['search'] : '', 
            isset($params['sort']) ?  $params['sort'] : 'title', 
            isset($params['pg']) ? ((int) $params['pg']) - 1  : 0);
            
          $data['total-forum'] = $service -> getTotalForum(isset($params['search']) ? $params['search'] : '', array());
          $data['total-page'] = ceil($data['total-forum'] / 10);
          $this -> view("forum-admin", $data);
        }  
      }
    }
  }
?>