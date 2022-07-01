<div class="modal fade bd-example-modal-sm" id="modelSuccess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content d-flex flex-row align-items-center p-4">
        <img class="mr-1" src="<?php echo(get_template_directory_uri().'/upload/yes-icon.png'); ?>" style="width: 50px; height:50px" alt="Not found" /> <h1 class="m-0" style="display: inline-block;">Thành công</h1>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-sm" id="modelFail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content d-flex flex-row align-items-center p-4">
     <img class="mr-1" src="<?php echo(get_template_directory_uri().'/upload/close-icon.png'); ?>" style="width: 50px; height:50px" alt="Not found" /> <h1 class="m-0" style="display: inline-block;">Thất bại</h1>
    </div>
  </div>
</div>

<div class="container">
<form id="form-recruit">
  <div class="form-group">
    <label for="name">Tên</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nhập tên của bạn" name="name" required >
  </div>
  <div class="form-group">
    <label for="email">Date</label>
    <input type="date" class="form-control" id="date" placeholder="Chọn ngày sinh của bạn" name="birthday" required />
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" name="email" required />
  </div>
  <div class="form-group">
    <label for="phone">Số điện thoại</label>
    <input type="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại của bạn" name="phone" required />
  </div>
  <div class="form-group">
    <label for="province">Chọn tỉnh hiện tại</label>
    <select class="form-control" name="province" id="province" required>
    </select>
  </div>
  <div class="form-group">
    <label for="district">Chọn quận, huyện hiện tại</label>
    <select class="form-control" name="district" id="district" required>
    </select>
  </div>
  <div class="form-group">
    <label for="academic-level">Trình độ học vấn</label>
    <select class="form-control" name="academic-level" id="academic-level" required>
      <option value="0">Tiểu học</option>
      <option value="1">THCS</option>
      <option value="2">THPT</option>
      <option value="3">Đại học</option>
    </select>
  </div>
  <div class="form-group">
    <label for="fields">Lĩnh vực bạn biết</label>
    <input type="text" class="form-control" id="fields" placeholder="Nhập lĩnh vực bạn biết" name="fields" />
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
            <input id="wt-3" type="checkbox" class="work-time" value="1">
            <label for="wt-3"> Sáng thứ 3</label><br>
          </td>
          <td>
            <input id="wt-6" type="checkbox" class="work-time" value="2">
            <label for="wt-6"> Sáng thứ 4</label><br>
          </td>
          <td>
            <input id="wt-9" type="checkbox" class="work-time" value="3">
            <label for="wt-9"> Sáng thứ 5</label><br>
          </td>
          <td>
            <input id="wt-12" type="checkbox" class="work-time" value="4">
            <label for="wt-12"> Sáng thứ 6</label><br>
          </td>
          <td>
            <input id="wt-15" type="checkbox" class="work-time" value="5">
            <label for="wt-15"> Sáng thứ 7</label><br>
          </td>
          <td>
            <input id="wt-18" type="checkbox" class="work-time" value="6">
            <label for="wt-18"> Sáng chủ nhật</label><br>
          </td>
        </tr>
        <tr>
          <td>
            <input id="wt-1" type="checkbox" class="work-time" value="7">
            <label for="wt-1"> Chiều thứ 2</label><br>
          </td>
          <td>
            <input id="wt-4" type="checkbox" class="work-time" value="8">
            <label for="wt-4"> Chiều thứ 3</label><br>
          </td>
          <td>
            <input id="wt-7" type="checkbox" class="work-time" value="9">
            <label for="wt-7"> Chiều thứ 4</label><br>
          </td>
          <td>
            <input id="wt-10" type="checkbox" class="work-time" value="10">
            <label for="wt-10"> Chiều thứ 5</label><br>
          </td>
          <td>
            <input id="wt-13" type="checkbox" class="work-time" value="11">
            <label for="wt-13"> Chiều thứ 6</label><br>
          </td>
          <td>
            <input id="wt-16" type="checkbox" class="work-time" value="12">
            <label for="wt-16"> Chiều thứ 7</label><br>
          </td>
          <td>
            <input id="wt-19" type="checkbox" class="work-time" value="13">
            <label for="wt-19"> Chiều chủ nhật</label><br>
          </td>
        </tr>
        <tr>
          <td>
            <input id="wt-2" type="checkbox" class="work-time" value="14">
            <label for="wt-2"> Tối thứ 2</label><br>
          </td>
          <td>
            <input id="wt-5" type="checkbox" class="work-time" value="15">
            <label for="wt-5"> Tối thứ 3</label><br>
          </td>
          <td>
            <input id="wt-8" type="checkbox" class="work-time" value="16">
            <label for="wt-8"> Tối thứ 4</label><br>
          </td>
          <td>
            <input id="wt-11" type="checkbox" class="work-time" value="17">
            <label for="wt-11"> Tối thứ 5</label><br>
          </td>
          <td>
            <input id="wt-14" type="checkbox" class="work-time" value="18">
            <label for="wt-14"> Tối thứ 6</label><br>
          </td>
          <td>
            <input id="wt-17" type="checkbox" class="work-time" value="19">
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
  <button type="submit" class="btn btn-primary">Hoàn tất</button>
</form>
</div>

<script>
  const province = document.getElementById("province");
  const district = document.getElementById("district");

  $(document).ready(function(){
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"https://provinces.open-api.vn/api/?depth=2",
        success:function(data)
        {
          data.forEach((item, index) => {
            var opt = document.createElement('option');
            opt.value = index;
            opt.innerHTML = item.name;
            province.appendChild(opt);
          });

          district.innerHTML = null;

          data[0].districts.forEach((item, index) => {
            var opt = document.createElement('option');
            opt.value = index;
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
</script>

<script>
  
// this is the id of the form
$("#form-recruit").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $("#form-recruit");
    
    const workTimes = document.getElementsByClassName("work-time");
    let valueWorkTimes = 0;

    for (let item of workTimes) {
      valueWorkTimes += Math.pow(2, item.value) * item.checked;
    }
    
    document.getElementById('work-time').value = valueWorkTimes;

    $.ajax({
      type: "POST",
      url: "<?php echo(get_template_directory_uri()."/mvc/ajax/recruit.php") ?>",
      data: form.serialize(), // serializes the form's elements.
      success: function(data)
      {
        var dataJson = JSON.parse(data);
        if(dataJson.success) {
            $('#modelSuccess').modal('show');
        }
        else $('#modelFail').modal('show');
      }
    });
});
</script>