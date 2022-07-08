<?php
  class FeedbackAdminController extends Controller {

    public function doGet($params = null) {
      if(isset($params['action'])) {        
        $this -> view('feedback-admin');
      } else {
        if(isset($params['id'])) {
          $data = [];
          $service = $this -> service("FeedbackDetailAdminService");
          $data['feedback'] = $service -> getFeedback($params['id']);
          
          $this -> view("feedback-detail-admin", $data);
        } else {
          $data = [];
          $service = $this -> service("FeedbackAdminService");
          $data['feedbacks'] = $service -> getFeedbackSumary(
            isset($params['search']) ? $params['search'] : '', 
            isset($params['sort']) ?  $params['sort'] : 'name', 
            isset($params['pg']) ? ((int) $params['pg']) - 1  : 0);
            
          $data['total-feedback'] = $service -> getTotalFeedback(isset($params['search']) ? $params['search'] : '', array());
          $data['total-page'] = ceil($data['total-feedback'] / 10);
          $this -> view("feedback-admin", $data);
        }  
      }
    }
  }
?>