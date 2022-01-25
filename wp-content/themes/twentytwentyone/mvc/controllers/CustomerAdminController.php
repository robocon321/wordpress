<?php
class CustomerAdminController extends Controller
{

  public function doGet($params = null)
  {
    if (isset($params['id'])) {
      $data = [];
      $service = $this->service("CustomerDetailAdminService");
      $data['customer'] = $service->getCustomer($params['id']);
      $data['orders'] = $service->getOrdersByIdCustomer($params['id']);
      $this->view("customer-detail-admin", $data);
    } else if (isset($params['action'])) {

      $action = $params['action'];
      switch ($action) {
        case "new": {
            $this->view("customer-detail-admin", $data = []);
          }
          break;
        case "delete": {
            if (isset($params['customer_id'])) {
              $service = $this->service("CustomerAdminService");
              $service->deleteCustomerById($params['customer_id']);
            }
          }
          break;
        default: {
            $this->view("customer-detail-admin", $data = []);
          }
      }
    } else {
      $data = [];
      $service = $this->service("CustomerAdminService");
      $data['customers'] = $service->getCustomerSummary(
        isset($params['search']) ? $params['search'] : '',
        isset($params['sort']) ?  $params['sort'] : 'name',
        isset($params['pg']) ? ((int) $params['pg']) - 1  : 0
      );

      $data['total-customer'] = $service->getTotalCustomer('', array());
      $data['total-page'] = ceil($data['total-customer'] / 10);
      $this->view("customer-admin", $data);
    }
  }
}
