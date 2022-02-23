<?php
  require_once(__DIR__.'/../models/FeedbackModel.php');

  class FeedbackAdminService {
    private $feedbackModel;

    public function __construct() {
      $this -> feedbackModel = new FeedbackModel();
    }

    public function getFeedbackSumary($search, $sort, $page = 0) {
      return $this -> feedbackModel -> getFeedbacks($search, $page * 10, 10, $sort, true);
    }

    public function getTotalFeedback($search, $conditions) {
      return $this -> feedbackModel -> getTotalFeedback($search, $conditions);
    }

    public function deleteFeedback(){
      return $this -> feedbackModel -> deleteFeedback();
    }
 }
?>