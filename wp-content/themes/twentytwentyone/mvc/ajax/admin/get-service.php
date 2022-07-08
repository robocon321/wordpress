<?php
require_once(__DIR__ . '/../../models/ServiceModel.php');



$model = new ServiceModel();
$data = $model->getAllServices();

while ($row = mysqli_fetch_array($data)) {
    echo "<tr>";
    echo "<td scope='row'><b>" . $row['id'] . "</b></td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td><button onclick=\"getService(" . $row['id'] . ",'" . $row['title'] . "','" . $row['price'] . "')\">Chọn</button></td>";
    echo "</tr>";
}

