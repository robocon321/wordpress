<?php 
    $params = '?';
    if(isset($_GET['sort'])) $params = $params.'sort='.$_GET['sort'];
    if(isset($_GET['search'])) $params = '&search='.$_GET['search'];
    if(!isset($_GET['pg']) || $_GET['pg'] < 2) $page = 2;
    else $page = $_GET['pg'];
?>
<section>
    <div class="container">
        <form id="sortForm">
            <label for="posts">Sắp xếp theo: </label>
            <select id="posts" name="sort" onchange="javascript:this.form.submit()">
                <option value="view_count" >Lượt xem</option>
                <option value="post_date" <?php echo(isset($_GET['sort']) && $_GET['sort'] === 'post_date' ? 'selected' : '') ?>>Ngày phát hành</option>
                <option value="post_title" <?php echo(isset($_GET['sort']) && $_GET['sort'] === 'post_title' ? 'selected' : '') ?>>Tên tiêu đề</option>
                <!-- <option value="comment_count">Nổi bật</option> -->
            </select>
        </form>
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                    <?php 
                        while($data['posts_filter'] && $row = mysqli_fetch_array($data['posts_filter'])) {
                    ?>
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="?id=<?php echo($row['ID'])?>" title="">
                                        <img src="<?php echo(get_template_directory_uri().'/upload/tech_blog_01.jpg'); ?>" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="?id=<?php echo($row[0])?>" title=""><?php echo($row['post_title'])?></a></h4>
                                <p><?php 
                                    $str = $row['post_content'];
                                    $str = preg_replace('/<\w*>/', ' ', $str);
                                    $str = preg_replace('/<\/\w{1,8}$/', ' ', $str);
                                    $str = preg_replace('/<\/\w*>/', ' ', $str);
                                    $str = trim($str);
                                    echo($str);
                                ?></p>
                                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title=""><?php echo($row['name']) ?></a></small>
                                <small><a href="?id=<?php echo($row[0])?>" title=""><?php echo(date_format(date_create($row['post_modified']),"d F Y")); ?> </a></small>
                                <small><a href="#" title="">by <?php echo($row['user_nicename']) ?></a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo($row['view_count']) ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                    <?php }?>         
                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item">
                                        <a class="page-link" href="<?php 
                                            echo($params.'&pg='.(--$page));
                                        ?>">
                                            <?php echo($page); ?>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php 
                                            echo($params.'&pg='.(++$page));
                                        ?>">
                                            <?php echo($page) ?>                                        
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="<?php 
                                            echo($params.'&pg='.(++$page));
                                        ?>">
                                            <?php echo($page); ?>                                        
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->

                    </div><!-- end blog-list -->
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