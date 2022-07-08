<?php
require_once(__DIR__ . '/../core/Database.php');
class TaskModel extends Database
{
    public function getTask($id = 0)
    {
        if ($id == 0) return null;
        else {
            $query = "SELECT * FROM my_tasks WHERE id = " . $id;
            $resultset = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($resultset) > 0) {

                $result = mysqli_fetch_assoc($resultset);
                return json_encode($result);
            }
            return null;
        }
    }

    public function getTaskSummary(
        $search = '',
        $offset = 0,
        $limit = 10,
        $sortby = 'name',
        $isASC = true,
        $conditions = []
    ) {

        $query = "SELECT MT.id, MT.status, MT.warranty_period, MT.payment_fee, MT.customer_id,
        MC.name AS name_cus, MC.id AS cus_id, ME.name AS name_emp, ME.id AS emp_id, MS.title, MO.service_id , MT.cre_time
        FROM my_tasks MT 
        LEFT JOIN my_customers MC ON MT.customer_id = MC.id
        LEFT JOIN my_orders MO ON MT.order_id = MO.id
        LEFT JOIN my_employees ME ON MO.employee_id = ME.id
        LEFT JOIN my_services MS ON MO.service_id = MS.id
        ";



        if (isset($conditions)) {
            foreach ($conditions as $key => $value) {
                $query = $query . " AND " . $key . "=" . $value . " ";
            }
        }

        $query = $query . " GROUP BY MT.id ";
        $query = $query . " HAVING name_cus LIKE '%" . $search . "%' ";

        if (isset($sortby)) {
            $query = $query . "ORDER BY " . $sortby . " ";
            if (isset($isASC)) $query = $query . "ASC ";
            else $query = $query . "DESC ";
        }

        if (isset($limit)) {
            if (isset($offset)) $query = $query . "LIMIT " . $offset . ", " . $limit . " ";
            else $query = $query . "LIMIT " . $limit;
        }

        return mysqli_query($this->conn, $query);
    }
    /******************************************************** */
    public function updateTask($id = 0, $fields = [], $order_id = 0, $id_emp=0, $id_service=0, $phone_cus='', $customer_id= 0, $status=0)
    {
        if ($id == 0 || !isset($fields)) return 0;
        else {
            $query = "UPDATE my_tasks SET ";
            foreach ($fields as $key => $value) {
                $query = $query . $key . " = '" . $value . "', ";
            }
            $query = $query . " status = '" . $status . "', ";
            $query = substr($query, 0, -2);
            $query = $query . " WHERE id = " . $id;
            $result =  mysqli_query($this->conn, $query);

            if ($order_id != 0 || isset($orders)) {
                $query = "UPDATE my_orders SET ";
                $query = $query . " employee_id = " . $id_emp . ", ";
                $query = $query . " service_id = " . $id_service . ", ";
                $query = $query . " phone = '" . $phone_cus . "' ";
                $query = $query . " WHERE id = " . $order_id;
                $result =  mysqli_query($this->conn, $query);
            }
        }
        
        return $result;
    }/******************************************************** */

    public function getTotalTask($search = '', $conditions = [])
    {
        $query = "SELECT COUNT(*) as count FROM my_tasks MT WHERE 1 ";
        // $query = $query . "AND MT.name LIKE '%" . $search . "%' ";

        if (isset($conditions)) {
            foreach ($conditions as $key => $value) {
                $query = $query . " AND " . $key . "=" . $value . " ";
            }
        }

        $result = 0;
        while ($row = mysqli_fetch_array(mysqli_query($this->conn, $query))) {
            $result = $row['count'];
            break;
        }

        return $result;
    }

    public function deleteTaskById($task_id)
    {
        $query = "DELETE FROM my_tasks WHERE id = " . $task_id;
        mysqli_query($this->conn, $query);
    }

    public function insertTask(
        $id_emp = '',
        $id_service = '',
        $phone_cus = '',
        $customer_id = '',
        $payment_fee = '0',
        $warranty_period = '',
        $status = '0',
        $note = '',
        $place_time = ''
    ) {
        $cre_time = date("Y-m-d H:i:s");
        $mod_time = $cre_time;
        $is_success = 0;
        if ($status == 2) {
            $is_success = 1;
        }

        $query = "INSERT INTO `my_orders` (`phone`, `service_id`, `cre_time`, `mod_time`, `is_success`, `employee_id`)" .
            " VALUES('" . $phone_cus . "', " . $id_service . ", '" . $cre_time . "', '" . $mod_time . "', '" . $is_success . "', " . $id_emp . ")";
        mysqli_query($this->conn, $query);
        $order_id =  $this->conn->insert_id;


        $query = "INSERT INTO `my_tasks` (`order_id`, `customer_id`, `payment_fee`, `warranty_period`, `status`, `cre_time`, `place_time`, `note`)" .
            " VALUES('" . $order_id . "', '" . $customer_id  . "', '" . $payment_fee . "', '" . $warranty_period . "', '" . $status . "', '" . $cre_time . "',  '" . $place_time . "', '" . $note . "')";
        mysqli_query($this->conn, $query);

        if (mysqli_query($this->conn, $query)) return $this->conn->insert_id;
        else return 0;
    }

    function taskModel($customer_id, $payment_fee, $warranty_period, $note, $place_time)
    {
        $arr = array(
            "customer_id" => $customer_id,
            "payment_fee" => $payment_fee,
            "warranty_period" => $warranty_period,
            "note" => $note,
            "place_time" => $place_time
        );
        return $arr;
    }

    public function getEmployeeByTaskId($id = 0)
    {
        if ($id == 0) return null;
        else {
            $query = "SELECT e.id, e.name, e.phone FROM my_employees e 
            INNER JOIN my_orders o ON e.id=o.employee_id 
            INNER JOIN my_tasks t ON o.id=t.order_id  WHERE t.id = " . $id;
            $resultset = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($resultset) > 0) {

                $result = mysqli_fetch_assoc($resultset);
                return json_encode($result);
            }
            return null;
        }
    }

    public function getCustomerByTaskId($id = 0)
    {
        if ($id == 0) return null;
        else {
            $query = "SELECT c.id, c.name, o.phone, c.street FROM my_customers c 
            INNER JOIN my_tasks t ON c.id=t.customer_id 
            INNER JOIN my_orders o ON o.id=t.order_id
            WHERE t.id = " . $id;

            $resultset = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($resultset) > 0) {

                $result = mysqli_fetch_assoc($resultset);
                return json_encode($result);
            }
            return null;
        }
    }

    public function getServiceByTaskId($id = 0)
    {
        if ($id == 0) return null;
        else {
            $query = "SELECT s.id, s.title, s.price FROM my_services s 
            INNER JOIN my_orders o ON s.id=o.service_id 
            INNER JOIN my_tasks t ON o.id=t.order_id  WHERE t.id = " . $id;
            $resultset = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($resultset) > 0) {

                $result = mysqli_fetch_assoc($resultset);
                return json_encode($result);
            }
            return null;
        }
    }
}
