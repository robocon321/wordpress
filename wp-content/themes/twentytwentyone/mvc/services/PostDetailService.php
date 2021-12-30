<?php
  require_once(__DIR__.'/../models/PostModel.php');
  require_once(__DIR__.'/../models/ForumModel.php');
  require_once(__DIR__.'/../models/CommentModel.php');

  class PostDetailService {
    private $postModel;
    private $forumModel;
    private $commentModel;

    public function __construct() {
      $this -> postModel = new PostModel();
      $this -> forumModel = new ForumModel();
      $this -> commentModel = new CommentModel();
    }
    public function getPost($id) {
      return $this -> postModel -> getPosts(0, 1, null, null, null, array('WP.ID' => $id));
    }

    public function getTags($id) {
      return $this -> postModel -> getPostMeta($id, 'tag');
    }

    public function getForumNews() {
      return $this -> forumModel -> getForums(0, 4, null, 'cre_time', null);
    }

    public function getForumPopulars() {
      return $this -> forumModel -> getForums(0, 4, null, 'view_count', null);
    }

    public function getComments($post_id) {
      return $this -> commentModel -> getComments($post_id);
    }

    public function getPostPopulars() {
      return $this -> postModel -> getPosts(0, 2, null, 'view_count', null, null);
    }

    public function increaseViewCountPost($post_id) {
      return $this -> postModel -> updatePost(array("ID" => $post_id), array("view_count" => "view_count + 1"));
    }

   }
?>