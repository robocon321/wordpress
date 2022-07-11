<?php while ($row = mysqli_fetch_array($data['service'])) {
  while ($rowAuthor = mysqli_fetch_array($data['author'])) {
    while ($rowOrder = mysqli_fetch_array($data['total-order'])) {
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
          <div class="form-group">
            <input type="hidden" class="form-control" value="" id="id" name="id" />
          </div>
          <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" class="form-control" value="<?php echo ($row['title']) ?>" id="title" aria-describedby="emailHelp" placeholder="Nhập tiêu đề của bạn" name="title" required>
          </div>
          <div class="form-group">
            <label for="author">Tác giả</label>
            <input type="text" class="form-control" value="<?php echo ($rowAuthor['user_nicename']) ?>" disabled required />
          </div>
          <div class="form-group">
            <label for="thumbnail">Ảnh đặc trưng</label>
            <input type="thumbnail" class="form-control" value="<?php echo ($row['thumbnail']) ?>" id="thumbnail" placeholder="Nhập địa chỉ ảnh của bạn" name="thumbnail" required />
          </div>
          <div class="form-group">
            <label for="content">Nội dung</label>
            <input type="content" class="form-control" value="<?php echo ($row['content']) ?>" id="content" name="content" required />
          </div>
          <div class="form-group">
            <label for="price">Giá dịch vụ</label>
            <input type="text" class="form-control" value="<?php echo ($row['price']) ?>" name="price" id="price" required />
          </div>
          <div class="form-group">
            <label for="view-count">Lượt xem</label>
            <input class="form-control" value="<?php echo ($row['view_count']) ?>" id="view-count" required disabled />
          </div>
          <div class="form-group">
            <label for="view-count">Lượt sử dụng dịch vụ</label>
            <input class="form-control" value="<?php echo ($rowOrder['count']) ?>" id="order-count" required disabled />
          </div>

          <button type="submit" class="btn btn-primary">Hoàn tất</button>
        </form>
      </div>
      <script>
        const content = CKEDITOR.replace('content');
        CKEDITOR.instances['content'].setData('<?php echo ($row['content']); ?>');
      </script>

      <script>
        // this is the id of the form
        $("#form-service").submit(function(e) {
          e.preventDefault(); // avoid to execute the actual submit of the form.
          document.getElementById("content").value = content.getData();

          var form = $("#form-service");

          $.ajax({
            type: "POST",
            url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/update-service.php") ?>",
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
              console.log(data);
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
<?php }
  }
} ?>