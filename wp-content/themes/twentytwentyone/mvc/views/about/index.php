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
<h1>Góp ý về website?</h1>
<form id="form-feedback">
  <div class="form-group">
    <label for="name">Tên</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nhập tên của bạn" name="name" required >
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
    <label for="content">Nội dung</label>
    <textarea class="form-control" id="content" name="content"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Hoàn tất</button>
</form>
</div>


<script>
  const content = CKEDITOR.replace( 'content' );
  var form = $("#form-feedback");
  
// this is the id of the form
  $("#form-feedback").submit(function(e) {
      document.getElementById("content").value = content.getData();
      e.preventDefault(); // avoid to execute the actual submit of the form
      $.ajax({
        type: "POST",
        url: "<?php echo(get_template_directory_uri()."/mvc/ajax/feedback.php") ?>",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          var dataJson = JSON.parse(data);
          if(data) {
              $('#modelSuccess').modal('show');
              setTimeout(() => {
                  location.reload();
              }, 2000);
          }
          else $('#modelFail').modal('show');
        }
      });  
    });
</script>