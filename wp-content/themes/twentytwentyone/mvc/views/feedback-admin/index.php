<?php 
    $params = '?1';
    $params = $params.'&page='.$_GET['page'];
    if(isset($_GET['sort'])) $params = $params.'&sort='.$_GET['sort'];
    if(isset($_GET['search'])) $params = '&search='.$_GET['search'];
    if(!isset($_GET['pg']) || $_GET['pg'] < 2) $page = 2;
    else $page = $_GET['pg'];
?>
<div id="wpbody-content">
  <div class="wrap">
    <h1 class="wp-heading-inline"> Feedback</h1>

    <hr class="wp-header-end">

    <form id="posts-filter" method="get">
      <div class="tablenav top">

        <div class="alignleft">
          <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Search Feedbacks:</label>
            <input type="search" id="post-search-input" name="search" value="<?php echo(isset($_GET['search']) ? $_GET['search'] : '');?>">
            <input type="hidden" name="page" value="<?php echo($_GET['page']);?>" />
            <input type="submit" id="search-submit" class="button" value="Search feedbacks">
          </p>
        </div>
        <h2 class="screen-reader-text">Feedbacks list navigation</h2>
        <div class="tablenav-pages"><span class="displaying-num"><?php echo($data['total-feedback'])?> items</span>
            <a class="first-page button" href="<?php echo($params);?>&pg=1"><span class="screen-reader-text">First page</span><span aria-hidden="true">«</span></a>
            <a class="previous-page button" href="<?php echo($params);?>&pg=<?php echo($page - 1)?>"><span class="screen-reader-text">Previous page</span><span aria-hidden="true">‹</span></a></span>
            <span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" type="number" min="1" max="<?php echo($data['total-page']) ?>" id="current-page-selector" name="pg" value="<?php echo(isset($_GET['pg']) ? $_GET['pg'] : 1);?>" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages"><?php echo($data['total-page'])?></span></span></span>
            <a class="next-page button" href="<?php echo($params);?>&pg=<?php echo($data['total-page'] == 1 ? 1 : ((isset($_GET['pg']) && $_GET['pg'] == 1) || !isset($_GET['pg']) ? 2  : $page + 1)) ?>"><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
            <a class="last-page button" href="<?php echo($params);?>&pg=<?php echo($data['total-page'])?>"><span class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span>
        </div>
        <br class="clear">
      </div>
      <h2 class="screen-reader-text">Feedbacks list</h2>
      <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
          <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'name' ? 'asc' : 'desc')?>"><a href="?page=feedbacks&sort=name"><span>Họ tên</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="email" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'email' ? 'asc' : 'desc')?>"><a href="?page=feedbacks&sort=email"><span>Email</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="phone" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'phone' ? 'asc' : 'desc')?>"><a href="?page=feedbacks&sort=phone"><span>Phone</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="address" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'province' ? 'asc' : 'desc')?>"><a href="?page=feedbacks&sort=status"><span>Trạng thái</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="status" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'status' ? 'asc' : 'desc')?>"><a href="?page=feedbacks&sort=cre_time"><span>Thời gian</span><span class="sorting-indicator"></span></a></th>
          </tr>
        </thead>

        <tbody id="the-list">
        <?php 
            while($row = mysqli_fetch_array($data['feedbacks'])) {
        ?>

          <tr class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry">
            <td class="column-primary">
              <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
              <strong><a href="http://localhost/wordpress/wp-admin/admin.php?page=feedbacks&id=<?php echo($row['id'])?>"><?php echo($row['name'])?></a></strong>
              <div class="row-actions"><span class="edit"><a href="http://localhost/wordpress/wp-admin/admin.php?page=feedbacks&id=<?php echo($row['id'])?>" aria-label="Edit “Hello world!”">Edit</a> | </span><span class="trash"><a href="http://localhost/wordpress/wp-admin/post.php?post=1&amp;action=trash&amp;_wpnonce=1179e24bfc" class="submitdelete" aria-label="Move “Hello world!” to the Trash">Trash</a> </span></div><button type="button" class="toggle-row"></button>
            </td>
            <td><a href="edit.php?post_type=post&amp;author=1"><?php echo($row['email'])?></a></td>
            <td><span aria-hidden="true"><?php echo($row['phone'])?></span></td>
            <td><span class="status" aria-hidden="true">
            <?php 
              if($row['status'] == 0) echo("<span style='color: brown'>Chưa xem</span>");
              else echo("<span style='color: red'>Đã xem</span>");
            ?>
            </span></td>
            <td><span class="cre-time" aria-hidden="true"><?php echo($row['cre_time'])?></span></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </form>

    <div id="ajax-response"></div>
    <div class="clear"></div>
  </div>


  <div class="clear"></div>
</div>

<script>


</script>