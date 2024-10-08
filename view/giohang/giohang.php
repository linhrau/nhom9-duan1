<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from template.hasthemes.com/uniqlo/uniqlo/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 10:06:57 GMT -->

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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- All Plugins css -->
    <link rel="stylesheet" href="css/plugins.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
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
                        <form action="index.php?act=update-quantity-cart" method="post">
                            <div class="table-content table-responsive">
                                <?php if (!empty($_SESSION['mycart'])) {  ?>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="img">Ảnh</th>
                                                <th class="ten_san_pham">Sản Phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số Lượng</th>
                                                <th class="product-subtotal">Tổng tiền</th>
                                                <th class="product-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($_SESSION['mycart'] as  $id => $cart) {
                                                $total += $cart[5];
                                            ?>
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img src="<?= $cart[1] ?>" alt="product img" />
                                                        </a>
                                                    </td>
                                                    <td class="product-name"><a href="#"><?= $cart[2] ?></a></td>
                                                    <td class="product-price"><span class="amount"><?= number_format($cart[3], 0) ?></span></td>
                                                    <td class="product-quantity">
                                                        <input type="number" name="quantity[<?= $id ?>]" value="<?= $cart[4] ?>" min="1" />
                                                        <input type="hidden" name="id[<?= $id ?>]" value="<?= $id ?>" />
                                                    </td>
                                                    <td class="product-subtotal"><?= number_format($cart[5], 0) ?></td>
                                                    <td class="product-remove">
                                                        <a onclick="return confirm('Bạn có muôn xóa sản phẩm này không?')" href="index.php?act=delcart&id=<?= $cart[0] ?>">X</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } else { ?>
                                    <div class="alert alert-danger">Không có sản phẩm nào trong giỏ hàng cả</div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="buttons-cart">
                                        <input name="updateCart" type="submit" value="Update Cart" />
                                        <a href="index.php?act=shop">Continue Shopping</a>
                                    </div>
                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input type="text" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 ">
                                    <div class="cart_totals">
                                        <h2>Tổng thanh toán</h2>
                                        <table>
                                            <tbody>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount"><?= number_format($total, 0) ?? '' ?></span></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="wc-proceed-to-checkout">
                                                        <a href="index.php?act=dathang">Thanh toán</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="js/vendor/jquery.waypoints.js"></script>
    <!-- Bootstrap Framework js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from template.hasthemes.com/uniqlo/uniqlo/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 10:06:57 GMT -->

</html>