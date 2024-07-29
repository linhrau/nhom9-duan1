<?php
require_once 'model/pdo.php';

$sql = "SELECT id_danh_muc, ten_danh_muc FROM danh_muc";
$danhmuc = pdo_query($sql);

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id_tai_khoan'];

function get_cart_items($user_id)
{
    $sql = "SELECT * FROM cart inner join san_pham on cart.id_san_pham  = san_pham.id_san_pham WHERE cart.id_tai_khoan = :user_id";
    $params = [':user_id' => $user_id];
    return pdo_query($sql, $params);
}

$cart_items = get_cart_items($user_id);
?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cart || Uniqlo-Minimalist eCommerce Bootstrap 5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">

    <!-- Bootstrap Fremwork Main Css -->
    <link rel="stylesheet" href="uniqlo/uniqlo/css/bootstrap.min.css">
    <!-- All Plugins css -->
    <link rel="stylesheet" href="uniqlo/uniqlo/css/plugins.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="uniqlo/uniqlo/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="uniqlo/uniqlo/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="uniqlo/uniqlo/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="uniqlo/uniqlo/css/custom.css">

    <!-- Modernizr JS -->
    <script src="uniqlo/uniqlo/js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="uniqlo/uniqlo/images/logo/uniqlo.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 d-none d-md-block">
                            <nav class="mainmenu__nav  d-none d-lg-block">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Trang chủ</a>

                                    </li>

                                    <li class="drop">
                                        <a href="index.php?act=listdanhmuc">Danh mục</a>
                                        <ul class="dropdown">
                                            <?php
                                            foreach ($danhmuc as $dm) {
                                                extract($dm);
                                                $linkdm = "index.php?act=listdanhmuc&id_danh_muc=" . $id_danh_muc;
                                                echo '<li><a href="' . $linkdm . '">' . htmlspecialchars($ten_danh_muc) . '</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </li>

                                    <li><a href="./contact.php">Liên hệ</a></li>
                                </ul>
                            </nav>

                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-lg-2 col-6">
                            <ul class="menu-extra">
                                <li class="search search__open d-none d-sm-block"><span class="ti-search"></span></li>
                                <?php if (isset($_SESSION['user'])) : ?>
                                <li><a href="profile.php"><span class="ti-user"></span>
                                        <?php echo htmlspecialchars($_SESSION['user']['ho_ten']); ?></a></li>
                                <li><a href="logout.php">Logout</a></li>
                                <?php else : ?>
                                <li><a href="login.php"><span class="ti-user"></span></a></li>
                                <?php endif; ?>
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
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
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
                                <img src="images/logo/uniqlo.png" alt="logo">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                    <ul class="sidebar__thumd">
                        <li><a href="#"><img src="images/sidebar-img/1.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/2.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/3.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/4.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/5.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/6.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/7.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/8.jpg" alt="sidebar images"></a></li>
                    </ul>
                    <div class="offset__widget">
                        <div class="offset__single">
                            <h4 class="offset__title">Language</h4>
                            <ul>
                                <li><a href="#"> Engish </a></li>
                                <li><a href="#"> French </a></li>
                                <li><a href="#"> German </a></li>
                            </ul>
                        </div>
                        <div class="offset__single">
                            <h4 class="offset__title">Currencies</h4>
                            <ul>
                                <li><a href="#"> USD : Dollar </a></li>
                                <li><a href="#"> EUR : Euro </a></li>
                                <li><a href="#"> POU : Pound </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset__sosial__share">
                        <h4 class="offset__title">Follow Us On Social</h4>
                        <ul class="off__soaial__link">
                            <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank"
                                    title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>

                            <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank"
                                    title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                            <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks"
                                    target="_blank" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                            <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank"
                                    title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                            <li><a class="bg--google" href="#" target="_blank" title="Google"><i
                                        class="zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
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
                                    <img src="images/product/sm-img/1.jpg" alt="product images">
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
                                    <img src="images/product/sm-img/2.jpg" alt="product images">
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
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area"
            style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Cart</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.html">Home</a>
                                    <span class="brd-separetor">/</span>
                                    <span class="breadcrumb-item active">Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <form id="cart-form" action="update_cart.php" method="POST">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($cart_items)) : ?>
                                        <tr>
                                            <td colspan="6">Your cart is empty.</td>
                                        </tr>
                                        <?php else : ?>
                                        <?php foreach ($cart_items as $item) : ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="img/<?php echo htmlspecialchars($item['img']); ?>"
                                                        alt="product img" /></a>
                                            </td>
                                            <td class="product-name"><a
                                                    href="#"><?php echo htmlspecialchars($item['ten_san_pham']); ?></a>
                                            </td>
                                            <td class="product-price"><span
                                                    class="amount">£<?php echo number_format($item['gia'], 2); ?></span>
                                            </td>
                                            <td class="product-quantity">
                                                <input type="number" class="quantity"
                                                    data-product-id="<?php echo htmlspecialchars($item['id_san_pham']); ?>"
                                                    value="<?php echo htmlspecialchars($item['soluong']); ?>" min="1" />
                                            </td>
                                            <td class="product-subtotal">
                                                £<?php echo number_format($item['thanh_tien'], 2); ?></td>
                                            <td class="product-remove"><a
                                                    href="update_cart.php?remove_id=<?php echo htmlspecialchars($item['id_san_pham']); ?>"
                                                    class="remove-item"
                                                    data-product-id="<?php echo htmlspecialchars($item['id_san_pham']); ?>">X</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="buttons-cart">
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input type="text" name="coupon_code" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 ">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table>
                                            <tbody>
                                                <?php
                                                $subtotal = array_sum(array_column($cart_items, 'thanh_tien')); // Calculate subtotal
                                                $shipping_cost = 7.00; // Example shipping cost
                                                $total = $subtotal + $shipping_cost;
                                                ?>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span
                                                            class="amount">£<?php echo number_format($subtotal, 2); ?></span>
                                                    </td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <ul id="shipping_method">
                                                            <li>
                                                                <input type="radio" id="ShippingMethod1"
                                                                    name="flexRadioShippingMethod" />
                                                                <label for="ShippingMethod1">
                                                                    Flat Rate: <span
                                                                        class="amount">£<?php echo number_format($shipping_cost, 2); ?></span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <input type="radio" id="ShippingMethod2"
                                                                    name="flexRadioShippingMethod" />
                                                                <label for="ShippingMethod2">
                                                                    Free Shipping
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <p><a class="shipping-calculator-button" href="#">Calculate
                                                                Shipping</a></p>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span
                                                                class="amount">£<?php echo number_format($total, 2); ?></span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="checkout.html">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                        $(document).ready(function() {
                            // Handle quantity change
                            $('.quantity').on('change', function() {
                                var productId = $(this).data('product-id');
                                var quantity = $(this).val();

                                $.ajax({
                                    url: 'update_cart.php',
                                    method: 'POST',
                                    data: {
                                        action: 'update_quantity',
                                        product_id: productId,
                                        quantity: quantity
                                    },
                                    success: function(response) {
                                        var data = JSON.parse(response);
                                        if (data.status === 'success') {
                                            location.reload();
                                        } else {
                                            alert('Error: ' + data.message);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error updating cart:', error);
                                    }
                                });
                            });

                            // Handle remove item click
                            $('.remove-item').on('click', function(e) {
                                e.preventDefault();
                                var productId = $(this).data('product-id');

                                $.ajax({
                                    url: 'update_cart.php',
                                    method: 'POST',
                                    data: {
                                        action: 'remove_item',
                                        product_id: productId
                                    },
                                    success: function(response) {
                                        var data = JSON.parse(response);
                                        if (data.status === 'success') {
                                            location.reload();
                                        } else {
                                            alert('Error: ' + data.message);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error removing item from cart:',
                                            error);
                                    }
                                });
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        <footer class="htc__foooter__area"
            style="background: rgba(0, 0, 0, 0) url(images/bg/1.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row footer__container clearfix">
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="ft__widget">
                            <div class="ft__logo">
                                <a href="index.html">
                                    <img src="images/logo/uniqlo.png" alt="footer logo">
                                </a>
                            </div>
                            <div class="footer__details">
                                <p>Get 10% discount with notified about the latest news and updates.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-3 col-sm-6 smb-30 xmt-30">
                        <div class="ft__widget">
                            <h2 class="ft__title">Newsletter</h2>
                            <div class="newsletter__form">
                                <div class="input__box">
                                    <div id="mc_embed_signup">
                                        <form
                                            action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                            method="post" id="mc-embedded-subscribe-form"
                                            name="mc-embedded-subscribe-form" class="validate" target="_blank"
                                            novalidate>
                                            <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                                <div class="news__input">
                                                    <input type="email" value="" name="EMAIL" class="email"
                                                        id="mce-EMAIL" placeholder="Email Address" required>
                                                </div>
                                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                                    <input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"
                                                        tabindex="-1" value=""></div>
                                                <div class="clearfix subscribe__btn"><input type="submit" value="Send"
                                                        name="subscribe" id="mc-embedded-subscribe"
                                                        class="bst__btn btn--white__color">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-3 col-sm-6 smt-30 xmt-30">
                        <div class="ft__widget contact__us">
                            <h2 class="ft__title">Contact Us</h2>
                            <div class="footer__inner">
                                <p> 319 Clematis St. <br> Suite 100 WPB, FL 33401 </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-2 lg-offset-1 col-sm-6 smt-30 xmt-30">
                        <div class="ft__widget">
                            <h2 class="ft__title">Follow Us</h2>
                            <ul class="social__icon">
                                <li><a href="https://twitter.com/devitemsllc" target="_blank"><i
                                            class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/devitems/" target="_blank"><i
                                            class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://plus.google.com/" target="_blank"><i
                                            class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                </div>
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2022 Uniqlo. Made with <i class="ti-heart"></i> by <a target="_blank"
                                            href="https://www.hasthemes.com/">HasThemes.</a></p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="uniqlo/uniqlo/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="uniqlo/uniqlo/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="uniqlo/uniqlo/js/vendor/jquery.waypoints.js"></script>
    <!-- Bootstrap Framework js -->
    <script src="uniqlo/uniqlo/js/bootstrap.bundle.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="uniqlo/uniqlo/js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="uniqlo/uniqlo/js/main.js"></script>

</body>


<!-- Mirrored from template.hasthemes.com/uniqlo/uniqlo/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 10:06:57 GMT -->

</html>