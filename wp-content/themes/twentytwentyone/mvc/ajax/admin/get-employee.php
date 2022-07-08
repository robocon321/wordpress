<?php
require_once(__DIR__ . '/../../models/EmployeeModel.php');



$model = new EmployeeModel();
$data = $model->getAllEmployees();

while ($row = mysqli_fetch_array($data)) {
    echo "<tr>";
    echo "<td scope='row'><b>" . $row['id'] . "</b></td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td><button onclick=\"getEmployee(" . $row['id'] . ",'" . $row['name'] . "','" . $row['phone'] . "')\">Chọn</button></td>";
    echo "</tr>";
}
