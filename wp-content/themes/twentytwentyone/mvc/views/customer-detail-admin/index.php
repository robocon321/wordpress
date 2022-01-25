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
    <h1>Thông tin khách hàng</h1>

    <?php
    $customer = [];
    if (isset($data['customer'])) {
        $customer = $data['customer'];
    }
    ?>
    <form id="form_customer">
        <div class="form-group">
            <input type="hidden" class="form-control" value="<?php echo isset($customer['id']) ? $customer['id'] : "" ?>" id="id" name="customer_id" />
        </div>
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" value="<?php echo  isset($customer['name']) ? $customer['name'] : '' ?>" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="birthday">Date</label>
            <input type="date" class="form-control" value="<?php echo isset($customer['birthday']) ? (substr($customer['birthday'], 0, 10)) : '' ?>" id="birthday" name="birthday" />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="<?php echo  isset($customer['email']) ? $customer['email'] : '' ?>" id="email" name="email" />
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="phone" class="form-control" value="<?php echo isset($customer['phone']) ? $customer['phone'] : '' ?>" id="phone" name="phone" />
        </div>
        <label><b>Địa chỉ:</b></label>
        <div class="form-group">
            <label for="province">Tỉnh/Thành phố</label>
            <select class="form-control" name="province" id="province">
            </select>
        </div>
        <div class="form-group">
            <label for="district">Quận/Huyện</label>
            <select class="form-control" name="district" id="district">
            </select>
        </div>
        <div class="form-group">
            <label for="street">Đường</label>
            <input type="text" class="form-control" value="<?php echo isset($customer['street']) ? $customer['street'] : '' ?>" name="street" id="street" />
        </div>

        <button class="btn btn-primary" id="btn_save">Cập nhật</button>



    </form>
    <script>
        var selectedProvince = "<?php echo isset($customer['district']) ? $customer['district'] : 'null' ?>";
        var selectedDistrict = "<?php echo isset($customer['province']) ? $customer['province'] : 'null' ?>"

        function showDistricts(provinceId) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://provinces.open-api.vn/api/?depth=2",
                success: function(data) {
                    $.each(data[provinceId].districts, function(key, value) {
                        if (key != selectedDistrict) {
                            $("#district").append('<option value = "' + key + '">' + value.name + '</option>');
                        } else {
                            $("#district").append(' <option value = "' + key + '" selected>' + value.name + '</option>');
                        }
                        //console.log(key + ": " + value.name);
                    });
                }
            });
        }

        $(document).ready(function() {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://provinces.open-api.vn/api/?depth=2",
                success: function(data) {
                    if (selectedProvince == -1 || $("#id").val() == '') {
                        $("#province").append('<option value = "" selected ></option>');
                    }
                    $.each(data, function(k, v) {

                        if (k != selectedProvince || selectedProvince == 'null') {
                            $("#province").append('<option value = "' + k + '">' + v.name + '</option>');
                        } else {
                            $("#province").append(' <option value = "' + k + '" selected>' + v.name + '</option>');
                            //console.log(data[k])
                            showDistricts(k);
                        }
                    });
                }
            });
            if ($("#id").val() == '') {
                $("#btn_save").html("Thêm mới");
            } else {
                $("#btn_save").html("Cập nhật");
            }

        });

        $("#province").change(function() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://provinces.open-api.vn/api/?depth=2",
                success: function(data) {
                    selectedProvince = $("#province").val();
                    //selectedDistrict = $("#district").val();
                    selectedDistrict = null;
                    //console.log(selectedProvince)

                    $('#district option').each(function() {
                        $(this).remove();
                    });
                    showDistricts(selectedProvince);
                }
            });
        });

        $("#btn_save").click(function(e) {
            e.preventDefault();

            var form = $("#form_customer");
            $.ajax({
                type: "POST",
                url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/save-customer.php") ?>",
                data: form.serialize(), // serializes the form's elements.

                success: function(data) {
                    $('#modelSuccess').modal('show');
                },
                error: function(data) {
                    $('#modelFail').modal('show');
                }
            });
        });
    </script>
</div>