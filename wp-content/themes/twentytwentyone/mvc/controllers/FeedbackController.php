<?php
  class FeedbackController extends Controller {
    
    public function doGet($params = null) {
      $this -> view('about', null);  
    }
  }
?>