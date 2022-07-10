<?php
require_once(__DIR__ . '/../../models/ServiceModel.php');


$id_cus = $_POST['id_cus'];
$model = new ServiceModel();
$data = $model->getServiceByCustomer($id_cus);

while ($row = mysqli_fetch_array($data)) {
    echo $row['id'].','.$row['title'].','.$row['price'];
}

