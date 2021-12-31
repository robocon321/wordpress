<?php
  require_once(__DIR__.'/../models/Utils.php');

  class SearchService {
    private $utils;

    public function __construct() {
      $this -> utils = new Utils();
    }

    public function search($strSearch = '', $options = '', $pg = 0, $sortby) {
      $options = trim($options, "+");
      $options = explode('+', $options);
      return $this -> utils -> search($strSearch, $options, $pg*10, $pg*10 + 10, $sortby, false);
    }
   }
?>