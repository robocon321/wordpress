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
  <h1>Nhập nội dung câu hỏi</h1>
  <form id="forumForm">
    <input type="hidden" name="email" id="email" />
    <input type="hidden" name="name" id="name" />
    <input type="hidden" name="avatar" id="avatar" />
    <div class="form-group">
      <label for="title">Tiêu đề</label>
      <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề" name="title" />
    </div>
    <div class="form-group">
      <label for="content">Nội dung</label>
      <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <div class="form-group">
      <label for="tag">Tags</label>
      <input type="tag" class="form-control" id="tag" placeholder="Nhập tag, các tag cách nhau bởi dấu ','" name="tags">
    </div>
    <div id="submit" class="g-signin2" data-onsuccess="onSignIn">Submit form</div>
  </form>
</div>

<div class="container">
  <h1>Hiển thị trên trang</h1>
  <div class="row">
    <div class="col-12">
        <div class="page-wrapper">
            <div class="blog-title-area text-center">
                <ol class="breadcrumb hidden-xs-down">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Diễn đàn</a></li>
                    <li class="breadcrumb-item active title-preview">Chưa có tiêu đề</li>
                </ol>

                <h3 class="title-preview">Chưa có tiêu đề</h3>

                <div class="blog-meta big-meta">
                    <small><a href="#" title="" ckass="time-preview">12 DECEMBER 2021</a></small>
                    <small><a href="#" title="">bởi Author</a></small>
                    <small><a href="#" title=""><i class="fa fa-eye"></i> 0</a></small>
                </div><!-- end meta -->

                <div class="post-sharing">
                    <ul class="list-inline">
                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div><!-- end post-sharing -->
            </div><!-- end title -->


            <div class="blog-content content-preview">  
                Chưa có nội dung
            </div><!-- end content -->

            <div class="blog-title-area">
                <div class="tag-cloud-single">
                    <span>Thẻ</span>
                    <div style="display: inline-block" class="tag-preview">
                      <small><a href="#" title="">Chưa có thẻ</a></small>
                    </div>
                </div><!-- end meta -->
            </div><!-- end title -->

            <hr class="invis1">
        </div>
    </div>
  </div>
</div>

<script>
  const content = CKEDITOR.replace( 'content' );
  const titleEle =  document.getElementById("title");
  const tagEle = document.getElementById("tag");

  const titlePreviews = document.getElementsByClassName("title-preview");
  const contentPreviews = document.getElementsByClassName("content-preview");
  const tagPreviews = document.getElementsByClassName("tag-preview");
</script>

<script>

  titleEle.onkeyup = e => {
    for(var i = 0; i < titlePreviews.length; i++) {
      titlePreviews[i].textContent = titleEle.value;
    }
  };

  content.on( 'change', function( evt ) {
    for(var i = 0; i < contentPreviews.length; i++) {
      contentPreviews[i].innerHTML = evt.editor.document.getBody().getHtml();
    }
  });

  tag.onkeyup = e => {
    var tagArr = tag.value.split(",")
                .map(item => item.trim())
                .filter(item => item !== '');
    for(var i = 0; i < tagPreviews.length; i++) {
      var innerHtml = '';
      tagArr.forEach(item => {
        innerHtml += '<small><a href="#" title="">'+item+'</a></small>';
      });
      tagPreviews[i].innerHTML = innerHtml;
    }
  };
</script>

<script>
    const form = document.getElementById("forumForm");
    function onSignIn(googleUser) {
        if (form.checkValidity()) {
            document.getElementById("email").value = googleUser.su.ev;
            document.getElementById("avatar").value = googleUser.su.SM;
            document.getElementById("name").value = googleUser.su.qf;
            document.getElementById("content").value = content.getData();
            $.ajax({
                type: "POST",
                url: "<?php echo(get_template_directory_uri()."/mvc/ajax/forum-question.php") ?>",
                data: $(form).serialize(), // serializes the form's elements.
                success: function(data)
                {
                    if(data) {
                      $('#modelSuccess').modal('show');
                      setTimeout(() => {
                        window.location.replace("http://localhost/wordpress/forums");
                      }, 3000);
                    } else $('#modelFail').modal('show');
                    console.log(data);
                }
            });

        } else {
            form.reportValidity();
        }
    }
</script>
