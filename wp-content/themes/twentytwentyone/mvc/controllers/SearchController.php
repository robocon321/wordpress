<?php
  class SearchController extends Controller{
    
    public function doGet($params = null) {
      $data = [];
      $service = $this -> service("SearchService");
      
      if(isset($params['search'])) $strSearch = $params['search'];
      if(isset($params['sort'])) $sort = $params['sort'];
      if(isset($params['options'])) $options = $params['options'];
      if(isset($params['pg'])) $pg = $params['pg'];

      $data['search'] = $service -> search(isset($strSearch) ? $strSearch : '', 
                                          isset($options) ? $options : 'wp_posts+my_forums+my_services', 
                                          isset($pg) ? $pg : 0 , 
                                          isset($sort) ? $sort :'view_count');

      $this -> view('search', $data);
    }
  }
?>