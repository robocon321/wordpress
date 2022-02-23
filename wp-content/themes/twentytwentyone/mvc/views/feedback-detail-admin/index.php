<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gởi phản hồi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-send-email">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" disabled id="email-response" name="email">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Nội dung:</label>
            <textarea class="form-control" id="content-response" name="content"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Gởi phản hồi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php while ($row = mysqli_fetch_array($data['feedback'])) { ?>
<div class="container">
  <h1>Thông tin Feedback</h1>
    <div id="form-feedback">
      <div class="form-group">
        <label for="name">Họ và tên</label>
        <div style="background-color: white; padding: 10px"><?php echo($row['name'])?></div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <div style="background-color: white; padding: 10px"><?php echo($row['email'])?></div>
      </div>
      <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <div style="background-color: white; padding: 10px"><?php echo($row['phone'])?></div>
      </div>
      <div class="form-group">
        <label for="content">Nội dung</label>
        <div id="content" style="background-color: white; padding: 10px"><?php echo($row['content'])?></div>
      </div>
      <div class="form-group">
        <label for="cre_date">Ngày Feedback</label>
        <div id="content" style="background-color: white; padding: 10px"><?php echo($row['cre_time'])?></div>
      </div>
      <div class="form-group">
        <label for="status">Trạng thái</label>
        <div id="status" style="background-color: white; padding: 10px">
          <?php 
              if($row['status'] == 0) echo("Chưa xem");
              else echo("Đã xem");
          ?>
        </div>
      </div>
    </div>
    <div style="text-align: right">
      <a href="#" class="btn btn-primary <?php if(!isset($row['email']) || strlen($row['email']) == 0) echo('disabled')?>"  data-toggle="modal" data-target="#exampleModal">Phản hồi</a>
      <a href="#" data-status="<?php echo($row['status']) ?>" id="btnStatus" class="btn btn-success"><?php if($row['status']) echo('Đánh dấu chưa xem'); else echo("Đánh dấu đã xem");?></a>
    </div>

    <form id="form-status">
      <input type="hidden" value="<?php echo($row['id']); ?>" name="id"/>
      <input type="hidden" value="<?php echo($row['status']); ?>" name="status"/>
    </form>
</div>

<script>
  const form = $("#form-status");
  const btnStatus = document.getElementById("btnStatus");
  const showStatus = document.getElementById("status");

  btnStatus.addEventListener('click', () => {
    $.ajax({
    type: "POST",
    url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/update-feedback.php") ?>",
    data: form.serialize(), // serializes the form's elements.
    success: function(data) {
      var dataJson = JSON.parse(data);
      if (dataJson.success) {
        if(btnStatus.getAttribute('data-status') == 0) {
          btnStatus.setAttribute('data-status', 1);
          btnStatus.textContent = 'Đánh dấu chưa xem';
          showStatus.textContent = 'Đã xem';
        } else {
          btnStatus.setAttribute('data-status', 0);
          btnStatus.textContent = 'Đánh dấu đã xem';
          showStatus.textContent = 'Chưa xem';
        }
      }
    }});
  });
</script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script>
  const emailResponse = document.getElementById("email-response");
  const contentResponse = document.getElementById("content-response");
  const formSendEmail = document.getElementById("form-send-email");

  emailResponse.value = '<?php echo($row["email"]) ?>';
  $("#form-send-email").submit((e) => {
    e.preventDefault();
    Email.send({
      SecureToken : "bc5953f3-ed67-4247-acf0-146f669f93ac",
      To : 'robocon321n@gmail.com',
      From : "robocon321d@gmail.com",
      Subject : "Phản hồi từ SaigonComputer",
      Body : contentResponse.value
    }).then(
      message => alert(message)
    );
  });

</script>
<?php } ?>
