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
        MC.name AS name_cus, MC.id AS cus_id, ME.name AS name_emp, ME.id AS emp_id, MS.title, MC.service_id , MT.cre_time
        FROM my_tasks MT 
        LEFT JOIN my_customers MC ON MT.customer_id = MC.id
        LEFT JOIN my_employees ME ON MT.employee_id = ME.id
        LEFT JOIN my_services MS ON MC.service_id = MS.id
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
    public function updateTask($id = 0, $fields = [], $id_service=0, $phone_cus='', $customer_id= 0, $status=0, $address_cus ='')
    {
        if ($id == 0 || !isset($fields)) return 0;
        else {
            $query = "UPDATE my_tasks SET ";
            $query = $query . " status = " . $status . ", ";
            foreach ($fields as $key => $value) {
                $query = $query . $key . " = '" . $value . "', ";
            }
            $query = substr($query, 0, -2);
            $query = $query . " WHERE id = " . $id;
            $result =  mysqli_query($this->conn, $query);

            if ($customer_id != 0) {
                $query = "UPDATE my_customers SET ";
                $query = $query . " service_id = " . $id_service . ", ";
                $query = $query . " phone = '" . $phone_cus . "' ";
                $query = $query . " street = '" . $address_cus . "' ";
                $query = $query . " WHERE id = " . $customer_id;
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
        $place_time = '',
        $address_cus = ''
    ) {
        $cre_time = date("Y-m-d H:i:s");
        $mod_time = $cre_time;

        $query = "UPDATE my_customers SET phone = ". $phone_cus . ", service_id = " . $id_service .", street = '" . $address_cus . "' where id = " . $customer_id;
        mysqli_query($this->conn, $query);

        $query = "INSERT INTO `my_tasks` (`employee_id`, `customer_id`, `payment_fee`, `warranty_period`, `status`, `cre_time`, `place_time`, `note`)" .
            " VALUES(" . $id_emp . ", " . $customer_id  . ", '" . $payment_fee . "', '" . $warranty_period . "', '" . $status . "', '" . $cre_time . "',  '" . $place_time . "', '" . $note . "')";

        if (mysqli_query($this->conn, $query)) return $this->conn->insert_id;
        else return 0;
    }

    function taskModel($customer_id, $payment_fee, $warranty_period, $note, $place_time, $employee_id)
    {
        $arr = array(
            "customer_id" => $customer_id,
            "payment_fee" => $payment_fee,
            "warranty_period" => $warranty_period,
            "note" => $note,
            "place_time" => $place_time,
            "employee_id" => $employee_id
        );
        return $arr;
    }

    public function getEmployeeByTaskId($id = 0)
    {
        if ($id == 0) return null;
        else {
            $query = "SELECT e.id, e.name, e.phone FROM my_employees e 
            INNER JOIN my_tasks t ON e.id=t.employee_id 
            WHERE t.id = " . $id;
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
            $query = "SELECT c.id, c.name, c.phone, c.street FROM my_tasks t  
            INNER JOIN my_customers c  ON c.id=t.customer_id 
            WHERE t.id =  " . $id;

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
            $query = "SELECT s.id, s.title, s.price 
            FROM my_tasks t 
            INNER JOIN my_customers c ON c.id = t.customer_id
            INNER JOIN my_services s ON s.id = c.service_id where t.id = " . $id;
            $resultset = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($resultset) > 0) {

                $result = mysqli_fetch_assoc($resultset);
                return json_encode($result);
            }
            return null;
        }
    }
}
