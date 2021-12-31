<?php 
    $params = '?';
    if(isset($_GET['sort'])) $params = $params.'sort='.$_GET['sort'];
    if(isset($_GET['search'])) $params = '&search='.$_GET['search'];
    if(!isset($_GET['pg']) || $_GET['pg'] < 2) $page = 2;
    else $page = $_GET['pg'];
?>
<section>
    <div class="container">
        <form id="form">
          <div class="row my-3">
              <div class="col-12">
                  <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" name="search" placeholder="Bạn muốn tìm kiếm gì?" value="<?php echo($_GET['search'])?>"> <button class="btn btn-primary">Tìm kiếm</button> </div>
              </div>
          </div>
          <input type="hidden" id="inputOptions" name="options" />

            <label for="posts">Sắp xếp theo: </label>
            <select class="mr-5" name="sort" onchange="javascript:this.form.submit()">
                <option value="view_count" >Lượt xem</option>
                <option value="mod_time" <?php echo(isset($_GET['sort']) && $_GET['sort'] === 'mod_time' ? 'selected' : '') ?>>Ngày phát hành</option>
                <option value="title" <?php echo(isset($_GET['sort']) && $_GET['sort'] === 'title' ? 'selected' : '') ?>>Tên tiêu đề</option>
                <!-- <option value="comment_count">Nổi bật</option> -->
            </select>
            <input class="options" type="checkbox" id="posts" value="wp_posts" <?php echo(strpos($_GET['options'], 'wp_posts') > -1 ? 'checked' : '') ?> onclick="changeOptions()" />
            <label class="mr-4" for="posts"> Posts</label>
            <input class="options" type="checkbox" id="forums" value="my_forums" <?php echo(strpos($_GET['options'], 'my_forums') > -1 ? 'checked' : '') ?> onclick="changeOptions()" />
            <label class="mr-4" for="forums"> Forums</label>
            <input class="options" type="checkbox" id="services" value="my_services" <?php echo(strpos($_GET['options'], 'my_services') > -1 ? 'checked' : '') ?> onclick="changeOptions()" />
            <label class="mr-4" for="services"> Services</label>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                    <?php 
                        while($data['search'] && $row = mysqli_fetch_array($data['search'])) {
                    ?>
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="/wordpress/<?php echo($row['type'])?>?id=<?php echo($row['id'])?>" title="">
                                        <img src="<?php echo(get_template_directory_uri().'/upload/tech_blog_01.jpg'); ?>" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="/wordpress/<?php echo($row['type'])?>?id=<?php echo($row['id'])?>" title=""><?php echo($row['title'])?></a></h4>
                                <p><?php 
                                    $str = $row['content'];
                                    $str = preg_replace('/<\w*>/', ' ', $str);
                                    $str = preg_replace('/<\/\w{1,8}$/', ' ', $str);
                                    $str = preg_replace('/<\/\w*>/', ' ', $str);
                                    $str = trim($str);
                                    echo($str);
                                ?></p>
                                <small class="firstsmall"><a class="bg-orange" href="/wordpress/<?php echo($row['type'])?>" title=""><?php echo($row['type']) ?></a></small>
                                <small><a href="?id=<?php echo($row[0])?>" title=""><?php echo(date_format(date_create($row['mod_time']),"d F Y")); ?> </a></small>
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
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<script>
  const inputOptions = document.getElementById('inputOptions');
  const options = document.getElementsByClassName('options');
  
  function changeOptions() {
    var str = '';
    for(var i = 0 ; i < options.length ; i ++) {
      if(options[i].checked) str += options[i].value + '+';
    }
    inputOptions.value = str;
  }

</script>