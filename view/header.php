<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from template.hasthemes.com/uniqlo/uniqlo/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 10:05:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home-8 || Uniqlo-Minimalist eCommerce Bootstrap 5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">

    <!-- Bootstrap Fremwork Main Css -->
    <link rel="stylesheet" href="uniqlo/css/bootstrap.min.css">
    <!-- All Plugins css -->
    <link rel="stylesheet" href="uniqlo/css/plugins.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="uniqlo/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="uniqlo/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="uniqlo/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="uniqlo/css/custom.css">

    <!-- Modernizr JS -->
    <script src="uniqlo/js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer home-8">
        <!-- Start Header Style -->
        <header id="header" class="htc-header">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="logo">
                                <a href="index.php?act=shop">
                                    <img src="uniqlo/images/logo/uniqlo.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 d-none d-md-block">
                            <nav class="mainmenu__nav  d-none d-lg-block">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php?act=shop">Trang chủ</a>
                                    </li>
                                    <li class="drop"><a href="index.php?act=listdanhmuc">Danh mục</a>
                                        <ul class="dropdown">
                                            <?php
                                            //đang lỗi ở đây
                                            foreach ($dsdm as $dm) {
                                                extract($dm);
                                                $linkdm = "index.php?act=listdanhmuc&listdanhmuc=" . $listdanhmuc; //đề lấy ra được các sản phẩm cùng loại 
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Liên hệ</a></li>
                                </ul>
                            </nav>

                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-lg-2 col-6">
                            <ul class="menu-extra">
                                <li class="search search__open d-none d-sm-block"><span class="ti-search"></span></li>
                                <li>
                                    <a href="index.php?act=thongtin">
                                        <span class="ti-user"></span>
                                    </a>
                                    <a href="index.php?act=dangnhap">Đăng nhập/ </a>
                                    <a href="index.php?act=dangky">Đăng ký</a>
                                </li>

                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>

                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- TÌM KIẾM -->
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Tìm kiếm " type="text" name="keyword" id="">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="off__contact">
                        <div class="logo">
                            <a href="index.html">
                                <img src="uniqlo/images/logo/uniqlo.png" alt="logo">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                    <ul class="sidebar__thumd">
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/1.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/2.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/3.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/4.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/5.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/6.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/7.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="uniqlo/images/sidebar-img/8.jpg" alt="sidebar images"></a></li>
                    </ul>

                </div>
            </div>
            <!-- End Offset MEnu -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="uniqlo/images/product/sm-img/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="uniqlo/images/product/sm-img/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="uniqlo/checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>