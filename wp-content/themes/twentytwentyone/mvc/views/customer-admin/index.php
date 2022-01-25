<?php
$params = '?1';
$params = $params . '&page=' . $_GET['page'];
if (isset($_GET['sort'])) $params = $params . '&sort=' . $_GET['sort'];
if (isset($_GET['search'])) $params = '&search=' . $_GET['search'];
if (!isset($_GET['pg']) || $_GET['pg'] < 2) $page = 2;
else $page = $_GET['pg'];

?>
<div id="wpbody-content">
  <div class="wrap">
    <h1 class="wp-heading-inline"> Customers</h1>
    <a href="?page=customers&action=new" class="page-title-action">Add New</a>
    <hr class="wp-header-end">

    <form id="posts-filter" method="get">
      <div class="tablenav top">
        <div class="alignleft">
          <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Search Customers:</label>
            <input type="hidden" name="page" value="<?php echo ($_GET['page']); ?>" />
            <input type="search" id="post-search-input" name="search" value="<?php echo (isset($_GET['search']) ? $_GET['search'] : ''); ?>">
            <input type="submit" id="search-submit" class="button" value="Search Customers">
          </p>
        </div>
        <h2 class="screen-reader-text">Posts list navigation</h2>
        <div class="tablenav-pages"><span class="displaying-num"><?php echo ($data['total-customer']) ?> items</span>
          <a class="first-page button" href="<?php echo ($params); ?>&pg=1"><span class="screen-reader-text">First page</span><span aria-hidden="true">«</span></a>
          <a class="previous-page button" href="<?php echo ($params); ?>&pg=<?php echo ($page - 1) ?>"><span class="screen-reader-text">Previous page</span><span aria-hidden="true">‹</span></a></span>
          <span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" type="number" min="1" max="<?php echo ($data['total-page']) ?>" id="current-page-selector" name="pg" value="<?php echo (isset($_GET['pg']) ? $_GET['pg'] : 1); ?>" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages"><?php echo ($data['total-page']) ?></span></span></span>
          <a class="next-page button" href="<?php echo ($params); ?>&pg=<?php echo ($data['total-page'] == 1 ? 1 : ((isset($_GET['pg']) && $_GET['pg'] == 1) || !isset($_GET['pg']) ? 2  : $page + 1)) ?>"><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
          <a class="last-page button" href="<?php echo ($params); ?>&pg=<?php echo ($data['total-page']) ?>"><span class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span>
        </div>
        <br class="clear">
      </div>

      <h2 class="screen-reader-text">Posts list</h2>

      <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
          <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name' ? 'asc' : 'desc') ?>"><a href="?page=customers&sort=name"><span>Họ tên</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="email" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'email' ? 'asc' : 'desc') ?>"><a href="?page=customers&sort=email"><span>Email</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="phone" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'phone' ? 'asc' : 'desc') ?>"><a href="?page=customers&sort=phone"><span>Phone</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="province" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'province' ? 'asc' : 'desc') ?>"><a href="?page=customers&sort=province"><span>Tỉnh/Thành phố</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="district" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'district' ? 'asc' : 'desc') ?>"><a href="?page=customers&sort=district"><span>Quận/Huyện</span><span class="sorting-indicator"></span></a></th>
            <th scope="col" id="street" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'street' ? 'asc' : 'desc') ?>"><a href="?page=customers&sort=street"><span>Số nhà</span><span class="sorting-indicator"></span></a></th>
          </tr>
        </thead>

        <tbody id="the-list">
          <?php
          while ($row = mysqli_fetch_array($data['customers'])) {
          ?>
            <tr class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry " id="row_id<?php echo ($row['id']) ?>">
              <td class="column-primary">
                <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
                <strong><a href="?page=customers&amp;action=edit"><?php echo ($row['name']) ?></a></strong>
                <div class="row-actions">
                  <span class="edit">
                    <a href="?page=customers&id=<?php echo ($row['id']) ?>">Edit</a> |
                  </span>
                  <span class="trash">
                    <a href="#" class="submitdelete " onclick="deleteCustomerById(<?php echo ($row['id']) ?>)">Trash</a>
                  </span>
                </div><button type="button" class="toggle-row"></button>
              </td>
              <td><?php echo ($row['email']) ?></td>
              <td><span aria-hidden="true"><?php echo ($row['phone']) ?></span></td>
              <td class="province"><span aria-hidden="true"><?php echo ($row['province']) ?></span></td>
              <td class="district"><span aria-hidden="true"><?php echo ($row['district']) ?></span></td>
              <td><span class="address" aria-hidden="true"><?php echo ($row['street']) ?> </span></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </form>

    <div id="ajax-response"></div>
    <div class="clear"></div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "https://provinces.open-api.vn/api/?depth=2",
      success: function(data) {
        var provinces = $('.province'); //is arr obj
        var districts = $(".district"); //is arr obj
        var provinceCodes = [];
        provinces.each(function(i) {
          provinceCodes[i] = provinces.eq(i).text();
          $(this).html($(this).text() != '-1' ? data[$(this).text()].name : '');
        });

        districts.each(function(i) {
          $(this).html(provinceCodes[i] != '-1' ? data[provinceCodes[i]].districts[$(this).text()].name : '');
        })
      }
    });
  });

  function deleteCustomerById(id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: 'http://localhost/wordpress/wp-admin/admin.php?page=customers&action=delete&customer_id=' + id,
      complete: function(data) {
        // var ele = "#row_id" + id;
        // if ($(ele).length > 0) {
        //   $(ele).remove();
        // }
        window.location.reload();
      }
    });
  }
</script>