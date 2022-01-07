<?php 
  require_once(__DIR__.'/../../core/utils.php'); 
?>

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
    <form id="form-service">
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo(encrypt(get_current_user_id())); ?>" required>
      <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Nhập tiêu đề" name="title" required>
      </div>
      <div class="form-group">
        <label for="price">Ảnh đại diện</label>
        <input type="thumbnail" class="form-control" id="price" placeholder="Chức năng chưa hoàn thiện, vui lòng copy ảnh trên mạng" name="thumbnail" required />
      </div>
      <div class="form-group">
        <label for="content">Nội dung</label>
        <textarea class="form-control" id="content" name="content"></textarea>
      </div>
      <div class="form-group">
        <label for="price">Giá dịch vụ</label>
        <input type="text" class="form-control" id="price" placeholder="Nhập giá dịch vụ" name="price" required />
      </div>
      <button type="submit" class="btn btn-primary">Hoàn tất</button>
    </form>
</div>

<script>
  const content = CKEDITOR.replace( 'content' );
</script>

<script>
  // this is the id of the form
  $("#form-service").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    document.getElementById("content").value = content.getData();

    var form = $("#form-service");

    $.ajax({
      type: "POST",
      url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/new-service.php") ?>",
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