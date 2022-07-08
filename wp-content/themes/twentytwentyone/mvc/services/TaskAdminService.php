<?php
  require_once(__DIR__.'/../models/TaskModel.php');

  class TaskAdminService {
    private $taskModel;

    public function __construct() {
      $this -> taskModel = new TaskModel();
    }

    public function getTaskSummary($search, $sort, $page = 0) {
        return $this -> taskModel -> getTaskSummary($search, $page * 10, 10, $sort, true);
      }
  
      public function getTotalTask($search, $conditions) {
        return $this -> taskModel -> getTotalTask($search, $conditions);
      }
  
      public function deleteTaskById($task_id){
        return $this -> taskModel -> deleteTaskById($task_id);
      }
 }
