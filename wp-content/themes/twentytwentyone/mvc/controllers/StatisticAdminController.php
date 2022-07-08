<?php
  class StatisticAdminController extends Controller {

    public function doGet($params = null) {
      $this -> view("statistic-admin");
    }
  }
?>