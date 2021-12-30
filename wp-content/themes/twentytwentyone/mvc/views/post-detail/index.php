<?php 
function getChildrenComments($arr, $id, $name) {
    for ($i = 0; $i < count($arr); $i++) {
        if($arr[$i]['comment_parent'] === $id) {
?>
<div class="media ml-5">
    <a class="media-left" href="#">
    <img src="<?php echo($arr[$i]['comment_author_avatar']); ?>" alt="Not found" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo($arr[$i]['comment_author']); ?><small><?php echo(date_format(date_create($arr[$i]['comment_date']),"d F Y")) ?></small></h4>
        <p><small><?php echo($name); ?></small> <?php echo($arr[$i]['comment_content']); ?></p>
        <a href="#focus-comment" class="btn btn-primary btn-sm" onclick="reply(<?php echo($arr[$i]['comment_ID']); ?>);">Trả lời</a>
    </div>
</div>
<?php
    getChildrenComments($arr, $arr[$i]['comment_ID'], $arr[$i]['comment_author']);                         
        };
    }
}?>

<?php $row = mysqli_fetch_array($data['post']) ?>
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

<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                            <li class="breadcrumb-item active"><?php echo($row['post_title']);?></li>
                        </ol>

                        <span class="color-orange"><a href="#" title=""><?php echo($row['name']);?></a></span>

                        <h3><?php echo($row['post_title']);?></h3>

                        <div class="blog-meta big-meta">
                            <small><a href="#" title=""><?php echo(date_format(date_create($row['post_modified']),"d F Y")) ?></a></small>
                            <small><a href="#" title="">by <?php echo($row['user_nicename']) ?></a></small>
                            <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo($row['view_count']) ?></a></small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="<?php echo(get_template_directory_uri().'/upload/tech_menu_08.jpg'); ?>" alt="" class="img-fluid">
                    </div><!-- end media -->

                    <div class="blog-content">  
                        <?php echo($row['post_content']) ?>
                    </div><!-- end content -->

                    <div class="blog-title-area">
                        <div class="tag-cloud-single">
                            <span>Thẻ</span>
                            <?php while($tag = mysqli_fetch_array($data['tags'])) { ?>
                                <small><a href="#" title=""><?php echo($tag['meta_value']);?></a></small>
                            <?php } ?>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                <img src="<?php echo(get_template_directory_uri().'/upload/banner_01.jpg'); ?>" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis1">


                    <div class="custombox authorbox clearfix">
                        <h4 class="small-title">Về tác giả</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <img src="<?php echo(get_template_directory_uri().'/upload/author.jpg'); ?>" alt="" class="img-fluid rounded-circle"> 
                            </div><!-- end col -->

                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <h4><a href="#"><?php echo($row['user_nicename']); ?></a></h4>
                                <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                <div class="topsocial">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                </div><!-- end social -->

                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">Có lẽ bạn sẽ thích</h4>
                        <div class="row">
                            <?php 
                                while($rowPost = mysqli_fetch_array($data['post-popular'])) {
                            ?>
                            <div class="col-lg-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="/wordpress/posts?id=<?php echo($rowPost[0])?>" title="">
                                        <img src="<?php echo(get_template_directory_uri().'/upload/tech_menu_04.jpg'); ?>" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="/wordpress/posts?id=<?php echo($rowPost[0])?>" title=""><?php echo($rowPost['post_title']); ?></a></h4>
                                        <small><a href="#" title=""><?php echo($rowPost['name']) ?></a></small>
                                        <small><a href="#" title=""><?php echo(date_format(date_create($rowPost['post_modified']),"d F Y")); ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                            <?php } ?>
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title"><?php echo($data['comments'] -> num_rows);?> Bình luận</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    <?php 
                                        while($rowComment = mysqli_fetch_array($data['comments']))
                                        {
                                            $resultSet[] = $rowComment;
                                        }
                                    ?>

                                    <?php 
                                        if(isset($resultSet)) {           
                                        for ($i = 0; $i < count($resultSet); $i++) {
                                            if($resultSet[$i]['comment_parent']) continue;
                                    ?>
                                    <div class="media">
                                        <a class="media-left" href="#">
                                        <img src="<?php echo($resultSet[$i]['comment_author_avatar']); ?>" alt="Not found" class="rounded-circle">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading user_name"><?php echo($resultSet[$i]['comment_author']); ?><small><?php echo(date_format(date_create($resultSet[$i]['comment_date']),"d F Y")) ?></small></h4>
                                            <p><?php echo($resultSet[$i]['comment_content']); ?></p>
                                            <a href="#focus-comment" class="btn btn-primary btn-sm" onclick="reply(<?php echo($resultSet[$i]['comment_ID'])?>);">Trả lời</a>
                                        </div>
                                    </div>
                                    <?php 
                                    getChildrenComments($resultSet, $resultSet[$i]['comment_ID'], $resultSet[$i]['comment_author']);
                                }} ?>
                                <div id="focus-comment"></div>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">Bình luận</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" id="commentForm">
                                    <input type="hidden" class="form-control" id="email" name="email" />
                                    <input type="hidden" class="form-control" id="avatar" name="avatar" />
                                    <input type="hidden" class="form-control" id="comment-parent" name="comment-parent" value="0" />
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($_GET['id']); ?>"/>
                                    <input type="hidden" class="form-control" id="name" name="name" required>
                                    <textarea class="form-control" placeholder="Nhập nội bình luận" name="content" required></textarea>
                                    <div id="submitComment" class="g-signin2" data-onsuccess="onSignIn">Submit form</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2>Tìm kiếm</h2>
                        <form class="search">
                            <input type="text" class="input__search"/>
                        </form>
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Thủ thuật máy tính</h2>
                        <div class="trend-videos">
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="https://www.youtube.com/watch?v=Fl5nEO7Pk8o" title="Cài windows 10">
                                        <iframe src="https://www.youtube.com/embed/Fl5nEO7Pk8o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                                                
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta">
                                    <h4><a href="tech-single.html" title="">Hướng dẫn cài windows 10</a></h4>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="https://www.youtube.com/watch?v=Fl5nEO7Pk8o" title="Cài Office 365">
                                        <iframe src="https://www.youtube.com/embed/vCm4yG9oXlE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                                            
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta">
                                    <h4><a href="tech-single.html" title="">Hướng dẫn cài Office 365 bản quyền</a></h4>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="https://www.youtube.com/watch?v=Fl5nEO7Pk8o" title="Mua Office bản quyền">
                                        <iframe src="https://www.youtube.com/embed/DhWps-M_z6o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta">
                                    <h4><a href="tech-single.html" title="">Lưu ý khi mua Office 365 bản quyền</a></h4>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                        </div><!-- end videos -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Diễn đàn nổi bật</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                            <?php 
                                while($data['forums_popular'] && $row = mysqli_fetch_array($data['forums_popular'])) {
                            ?>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo($row['title'])?></h5>                                                
                                        <small><?php echo(date_format(date_create($row['mod_time']),"d F Y")); ?> </small>
                                        <small><i class="fa fa-eye"></i> <?php echo($row['view_count']) ?> </small>
                                    </div>
                                </a>
                            <?php } ?>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Follow Us</h2>

                        <div class="row text-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button facebook-button">
                                    <i class="fa fa-facebook"></i>
                                    <p>27k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button twitter-button">
                                    <i class="fa fa-twitter"></i>
                                    <p>98k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button google-button">
                                    <i class="fa fa-google-plus"></i>
                                    <p>17k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                    <p>22k</p>
                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->

                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<script>
    const form = document.getElementById("commentForm");
    function onSignIn(googleUser) {
        if (form.checkValidity()) {
            document.getElementById("email").value = googleUser.su.ev;
            document.getElementById("avatar").value = googleUser.su.SM;
            document.getElementById("name").value = googleUser.su.qf;
            $.ajax({
                type: "POST",
                url: "<?php echo(get_template_directory_uri()."/mvc/ajax/comment.php") ?>",
                data: $(form).serialize(), // serializes the form's elements.
                success: function(data)
                {
                    if(data) {
                        $('#modelSuccess').modal('show');
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                    else $('#modelFail').modal('show');
                }
            });

        } else {
            form.reportValidity();
        }
    }
</script>

<script>
    const nameElement = document.getElementById("name");
    const commentParentElement = document.getElementById("comment-parent");
    function reply(a) {
        nameElement.focus();
        commentParentElement.value = a;
    }
</script>
