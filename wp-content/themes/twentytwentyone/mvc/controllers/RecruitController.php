<?php
  class RecruitController extends Controller{
    public function doGet($params = null) {
      $this -> view('recruit', $params);
    }
  }
?>