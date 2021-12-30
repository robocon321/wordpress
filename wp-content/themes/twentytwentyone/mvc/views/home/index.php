<section>
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-8 col-sm-12 pr-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo(get_template_directory_uri().'/upload/banner_1.jpg'); ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo(get_template_directory_uri().'/upload/banner_2.png'); ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo(get_template_directory_uri().'/upload/banner_3.jpg'); ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="banner__item">
                    <img src="<?php echo(get_template_directory_uri().'/upload/banner_4.jpg'); ?>" class="d-block w-100" alt="...">
                </div>
                <div class="banner__item">
                    <img src="<?php echo(get_template_directory_uri().'/upload/banner_5.jpg'); ?>" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="masonry-blog clearfix row mx-0">
        <?php 
            while($data['posts_popular'] && $row = mysqli_fetch_array($data['posts_popular'])) {
        ?>
            <div class="col-md-4 p-0">
                <div class="masonry-box post-media">
                        <img src="<?php echo(get_template_directory_uri().'/upload/tech_01.jpg'); ?>" alt="" class="img-fluid">
                        <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="#" title=""><?php echo($row['name']) ?></a></span>
                                <h4><a href="?id=<?php echo($row['ID'])?>" title=""><?php echo($row['post_title']) ?></a></h4>
                                <small><a href="#" title=""><?php echo(date_format(date_create($row['post_modified']),"d F Y")) ?></a></small>
                                <small><a href="#" title="">by <?php echo($row['user_nicename']) ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->

        <?php }?>                
        </div><!-- end masonry -->
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Bài viết mới nhất <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">
                    <?php 
                        while($data['posts_new'] && $row = mysqli_fetch_array($data['posts_new'])) {
                    ?>

                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="#" title="">
                                        <img src="<?php echo(get_template_directory_uri().'/upload/tech_blog_01.jpg'); ?>" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="tech-single.html" title=""><?php echo($row['post_title'])?></a></h4>
                                <p><?php 
                                    $str = $row['post_content'];
                                    $str = preg_replace('/<\w*>/', ' ', $str);
                                    $str = preg_replace('/<\/\w{1,8}$/', ' ', $str);
                                    $str = preg_replace('/<\/\w*>/', ' ', $str);
                                    $str = trim($str);
                                    echo($str);
                                ?></p>
                                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title=""><?php echo($row['name']) ?></a></small>
                                <small><a href="tech-single.html" title=""><?php echo(date_format(date_create($row['post_modified']),"d F Y")); ?> </a></small>
                                <small><a href="tech-author.html" title="">by <?php echo($row['user_nicename']) ?></a></small>
                                <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> <?php echo($row['view_count']) ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                    <?php }?>         


                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="<?php echo(get_template_directory_uri().'/upload/banner_02.jpg'); ?>" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis">


                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Dịch vụ mới nhất <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">
                    <?php 
                        while($data['services_new'] && $row = mysqli_fetch_array($data['services_new'])) {
                    ?>

                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="#" title="">
                                        <img src="<?php echo($row['thumbnail']); ?>" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="tech-single.html" title=""><?php echo($row['title'])?></a></h4>
                                <p><?php 
                                    $str = $row['content'];
                                    $str = preg_replace('/<\w*>/', ' ', $str);
                                    $str = preg_replace('/<\/\w{1,8}$/', ' ', $str);
                                    $str = preg_replace('/<\/\w*>/', ' ', $str);
                                    $str = trim($str);
                                    echo($str);
                                ?></p>
                                <small><a href="tech-single.html" title=""><?php echo(date_format(date_create($row['mod_time']),"d F Y")); ?> </a></small>
                                <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> <?php echo($row['view_count']) ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                    <?php }?>         


                    <hr class="invis">


                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

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
