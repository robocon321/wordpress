<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Tech Blog - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Gmail meta -->
    <meta name="google-signin-client_id" content="199796462345-vdkrqrkr7p2pr0ngjanb1i485p4olpb0.apps.googleusercontent.com" />
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo(get_template_directory_uri().'/images/favicon.ico'); ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo(get_template_directory_uri().'/images/apple-touch-icon.png'); ?>">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="<?php echo(get_template_directory_uri().'/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="<?php echo(get_template_directory_uri().'/css/font-awesome.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo(get_template_directory_uri().'/style.css'); ?>" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="<?php echo(get_template_directory_uri().'/css/responsive.css'); ?>" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="<?php echo(get_template_directory_uri().'/css/colors.css'); ?>" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="<?php echo(get_template_directory_uri().'/css/version/tech.css'); ?>" rel="stylesheet">

    <?php wp_head(); ?>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer ></script>
</head>
<body>
  <div id="wrapper">
    <header class="tech-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="tech-index.html"><img src="<?php echo(get_template_directory_uri().'/images/version/tech-logo.png'); ?>" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/posts">Bài viết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/forums">Diễn đàn</a>
                        </li>                   
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/services">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/recruit">Tuyển dụng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/about">Về chúng tôi</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-rss"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-android"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-apple"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->
