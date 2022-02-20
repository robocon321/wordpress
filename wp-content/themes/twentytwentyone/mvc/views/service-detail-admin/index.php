<?php print_r($data); ?>
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
  <h1>Thông tin dịch vụ</h1>
    <form id="form-recruit">
      <div class="form-group">
        <input type="hidden" class="form-control" value="" id="id" name="id" />
      </div>
      <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" class="form-control" value="" id="title" aria-describedby="emailHelp" placeholder="Nhập tiêu đề của bạn" name="title" required>
      </div>
      <div class="form-group">
        <label for="author">Tác giả</label>
        <input type="text" class="form-control" value="" disabled required />
      </div>
      <div class="form-group">
        <label for="thumbnail">Ảnh đặc trưng</label>
        <input type="thumbnail" class="form-control" value="" id="thumbnail" placeholder="Nhập địa chỉ ảnh của bạn" name="thumbnail" required />
      </div>
      <div class="form-group">
        <label for="content">Nội dung</label>
        <input type="content" class="form-control" value="" id="content" name="content" required />
      </div>
      <div class="form-group">
        <label for="price">Giá dịch vụ</label>
        <input type="text" class="form-control" value="" name="price" id="price" required />
      </div>
      <div class="form-group">
        <label for="view-count">Lượt xem</label>
        <input class="form-control" value="" name="view-count" id="view-count" required disabled />
      </div>
      <div class="form-group">
        <label for="view-count">Lượt sử dụng dịch vụ</label>
        <input class="form-control" value="" name="view-count" id="view-count" required disabled />
      </div>

      <button type="submit" class="btn btn-primary">Hoàn tất</button>
    </form>
    <script>
      const content = CKEDITOR.replace( 'content' );
    </script>
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