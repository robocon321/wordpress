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
        <h1 class="wp-heading-inline"> Tasks</h1>
        <a href="?page=tasks&action=new" class="page-title-action">Add New</a>
        <hr class="wp-header-end">

        <form id="posts-filter" method="get">
            <div class="tablenav top">
                <div class="alignleft">
                    <p class="search-box">
                        <label class="screen-reader-text" for="post-search-input">Search Tasks:</label>
                        <input type="hidden" name="page" value="<?php echo ($_GET['page']); ?>" />
                        <input type="search" id="post-search-input" name="search" value="<?php echo (isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                        <input type="submit" id="search-submit" class="button" value="Search Tasks">
                    </p>
                </div>
                <h2 class="screen-reader-text">Tasks list navigation</h2>
                <div class="tablenav-pages"><span class="displaying-num"><?php echo ($data['total-task']) ?> items</span>
                    <a class="first-page button" href="<?php echo ($params); ?>&pg=1"><span class="screen-reader-text">First page</span><span aria-hidden="true">«</span></a>
                    <a class="previous-page button" href="<?php echo ($params); ?>&pg=<?php echo ($page - 1) ?>"><span class="screen-reader-text">Previous page</span><span aria-hidden="true">‹</span></a></span>
                    <span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" type="number" min="1" max="<?php echo ($data['total-page']) ?>" id="current-page-selector" name="pg" value="<?php echo (isset($_GET['pg']) ? $_GET['pg'] : 1); ?>" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages"><?php echo ($data['total-page']) ?></span></span></span>
                    <a class="next-page button" href="<?php echo ($params); ?>&pg=<?php echo ($data['total-page'] == 1 ? 1 : ((isset($_GET['pg']) && $_GET['pg'] == 1) || !isset($_GET['pg']) ? 2  : $page + 1)) ?>"><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
                    <a class="last-page button" href="<?php echo ($params); ?>&pg=<?php echo ($data['total-page']) ?>"><span class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span>
                </div>
                <br class="clear">
            </div>

            <h2 class="screen-reader-text">Tasks list</h2>

            <table class="wp-list-table widefat fixed striped table-view-list posts">
                <thead>
                    <tr>
                        <th scope="col" id="id" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'id' ? 'asc' : 'desc') ?>"><a href="?page=tasks&sort=id"><span>ID</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="title" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name_emp' ? 'asc' : 'desc') ?>"><a href="?page=tasks&sort=name_emp"><span>Nhân viên</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="email" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name_cus' ? 'asc' : 'desc') ?>"><a href="?page=tasks&sort=name_cus"><span>Khách hàng</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="phone" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'title' ? 'asc' : 'desc') ?>"><a href="?page=tasks&sort=title"><span>Dịch vụ</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="cre_time" class="manage-column column-title column-primary "><a href="#"><span>Ngày tạo</span></a></th>
                        <th scope="col" id="province" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'payment_fee' ? 'asc' : 'desc') ?>"><a href="?page=tasks&sort=payment_fee"><span>Thanh toán</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="district" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'status' ? 'asc' : 'desc') ?>"><a href="?page=tasks&sort=status"><span>Trạng thái</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="street" class="manage-column column-title column-primary sorted <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'warranty_period' ? 'asc' : 'desc') ?>"><a href="?page=tasks&sort=warranty_period"><span>Bảo hành</span><span class="sorting-indicator"></span></a></th>
                    </tr>
                </thead>

                <tbody id="the-list">
                    <?php
                    while ($row = mysqli_fetch_array($data['tasks'])) {
                    ?>
                        <tr class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry " id="row_id<?php echo ($row['id']) ?>">
                            <td class="column-primary">
                                <strong><a href="?page=tasks&id=<?php echo ($row['id']) ?>"><?php echo ($row['id']) ?></a></strong>
                                <div class="row-actions">
                                    <span class="edit">
                                        <a href="?page=tasks&id=<?php echo ($row['id']) ?>">Edit</a> |
                                    </span>
                                    <span class="trash">
                                        <a href="#" class="submitdelete " onclick="deleteTaskById(<?php echo ($row['id']) ?>)">Trash</a>
                                    </span>
                                </div><button type="button" class="toggle-row"></button>
                            </td>
                            <td class="column-primary">
                                <strong><a href="?page=employees&id=<?php echo ($row['emp_id']) ?> "><?php echo ($row['name_emp']) ?></a></strong>
                                <div class="row-actions">
                                    <span class="edit">
                                        <a href="?page=employees&id=<?php echo ($row['emp_id']) ?>">View</a> 
                                    </span>
                                </div>
                            </td>
                            <td class="column-primary">
                                <strong><a href="?page=customers&id=<?php echo ($row['cus_id']) ?>"><?php echo ($row['name_cus']) ?></a></strong>
                                <div class="row-actions">
                                    <span class="edit">
                                        <a href="?page=customers&id=<?php echo ($row['cus_id']) ?>">View</a> 
                                    </span>
                                </div>
                            </td>
                            <td class="column-primary">
                                <strong><a href="http://localhost/wordpress/services/?id=<?php echo ($row['service_id']) ?>"><?php echo ($row['title']) ?></a></strong>
                                <div class="row-actions">
                                    <span class="edit">
                                        <a href="http://localhost/wordpress/services/?id=<?php echo ($row['service_id']) ?>">View</a> 
                                    </span>
                                </div>
                            </td>
                            <td><?php echo ($row['cre_time']) ?></td>
                            <td><?php echo ($row['payment_fee']) ?></td>
                            <td>
                                <span aria-hidden="true">
                                <!-- <?php echo ($row['status']) ?> -->
                                <?php 
                                switch ($row['status']) {
                                    case '0':
                                        echo 'Đang chờ';
                                      break;
                                    case '1':
                                        echo 'Đang làm';
                                      break;
                                    case '2':
                                        echo 'Hoàn thành';
                                      break;
                                    case '3':
                                        echo 'Đã hủy';
                                      break;
                                    default:
                                      echo 'Bị lỗi';
                                  }
                                ?>
                                </span>
                            </td>
                            <td><span aria-hidden="true"><?php echo ($row['warranty_period']) ?></span></td>
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
    function deleteTaskById(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'http://localhost/wordpress/wp-admin/admin.php?page=tasks&action=delete&task_id=' + id,
            complete: function(data) {
                window.location.reload();
            }
        });
    }
</script>