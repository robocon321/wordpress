<?php
  class ForumQuestionController extends Controller {
    
    public function doGet($params = null) {
      $this -> view('forum-question');
    }
  }
?>