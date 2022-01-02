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
  <h1>Thông tin cá nhân kĩ thuật viên</h1>
  <?php while ($rowEmployee = mysqli_fetch_array($data['employee'])) { ?>
    <form id="form-recruit">
      <div class="form-group">
        <input type="hidden" class="form-control" value="<?php echo ($rowEmployee['id']) ?>" id="id" name="id" />
      </div>
      <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" class="form-control" value="<?php echo ($rowEmployee['name']) ?>" id="name" aria-describedby="emailHelp" placeholder="Nhập tên của bạn" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Date</label>
        <input type="date" class="form-control" value="<?php echo (substr($rowEmployee['mod_time'], 0, 10)) ?>" id="date" placeholder="Chọn ngày sinh của bạn" name="birthday" required />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="<?php echo ($rowEmployee['email']) ?>" id="email" placeholder="Nhập email của bạn" name="email" required />
      </div>
      <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="phone" class="form-control" value="<?php echo ($rowEmployee['phone']) ?>" id="phone" placeholder="Nhập số điện thoại của bạn" name="phone" required />
      </div>
      <div class="form-group">
        <label for="province">Chọn tỉnh hiện tại</label>
        <select class="form-control" value="<?php echo ($rowEmployee['province']) ?>" name="province" id="province" required>
        </select>
      </div>
      <div class="form-group">
        <label for="district">Chọn quận, huyện hiện tại</label>
        <select class="form-control" value="<?php echo ($rowEmployee['district']) ?>" name="district" id="district" required>
        </select>
      </div>
      <div class="form-group">
        <label for="academic-level">Trình độ học vấn</label>
        <select class="form-control" name="academic-level" id="academic-level" required>
          <option value="0" <?php echo ($rowEmployee['academic_level'] == 0 ? "selected" : "") ?>>Tiểu học</option>
          <option value="1" <?php echo ($rowEmployee['academic_level'] == 1 ? "selected" : "") ?>>THCS</option>
          <option value="2" <?php echo ($rowEmployee['academic_level'] == 2 ? "selected" : "") ?>>THPT</option>
          <option value="3" <?php echo ($rowEmployee['academic_level'] == 3 ? "selected" : "") ?>>Đại học</option>
        </select>
      </div>
      <div class="form-group">
        <label for="fields">Lĩnh vực bạn biết</label>
        <input type="text" class="form-control" value="<?php echo ($rowEmployee['fields']) ?>" id="fields" placeholder="Nhập lĩnh vực bạn biết" name="fields" />
      </div>
      <div class="form-group">
        <label for="fields">Chọn thời gian bạn có thể làm việc</label>
        <br />
        <table class="table__worktime">
          <tbody>
            <tr>
              <td>
                <input id="wt-0" type="checkbox" class="work-time" value="0">
                <label for="wt-0"> Sáng thứ 2</label><br>
              </td>
              <td>
                <input id="wt-3" type="checkbox" class="work-time" value="3">
                <label for="wt-3"> Sáng thứ 3</label><br>
              </td>
              <td>
                <input id="wt-6" type="checkbox" class="work-time" value="6">
                <label for="wt-6"> Sáng thứ 4</label><br>
              </td>
              <td>
                <input id="wt-9" type="checkbox" class="work-time" value="9">
                <label for="wt-9"> Sáng thứ 5</label><br>
              </td>
              <td>
                <input id="wt-12" type="checkbox" class="work-time" value="12">
                <label for="wt-12"> Sáng thứ 6</label><br>
              </td>
              <td>
                <input id="wt-15" type="checkbox" class="work-time" value="15">
                <label for="wt-15"> Sáng thứ 7</label><br>
              </td>
              <td>
                <input id="wt-18" type="checkbox" class="work-time" value="18">
                <label for="wt-18"> Sáng chủ nhật</label><br>
              </td>
            </tr>
            <tr>
              <td>
                <input id="wt-1" type="checkbox" class="work-time" value="1">
                <label for="wt-1"> Chiều thứ 2</label><br>
              </td>
              <td>
                <input id="wt-4" type="checkbox" class="work-time" value="4">
                <label for="wt-4"> Chiều thứ 3</label><br>
              </td>
              <td>
                <input id="wt-7" type="checkbox" class="work-time" value="7">
                <label for="wt-7"> Chiều thứ 4</label><br>
              </td>
              <td>
                <input id="wt-10" type="checkbox" class="work-time" value="10">
                <label for="wt-10"> Chiều thứ 5</label><br>
              </td>
              <td>
                <input id="wt-13" type="checkbox" class="work-time" value="13">
                <label for="wt-13"> Chiều thứ 6</label><br>
              </td>
              <td>
                <input id="wt-16" type="checkbox" class="work-time" value="16">
                <label for="wt-16"> Chiều thứ 7</label><br>
              </td>
              <td>
                <input id="wt-19" type="checkbox" class="work-time" value="19">
                <label for="wt-19"> Chiều chủ nhật</label><br>
              </td>
            </tr>
            <tr>
              <td>
                <input id="wt-2" type="checkbox" class="work-time" value="2">
                <label for="wt-2"> Tối thứ 2</label><br>
              </td>
              <td>
                <input id="wt-5" type="checkbox" class="work-time" value="5">
                <label for="wt-5"> Tối thứ 3</label><br>
              </td>
              <td>
                <input id="wt-8" type="checkbox" class="work-time" value="8">
                <label for="wt-8"> Tối thứ 4</label><br>
              </td>
              <td>
                <input id="wt-11" type="checkbox" class="work-time" value="11">
                <label for="wt-11"> Tối thứ 5</label><br>
              </td>
              <td>
                <input id="wt-14" type="checkbox" class="work-time" value="14">
                <label for="wt-14"> Tối thứ 6</label><br>
              </td>
              <td>
                <input id="wt-17" type="checkbox" class="work-time" value="17">
                <label for="wt-17"> Tối thứ 7</label><br>
              </td>
              <td>
                <input id="wt-20" type="checkbox" class="work-time" value="20">
                <label for="wt-20"> Tối chủ nhật</label><br>
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" class="form-control" id="work-time" name="work-time" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="form-group">
        <label for="status">Trạng thái</label>
        <select class="form-control" name="status" id="status" required>
          <option value="0" <?php echo ($rowEmployee['status'] == 0 ? "selected" : "") ?>>Xin việc</option>
          <option value="1" <?php echo ($rowEmployee['status'] == 1 ? "selected" : "") ?>>Bị loại</option>
          <option value="2" <?php echo ($rowEmployee['status'] == 2 ? "selected" : "") ?>>Làm việc</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Hoàn tất</button>
    </form>
    <script>
      const province = document.getElementById("province");
      const district = document.getElementById("district");
      const workTimeItems = document.getElementsByClassName("work-time");
      const provinceSelected = "<?php echo ($rowEmployee['province']); ?>";
      const districtSelected = "<?php echo ($rowEmployee['district']); ?>";
      var workTimeStr = "<?php echo ($rowEmployee['work_time']); ?>";

      $(document).ready(function() {
        $.ajax({
          type: "GET",
          dataType: "json",
          url: "https://provinces.open-api.vn/api/?depth=2",
          success: function(data) {
            data.forEach((item, index) => {
              var opt = document.createElement('option');
              opt.value = index;
              opt.selected = index == provinceSelected;
              opt.innerHTML = item.name;
              province.appendChild(opt);
            });

            district.innerHTML = null;

            data[0].districts.forEach((item, index) => {
              var opt = document.createElement('option');
              opt.value = index;
              opt.selected = index == districtSelected;
              opt.innerHTML = item.name;
              district.appendChild(opt);
            });

            $("#province").change(() => {
              district.innerHTML = null;
              data[province.value].districts.forEach((item, index) => {
                var opt = document.createElement('option');
                opt.value = index;
                opt.innerHTML = item.name;
                district.appendChild(opt);
              });
            });
          }
        });
      });

      for (var i = workTimeItems.length - 1; i >= 0; i--) {
        if (workTimeStr - Math.pow(2, i) >= 0) {
          workTimeStr = workTimeStr - Math.pow(2, i);
          workTimeItems[i].checked = true;
        }
      }
    </script>
  <?php } ?>
  <h1>Danh sách dịch vụ được thuê</h1>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Tên dịch vụ</th>
        <th scope="col">Giá dịch vụ</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Thời gian</th>
      </tr>
    </thead>
    <tbody id="tbody">
      <?php while($rowOrder = mysqli_fetch_array($data['orders'])) {?>
      <tr>
        <td><?php echo($rowOrder['id']); ?></td>
        <td><?php echo($rowOrder['phone']); ?></td>
        <td><?php echo($rowOrder['title']); ?></td>
        <td><?php echo($rowOrder['price']); ?></td>
        <td><?php echo($rowOrder['is_success'] == 1 ? "Thành công" : "Thất bại"); ?></td>
        <td><?php echo($rowOrder['mod_time']); ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script>
  // this is the id of the form
  $("#form-recruit").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $("#form-recruit");

    const workTimes = document.getElementsByClassName("work-time");
    let valueWorkTimes = 0;

    for (var i = workTimes.length - 1 ; i >= 0 ; i --) {
      valueWorkTimes += Math.pow(2, workTimes[i].value) * workTimes[i].checked;
    }

    document.getElementById('work-time').value = valueWorkTimes;

    $.ajax({
      type: "POST",
      url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/update-employee.php") ?>",
      data: form.serialize(), // serializes the form's elements.
      success: function(data) {
        var dataJson = JSON.parse(data);
        if (dataJson.success) {
          $('#modelSuccess').modal('show');
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        } else $('#modelFail').modal('show');
      }
    });
  });
</script>