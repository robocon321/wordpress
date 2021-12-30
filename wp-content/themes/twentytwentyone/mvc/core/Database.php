<?php 
  class Database {
    public $conn;
    public $server = "localhost";
    public $uname = "root";
    public $pwd = "";
    public $dbname = "wordpress";

    function __construct() {
      $this -> conn = mysqli_connect($this -> server, $this -> uname, $this -> pwd);
      mysqli_select_db($this -> conn, $this -> dbname);
      mysqli_query($this -> conn, "SET NAMES 'utf8'");
    }
  }
?>