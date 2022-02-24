<?php while ($row = mysqli_fetch_array($data['forum'])) { ?>
<div class="container">
  <h1>Thông tin Forum</h1>
    <div id="form-forum">
      <div class="form-group">
        <label for="title">Tiêu đề</label>
        <div style="background-color: white; padding: 10px"><?php echo($row['title'])?></div>
      </div>
      <div class="form-group">
        <label for="author_name">Tên tác giả</label>
        <div style="background-color: white; padding: 10px"><?php echo($row['author_name'])?></div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <div id="email" style="background-color: white; padding: 10px"><?php echo($row['email'])?></div>
      </div>
      <div class="form-group">
        <label for="author_avatar">Ảnh đại diện</label>
        <br/>
        <div style="background-color: white; display: inline-block; padding: 10px"><img src="<?php echo($row['author_avatar'])?>" alt="Not found" /></div>
      </div>
      <div class="form-group">
        <label for="content">Nội dung</label>
        <div id="content" style="background-color: white; padding: 10px"><?php echo($row['content'])?></div>
      </div>
      <div class="form-group">
        <label for="view_count">Lượt xem</label>
        <div id="view_count" style="background-color: white; padding: 10px"><?php echo($row['view_count'])?></div>
      </div>
      <div class="form-group">
        <label for="tag">Thẻ</label>
        <div id="tag" style="background-color: white; padding: 10px">
          <?php while($tag = mysqli_fetch_array($data['tags'])) { ?>
              <p style="background-color: #00e5ed; display: inline-block; padding: 4px; border-radius: 4px"><a href="#" style="color: white"><?php echo($tag['meta_value']);?></a></p>
          <?php } ?>        
        </div>
      </div>
    </div>
</div>
<?php } ?>
