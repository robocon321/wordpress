<?php 
    require_once(__DIR__.'/../models/OrderModel.php');
    $data = [];
    $model = new OrderModel();
    $rows = $model -> getOrders(0, 20, 'id', true, array('MC.phone' => "'".$_POST['lookup']."'"));

    if($rows && $rows -> num_rows > 0) {
        $data['is_success'] = true;
        $data['message'] = 'Thành công';
        while($row = mysqli_fetch_array($rows))
        {
            $resultSet[] = $row;
        }
        $data['orders'] = $resultSet;
    } else {
        $data['is_success'] = false;
        $data['message'] = 'Thất bại';
    }

    echo(json_encode($data, JSON_UNESCAPED_UNICODE));
?>