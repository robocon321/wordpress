<?php
class TaskAdminController extends Controller
{
    public function doGet($params = null)
    {
        if (isset($params['id'])) {
            $data = [];
            $service = $this->service("TaskDetailAdminService");
            $data['task'] = $service->getTask($params['id']);
            $data['emp'] = $service->getEmployee($params['id']);
            $data['service'] = $service->getService($params['id']);
            $data['cus'] = $service->getCustomer($params['id']);
            $this->view("task-detail-admin", $data);
        } else if (isset($params['action'])) {

            $action = $params['action'];
            switch ($action) {
                case "new": {
                        $this->view("task-detail-admin", $data = []);
                    }
                    break;
                case "delete": {
                        if (isset($params['task_id'])) {
                            $service = $this->service("TaskAdminService");
                            $service->deleteTaskById($params['task_id']);
                        }
                    }
                    break;
                default: {
                        $this->view("task-detail-admin", $data = []);
                    }
            }
        } else {
            $data = [];
            $service = $this->service("TaskAdminService");
            $data['tasks'] = $service->getTaskSummary(
                isset($params['search']) ? $params['search'] : '',
                isset($params['sort']) ?  $params['sort'] : 'cre_time',
                isset($params['pg']) ? ((int) $params['pg']) - 1  : 0
            );

            $data['total-task'] = $service->getTotalTask('', array());
            $data['total-page'] = ceil($data['total-task'] / 10);
            $this->view("task-admin", $data);
        }
    }
}
