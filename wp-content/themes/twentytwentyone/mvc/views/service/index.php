<?php
$params = '?';
if (isset($_GET['sort'])) $params = $params . 'sort=' . $_GET['sort'];
if (isset($_GET['search'])) $params = '&search=' . $_GET['search'];
if (!isset($_GET['pg']) || $_GET['pg'] < 2) $page = 2;
else $page = $_GET['pg'];
?>
<section>
    <div class="modal fade bd-example-modal-sm" id="modelSuccess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content d-flex flex-row align-items-center p-4">
                <img class="mr-1" src="<?php echo (get_template_directory_uri() . '/upload/yes-icon.png'); ?>" style="width: 50px; height:50px" alt="Not found" />
                <h1 class="m-0" style="display: inline-block;">Thành công</h1>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" id="modelFail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content d-flex flex-row align-items-center p-4">
                <img class="mr-1" src="<?php echo (get_template_directory_uri() . '/upload/close-icon.png'); ?>" style="width: 50px; height:50px" alt="Not found" />
                <h1 class="m-0" style="display: inline-block;">Thất bại</h1>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content d-flex flex-row align-items-center p-4" style="width: 600px;">
                <form id="form_customer">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo isset($customer['id']) ? $customer['id'] : "" ?>" id="id" name="customer_id" />
                    </div>
                    <input type="hidden" name="service_id" id="service_id" />
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" value="<?php echo  isset($customer['name']) ? $customer['name'] : '' ?>" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="<?php echo  isset($customer['email']) ? $customer['email'] : '' ?>" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" pattern="^([0-9]{10})" class="form-control" value="<?php echo isset($customer['phone']) ? $customer['phone'] : '' ?>" id="phone" name="phone" />
                    </div>
                    <div class="form-group ">
                        <label for="birthday">Ngày sinh</label>
                        <input type="date" class="form-control" value="<?php echo isset($customer['birthday']) ? (substr($customer['birthday'], 0, 10)) : '' ?>" id="birthday" name="birthday" />
                    </div>
                    <label><b>Địa chỉ:</b></label>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="province">Tỉnh/Thành phố</label>
                            <select class="form-control" name="province" id="province">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="district">Quận/Huyện</label>
                            <select class="form-control" name="district" id="district">
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="street">Đường</label>
                            <input type="text" class="form-control" value="<?php echo isset($customer['street']) ? $customer['street'] : '' ?>" name="street" id="street" />
                        </div>
                    </div>
                    <button class="btn btn-primary" id="btn_save">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <form id="sortForm">
            <label for="posts">Sắp xếp theo: </label>
            <select id="posts" name="sort" onchange="javascript:this.form.submit()">
                <option value="view_count">Lượt xem</option>
                <option value="mod_time" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'mod_time' ? 'selected' : '') ?>>Ngày phát hành</option>
                <option value="title" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'title' ? 'selected' : '') ?>>Tên tiêu đề</option>
                <option value="order_count">Lượt sử dụng</option>
            </select>
        </form>
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                        <?php
                        while ($data['services_filter'] && $row = mysqli_fetch_array($data['services_filter'])) {
                        ?>
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="?id=<?php echo ($row['id']) ?>" title="">
                                            <img src="<?php echo ($row['thumbnail']) ?>" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->
                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="?id=<?php echo ($row[0]) ?>" title=""><?php echo ($row['title']) ?></a></h4>
                                    <p><?php
                                        $str = $row['content'];
                                        $str = preg_replace('/<\w*>/', ' ', $str);
                                        $str = preg_replace('/<\/\w{1,8}$/', ' ', $str);
                                        $str = preg_replace('/<\/\w*>/', ' ', $str);
                                        $str = trim($str);
                                        echo ($str);
                                        ?></p>
                                    <div><button class="btn" onclick="showModal(<?php echo ($row['id']) ?>)">Đặt dịch vụ</button></div>
                                    <small><a href="?id=<?php echo ($row[0]) ?>" title=""><?php echo (date_format(date_create($row['mod_time']), "d F Y")); ?> </a></small>
                                    <small><a href="#" title=""><?php echo ($row['price']) ?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo ($row['view_count']) ?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-user"></i> <?php echo ($row['order_count']) ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                        <?php } ?>
                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item">
                                            <a class="page-link" href="<?php
                                                                        echo ($params . '&pg=' . (--$page));
                                                                        ?>">
                                                <?php echo ($page); ?>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php
                                                                        echo ($params . '&pg=' . (++$page));
                                                                        ?>">
                                                <?php echo ($page) ?>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="<?php
                                                                                            echo ($params . '&pg=' . (++$page));
                                                                                            ?>">
                                                <?php echo ($page); ?>
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
                        <form method="GET" action="/wordpress/search/">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tìm kiếm</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="search" />
                                <input type="hidden" name="options" value="my_services" />
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
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
                                while ($data['forums_popular'] && $row = mysqli_fetch_array($data['forums_popular'])) {
                                ?>
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <h5 class="mb-1"><?php echo ($row['title']) ?></h5>
                                            <small><?php echo (date_format(date_create($row['mod_time']), "d F Y")); ?> </small>
                                            <small><i class="fa fa-eye"></i> <?php echo ($row['view_count']) ?> </small>
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
    const serviceInput = document.getElementById("service_id");

    const showModal = (service_id) => {
        serviceInput.value = service_id;
        $('#modalForm').modal('show');
    }

    var selectedProvince = "<?php echo isset($customer['district']) ? $customer['district'] : 'null' ?>";
        var selectedDistrict = "<?php echo isset($customer['province']) ? $customer['province'] : 'null' ?>"

        function showDistricts(provinceId) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://provinces.open-api.vn/api/?depth=2",
                success: function(data) {
                    $.each(data[provinceId].districts, function(key, value) {
                        if (key != selectedDistrict) {
                            $("#district").append('<option value = "' + key + '">' + value.name + '</option>');
                        } else {
                            $("#district").append(' <option value = "' + key + '" selected>' + value.name + '</option>');
                        }
                        //console.log(key + ": " + value.name);
                    });
                }
            });
        }

        $(document).ready(function() {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://provinces.open-api.vn/api/?depth=2",
                success: function(data) {
                    if (selectedProvince == -1 || $("#id").val() == '') {
                        $("#province").append('<option value = "" selected ></option>');
                    }
                    $.each(data, function(k, v) {

                        if (k != selectedProvince || selectedProvince == 'null') {
                            $("#province").append('<option value = "' + k + '">' + v.name + '</option>');
                        } else {
                            $("#province").append(' <option value = "' + k + '" selected>' + v.name + '</option>');
                            //console.log(data[k])
                            showDistricts(k);
                        }
                    });
                }
            });

            if ($("#id").val() == '') {
                $("#btn_save").html("Thêm mới");
            } else {
                $("#btn_save").html("Cập nhật");
            }

        });

        $("#province").change(function() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://provinces.open-api.vn/api/?depth=2",
                success: function(data) {
                    selectedProvince = $("#province").val();
                    //selectedDistrict = $("#district").val();
                    selectedDistrict = null;
                    //console.log(selectedProvince)

                    $('#district option').each(function() {
                        $(this).remove();
                    });
                    showDistricts(selectedProvince);
                }
            });
        });

        $("#btn_save").click(function(e) {
            e.preventDefault();
            $('#modalForm').modal('hide');

            var form = $("#form_customer");
            $.ajax({
                type: "POST",
                url: "<?php echo (get_template_directory_uri() . "/mvc/ajax/admin/save-customer.php") ?>",
                data: form.serialize(), // serializes the form's elements.

                success: function(data) {
                    $('#modelSuccess').modal('show');
                },
                error: function(error) {
                    $('#modelFail').modal('show');
                }
            });
        });
</script>