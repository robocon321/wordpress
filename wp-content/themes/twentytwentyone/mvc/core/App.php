<?php
  class App {
    protected $controller = 'home';
    protected $method = 'GET';
    protected $params = [];

    public function __construct() {
      // $controller
      $processUrl = $this -> processURL();
      array_splice($processUrl, 0, 1);
      if(count($processUrl)) {
        $this -> controller = $processUrl[0];
        array_splice($processUrl, 0, 1);
      }

      // method
      $this -> method = $_SERVER['REQUEST_METHOD'];

      // params
      // if(count($processUrl)) {
      //   $cast = (int) $processUrl[0];
      //   $this -> params['route'] = $processUrl[0];
      // }

      $this -> processController();
    }

    public function processURL() {
      if(isset($_SERVER['REQUEST_URI'])) return explode('/', filter_var(trim($_SERVER['REQUEST_URI'], '/')));
      if(isset($_SERVER['REDIRECT_URL'])) return explode('/', filter_var(trim($_SERVER['REDIRECT_URL'], '/')));
      return [];
    }

    public function processController() {
      // Controller
      switch ($this -> controller) {
        case 'forums': 
          $controller = 'ForumController';
          break;
        case 'posts':
          $controller = 'PostController';
          break;
        case 'forum-question':
          $controller = 'ForumQuestionController';
          break;
        case 'services':
          $controller = 'ServiceController';
          break;
        case 'recruit':
          $controller = 'RecruitController';
          break;
        case 'search':
          $controller = 'SearchController';
          break;
        case 'about':
          $controller = 'FeedbackController';
          break;
        case 'wp-admin':
          $controller = 'AdminController';
          break;
        default:
          $controller = 'HomeController';
          break;
      }

      require_once __DIR__.'/../controllers/'.$controller.'.php';
      $controller = new $controller;


      // action
      if($this -> method === 'GET') {
        $action = 'doGet';
        $this -> params = $_GET;
      } else {
        $this -> params = $_POST;
        $method = $this -> params['method'];

        if($method === 'POST') $action = 'doPost';
        else if($method === 'PUT') $action = 'doPut';
        else $action = 'doDelete';
        array_splice($this -> params, 0, 1);
      } 

      // call controller
      if($this -> method === 'GET' && $this -> controller !== 'wp-admin') {
        get_header();
      ?>
      <main>
        <?php $controller -> doGet($this -> params); ?>
      </main>
      <?php
        get_footer();
      } else if($this -> method === 'GET' && $this -> controller === 'wp-admin') {
          $controller -> doController($this -> params);
      } else {
          $controller -> doPost($this -> params);
      }
    }
  }
?>