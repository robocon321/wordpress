<?php
require_once(__DIR__ . '/../../models/CustomerModel.php');



$model = new CustomerModel();
$data = $model->getCustomers();

while ($row = mysqli_fetch_array($data)) {
    echo "<tr>";
    echo "<td scope='row'><b>" . $row['id'] . "</b></td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['street'] . "</td>";
    echo "<td><button onclick=\"getCustomer(" . $row['id'] . ",'" . $row['name'] . "','" . $row['phone'] . "','" . $row['street'] . "')\">Chọn</button></td>";
    echo "</tr>";
}

