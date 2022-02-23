<?php
  require_once(__DIR__.'/../models/FeedbackModel.php');

  class FeedbackDetailAdminService {
    private $feedbackModel;

    public function __construct() {
      $this -> feedbackModel = new FeedbackModel();
    }

    public function getFeedback($id){
      return $this -> feedbackModel -> getFeedback($id);
    }
 }
?>