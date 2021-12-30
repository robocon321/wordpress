<?php
  require_once(__DIR__.'/../models/PostModel.php');
  require_once(__DIR__.'/../models/ForumModel.php');
  require_once(__DIR__.'/../models/CommentModel.php');

  class ForumDetailService {
    private $postModel;
    private $forumModel;
    private $commentModel;

    public function __construct() {
      $this -> postModel = new PostModel();
      $this -> forumModel = new ForumModel();
      $this -> commentModel = new CommentModel();
    }

    public function getForum($forum_id) {
      return $this -> forumModel -> getForums(0, 1, null, null, null, array('id' => $forum_id));
    }

    public function getComments($forum_id) {
      return $this -> commentModel -> getComments($forum_id, 'forum');
    }

    public function getPostPopulars() {
      return $this -> postModel -> getPosts(0, 2, null, 'view_count', null, null);
    }

    public function getPostNews() {
      return $this -> postModel -> getPosts(0, 4, null, 'post_modified', null, null);
    }

    public function getTags($forum_id) {
      return $this -> forumModel -> getForumMeta($forum_id, 'tag');
    }

    public function increaseViewCountForum($forum_id) {
      return $this -> forumModel -> updateForum(array("id" => $forum_id), array("view_count" => "view_count + 1"));
    }

    public function getForumPopulars() {
      return $this -> forumModel -> getForums(0, 2, null, 'view_count', null, null);
    }
   }
?>