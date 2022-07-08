<div class="modal fade bd-example-modal-sm" id="modelSuccess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content d-flex flex-row align-items-center p-4">
            <img class="mr-1" src="<?php echo (get_template_directory_uri() . '/upload/yes-icon.png'); ?>" style="width: 50px; height:50px" alt="Not found" />
            <h1 class="m-0" style="display: inline-block;">Thành công</h1>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" id="modelFail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content d-flex flex-row align-items-center p-4">
            <img class="mr-1" src="<?php echo (get_template_directory_uri() . '/upload/close-icon.png'); ?>" style="width: 50px; height:50px" alt="Not found" />
            <h1 class="m-0" style="display: inline-block;">Thất bại</h1>
        </div>
    </div>
</div>


<div class="container">
    <h1>Thông tin task</h1>

    <?php
    $task = [];
    if (isset($data['task'])) {
        $task = $data['task'];
    }
    $cus = [];
    if (isset($data['cus'])) {
        $cus = $data['cus'];
    }
    $emp = [];
    if (isset($data['emp'])) {
        $emp = $data['emp'];
    }
    $service = [];
    if (isset($data['service'])) {
        $service = $data['service'];
    }
    ?>
    <form id="form_task">
        <input type="hidden" value="<?php echo isset($task['id']) ? $task['id'] : "" ?>" id="id" name="task_id" />
        <input type="hidden" value="<?php echo isset($task['order_id']) ? $task['order_id'] : "" ?>" id="id" name="order_id" />
        <b> <span>KHÁCH HÀNG</span></b>
        <button class="btn btn-outline-primary btn-sm mt-1 mb-1 ml-1" type="button" onclick="showCustomerList()">Chọn khách hàng</button>
        <button class="btn btn-outline-primary btn-sm mt-1 mb-1 ml-1" type="button" onclick="location.href='http://localhost/wordpress/wp-admin/admin.php?page=customers&action=new'">Thêm khách hàng</button>

        <div class="form-group row mt-2 pb-1" style="border: solid 1px #ffff;">
            <input type="hidden" class="form-control" id="id_cus" name="id_cus"
            value="<?php echo  isset($cus['id']) ? $cus['id'] : '' ?>">
            <div class="col">
                <label for="name_cus">Tên khách hàng:</label>
                <input type="text" class="form-control" id="name_cus" name="name_cus" readonly style="background:#f9f9f9 ;"
                value="<?php echo  isset($cus['name']) ? $cus['name'] : '' ?>">
            </div>
            <div class="col">
                <label for="name_cus">SĐT đặt hàng:</label>
                <input type="tel" id="phone_cus" name="phone_cus" pattern="\d{8,14}" class="form-control"
                value="<?php echo  isset($cus['phone']) ? $cus['phone'] : '' ?>">
            </div>
            <div class="col-md-12 mt-1 mb-1">
                <label for="address_cus">Địa chỉ:</label>
                <input type="text" id="address_cus" name="address_cus" class="form-control" readonly style="background:#f9f9f9 ;"
                value="<?php echo  isset($cus['street']) ? $cus['street'] : '' ?>">
            </div>
        </div>

        <b> <span>DỊCH VỤ</span></b>
        <button class="btn btn-outline-primary btn-sm mt-1 mb-1 ml-1" type="button" onclick="showServiceList()">Chọn dịch vụ</button>
        <button class="btn btn-outline-primary btn-sm mt-1 mb-1 ml-1" type="button" onclick="location.href='http://localhost/wordpress/wp-admin/admin.php?page=services&action=new'">Thêm dịch vụ</button>

        <div class="form-group row mt-2 pb-2" style="border: solid 1px #ffff;">
            <input type="hidden" id="id_service" name="id_service"
            value="<?php echo  isset($service['id']) ? $service['id'] : '' ?>">
            <div class="col">
                <label for="title_service">Tên dịch vụ:</label>
                <input type="text" class="form-control" id="title_service" name="title_service" readonly style="background:#f9f9f9 ;"
                value="<?php echo  isset($service['title']) ? $service['title'] : '' ?>">
            </div>
            <div class="col">
                <label for="price_service">Giá dịch vụ:</label>
                <input type="text" id="price_service" name="price_service" class="form-control" readonly style="background:#f9f9f9 ;"
                value="<?php echo  isset($service['price']) ? $service['price'] : '' ?>">
            </div>
        </div>

        <b> <span>NHÂN VIÊN</span></b>
        <button class="btn btn-outline-primary btn-sm mt-1 mb-1 ml-1" type="button" onclick="showEmployeeList()">Chọn nhân viên</button>
        <button class="btn btn-outline-primary btn-sm mt-1 mb-1 ml-1" type="button" onclick="location.href='http://localhost/wordpress/recruit/'">Thêm nhân viên</button>

        <div class="form-group row mt-2 pb-2" style="border: solid 1px #ffff; ">
            <input type="hidden" id="id_emp" name="id_emp"
            value="<?php echo  isset($emp['id']) ? $emp['id'] : '' ?>">
            <div class="col">
                <label for="name_emp">Tên nhân viên:</label>
                <input type="text" class="form-control" id="name_emp" name="name_emp" readonly style="background:#f9f9f9 ;"
                value="<?php echo  isset($emp['name']) ? $emp['name'] : '' ?>">
            </div>
            <div class="col">
                <label for="phone_emp">SĐT nhân viên:</label>
                <input type="tel" id="phone_emp" name="phone_emp" pattern="\d{8,14}" class="form-control" readonly style="background:#f9f9f9 ;"
                value="<?php echo  isset($emp['phone']) ? $emp['phone'] : '' ?>">
            </div>
        </div>

        <b> <span>MÔ TẢ CÔNG VIỆC</span></b>
        <div class="form-group row mt-2 pb-2" style="border: solid 1px #ffff; ">
            <div class="col-md-6">
                <label for="place_time">Thời gian phục vụ:</label>
                <input type="text" class="form-control" id="place_time" name="place_time"
                value="<?php echo  isset($task['place_time']) ? $task['place_time'] : '' ?>">
            </div>
            <div class="col-md-6 mt-1 mb-1">
                <label for="name_emp">Hạn bảo hành:</label>
                <input type="text" id="warranty_period" name="warranty_period" class="form-control"
                value="<?php echo  isset($task['warranty_period']) ? $task['warranty_period'] : '' ?>">
            </div>
            <div class="col-md-6 mt-1 mb-1 form-group">
                <label for="status">Trạng thái:</label>
                <input type="hidden" id="status" name="status"
                    value="<?php echo  isset($task['status']) ? $task['status'] : 0 ?>">
                <select class="form-control" id="selectStatus">
                    <option value="0">Đang chờ</option>
                    <option value="1">Đang làm</option>
                    <option value="2">Hoàn thành</option>
                    <option value="3">Đã hủy</option>
                    <option value="4">Bị lỗi</option>
                </select>
            </div>
            <div class="col-md-6 mt-1 mb-1">
                <label for="payment_fee">Thanh toán:</label>
                <input type="number" id="payment_fee" name="payment_fee" class="form-control" 
                value="<?php echo  isset($task['payment_fee']) ? $task['payment_fee'] : '' ?>">
            </div>
            <div class="col-md-12 mt-1 mb-1">
                <label for="note">Ghi chú:</label>
                <input type="text" id="note" name="note" class="form-control"
                value="<?php echo  isset($task['note']) ? $task['note'] : '' ?>">
            </div>
        </div>

        <button class="btn btn-primary" id="btn_save">Cập nhật</button>
    </form>


    <!-- Modal -->
    <div class="modal fade" id="listCustomerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 700px;">
                <div class="modal-header">
                    <h3 style="margin: 0;">Danh sách khách hàng</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="listCustomerAjax"></tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="listServiceModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 700px;">
                <div class="modal-header">
                    <h3 style="margin: 0;">Danh sách dịch vụ</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên dịch vụ</th>
                                <th scope="col">Chi phí</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="listServiceAjax"></tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="listEmployeeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 700px;">
                <div class="modal-header">
                    <h3 style="margin: 0;">Danh sách nhân viên</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Số điện thoại</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="listEmployeeAjax"></tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('select').on('change', function() {
            $("#status").val(this.value);
        });
            
            let valStatus =$("#status").val();
            $('#selectStatus option[value='+valStatus+']').attr('selected','selected');

            if ($("#id").val() == '') {
                $("#btn_save").html("Thêm mới");
            } else {
               
                $("#btn_save").html("Cập nhật");
            }
        });
        $("#btn_save").click(function(e) {
            e.preventDefault();

            var form = $("#form_task");
            $.ajax({
                type: "POST",
                url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/save-task.php") ?>",
                data: form.serialize(), // serializes the form's elements.

                success: function(data) {
                    console.log(data)
                    $('#modelSuccess').modal('show');
                },
                error: function(data) {
                    console.log(data)
                    $('#modelFail').modal('show');
                }
            });
        });

        function showCustomerList() {
            $.ajax({
                type: "GET",
                url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/get-customer.php") ?>",

                success: function(data) {
                    $('#listCustomerAjax').parent().append(data)
                },
                error: function(data) {
                    console.log("Error = " + data)
                }
            });
            $('#listCustomerModal').modal('show');

        }

        function getCustomer(id, name, phone, address) {
            $('#id_cus').val(id);
            $('#name_cus').val(name);
            $('#phone_cus').val(phone);
            $('#address_cus').val(address);
            $('#listCustomerModal').modal('hide');
        }

        function showServiceList() {
            $.ajax({
                type: "GET",
                url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/get-service.php") ?>",

                success: function(data) {
                    $('#listServiceAjax').parent().append(data)
                },
                error: function(data) {
                    console.log("Error = " + data)
                }
            });
            $('#listServiceModal').modal('show');

        }

        function getService(id, title, price) {
            $('#id_service').val(id);
            $('#title_service').val(title);
            $('#price_service').val(price);
            $('#listServiceModal').modal('hide');
        }

        function showEmployeeList() {
            $.ajax({
                type: "GET",
                url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/get-employee.php") ?>",

                success: function(data) {
                    $('#listEmployeeAjax').parent().append(data)
                },
                error: function(data) {
                    console.log("Error = " + data)
                }
            });
            $('#listEmployeeModal').modal('show');

        }

        function getEmployee(id, name, phone) {
            $('#id_emp').val(id);
            $('#name_emp').val(name);
            $('#phone_emp').val(phone);
            $('#listEmployeeModal').modal('hide');
        }
    </script>
</div>