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
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(uniqlo/images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Cart</h2>
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
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="img">Ảnh</th>
                                        <th class="ten_san_pham">Sản Phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Mô Tả</th>
                                        <th class="product-subtotal">Tổng tiền</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="uniqlo/images/product/4.png" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#">Vestibulum suscipit</a></td>
                                        <td class="product-price"><span class="amount">£165.00</span></td>
                                        <td class="product-quantity"><input type="number" value="1" min="1" /></td>
                                        <td class="product-subtotal">£165.00</td>
                                        <td class="product-remove"><a href="#">X</a></td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="uniqlo/images/product/3.png" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#">Vestibulum dictum magna</a></td>
                                        <td class="product-price"><span class="amount">£50.00</span></td>
                                        <td class="product-quantity"><input type="number" value="1" min="1" /></td>
                                        <td class="product-subtotal">£50.00</td>
                                        <td class="product-remove"><a href="#">X</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="buttons-cart">
                                    <input type="submit" value="Update Cart" />
                                    <a href="#">Continue Shopping</a>
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
                                    <h2>Cart Totals</h2>
                                    <table>
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="amount">£215.00</span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>
                                                    <ul id="shipping_method">
                                                        <li>
                                                            <input type="radio" id="ShippingMethod1" name="flexRadioShippingMethod" />
                                                            <label for="ShippingMethod1">
                                                                Flat Rate: <span class="amount">£7.00</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="ShippingMethod2" name="flexRadioShippingMethod" />
                                                            <label for="ShippingMethod2">
                                                                Free Shipping
                                                            </label>
                                                        </li>
                                                        <li></li>
                                                    </ul>
                                                    <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <strong><span class="amount">£215.00</span></strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Area -->
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