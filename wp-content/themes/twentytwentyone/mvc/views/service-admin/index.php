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
    <h1 class="wp-heading-inline"> Services</h1>

    <a href="?page=services&action=new" class="page-title-action">Add New</a>
    <hr class="wp-header-end">

    <form id="posts-filter" method="get">
      <div class="tablenav top">

        <div class="alignleft">
          <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Search Services:</label>
            <input type="hidden" name="page" value="<?php echo($_GET['page']);?>" />
            <input type="search" id="post-search-input" name="search" value="<?php echo(isset($_GET['search']) ? $_GET['search'] : '');?>">
            <input type="submit" id="search-submit" class="button" value="Search Services">
          </p>
        </div>
        <h2 class="screen-reader-text">Posts list navigation</h2>
        <div class="tablenav-pages"><span class="displaying-num"><?php echo($data['total-service'])?> items</span>
            <a class="first-page button" href="<?php echo($params);?>&pg=1"><span class="screen-reader-text">First page</span><span aria-hidden="true">«</span></a>
            <a class="previous-page button" href="<?php echo($params);?>&pg=<?php echo($page - 1)?>"><span class="screen-reader-text">Previous page</span><span aria-hidden="true">‹</span></a></span>
            <span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" type="number" min="1" max="<?php echo($data['total-page']) ?>" id="current-page-selector" name="pg" value="<?php echo(isset($_GET['pg']) ? $_GET['pg'] : 1);?>" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages"><?php echo($data['total-page'])?></span></span></span>
            <a class="next-page button" href="<?php echo($params);?>&pg=<?php echo($data['total-page'] == 1 ? 1 : ((isset($_GET['pg']) && $_GET['pg'] == 1) || !isset($_GET['pg']) ? 2  : $page + 1)) ?>"><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
            <a class="last-page button" href="<?php echo($params);?>&pg=<?php echo($data['total-page'])?>"><span class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span>
        </div>
        <br class="clear">
      </div>
      <h2 class="screen-reader-text">Posts list</h2>
      <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
          <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'title' ? 'asc' : 'desc')?>"><a href="?page=services&sort=title"><span>Tiêu đề</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="price" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'price' ? 'asc' : 'desc')?>"><a href="?page=services&sort=price"><span>Giá dịch vụ</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="view-count" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'view_count' ? 'asc' : 'desc')?>"><a href="?page=services&sort=view_count"><span>Lượt xem</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="count" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'count' ? 'asc' : 'desc')?>"><a href="?page=services&sort=count"><span>Lượt sử dụng</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="name" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'name' ? 'asc' : 'desc')?>"><a href="?page=services&sort=name"><span>Tên tác giả</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="email" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'email' ? 'asc' : 'desc')?>"><a href="?page=services&sort=email"><span>Liên lạc</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="mod-time" class="manage-column column-title column-primary sorted <?php echo(isset($_GET['sort']) && $_GET['sort'] == 'mod_time' ? 'asc' : 'desc')?>"><a href="?page=services&sort=mod_time"><span>Ngày thêm vào</span><span class="sorting-indicator"></span></a></th>
          </tr>
        </thead>

        <tbody id="the-list">
        <?php 
            while($row = mysqli_fetch_array($data['services'])) {
        ?>

          <tr class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry">
            <td class="column-primary">
              <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
              <strong><a href="http://localhost/wordpress/wp-admin/post.php?post=1&amp;action=edit"><?php echo($row['title'])?></a></strong>
              <div class="row-actions"><span class="edit"><a href="http://localhost/wordpress/wp-admin/admin.php?page=services&id=<?php echo($row['id'])?>" aria-label="Edit “Hello world!”">Edit</a> | </span><span class="trash"><a href="http://localhost/wordpress/wp-admin/post.php?post=1&amp;action=trash&amp;_wpnonce=1179e24bfc" class="submitdelete" aria-label="Move “Hello world!” to the Trash">Trash</a> </span></div><button type="button" class="toggle-row"></button>
            </td>
            <td><span aria-hidden="true"><?php echo($row['price'])?></span></td>
            <td><span aria-hidden="true"><?php echo($row['view_count'])?></span></td>
            <td><span aria-hidden="true"><?php  echo($row['count'])?></span></td>
            <td><span aria-hidden="true"><?php  echo($row['name'])?></span></td>
            <td><span aria-hidden="true"><?php  echo($row['email'])?></span></td>
            <td><span aria-hidden="true"><?php  echo($row['mod_time'])?></span></td>
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
  const addresses = document.getElementsByClassName('address');
  
  $(document).ready(function(){
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"https://provinces.open-api.vn/api/?depth=2",
        success:function(data)
        {
          for(var i = 0 ; i < addresses.length ; i ++) {
            var address = addresses[i];
            var str = address.textContent;
            var splitStr = str.split(',');
            address.textContent =  data[splitStr[0]].name + ", " + data[splitStr[0]].districts[splitStr[1]].name;
          }
        }
    });
  });

</script>