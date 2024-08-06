<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from template.hasthemes.com/uniqlo/uniqlo/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 10:07:01 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LogIn Ragister || Uniqlo-Minimalist eCommerce Bootstrap 5 Template</title>
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
<style>
    .tttk {
        margin-top: 120px;
        text-align: center;
        color: red;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .account__content--title {
        color: #007bff;
        margin-bottom: 6px;
    }

    .my__account--section {
        margin-bottom: 10%;
    }

    .my__account--section__inner {
        border-radius: 10px;
        display: flex;
    }

    .account__left--sidebar {
        flex: 1;
    }

    .account__menu {
        list-style: none;
        padding: 0;
    }

    .account__menu--list {
        margin-bottom: 10px;
        margin-top: 30px;

    }

    .account__menu--list a {
        text-decoration: none;
        color: #333;
    }

    .account__menu--list a:hover {
        color: #007bff;
    }

    .account__wrapper {
        flex: 3;
        padding: 20px;
    }

    .account__content {
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
    }

    .account__content--title {
        color: #333;
    }

    .account__details--desc {
        margin-bottom: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        .my__account--section__inner {
            flex-direction: column;
        }

        .account__left--sidebar,
        .account__wrapper {
            width: 100%;
        }
    }
</style>

<body>
    <div>
        <div class="container">
            <?php
            if (isset($_SESSION['ten_dang_nhap'])) {
                extract($_SESSION['ten_dang_nhap']);
            ?>
                <h2 class="tttk">Thông tin tài khoản</h2>
                <section class="my__account--section section " style=" margin-bottom:10%;">
                    <div class="container">
                        <div class="my__account--section__inner">
                            <div class="account__left--sidebar">
                                <ul class="account__menu">
                                    <li class="account__menu--list"><a href="index.php?act=edittaikhoan">Cập nhật tài khoản</a></li>
                                    <li class="account__menu--list "><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                                    <?php
                                    if ($role == 1) { ?>
                                        <li class="account__menu--list"><a href="admin/index.php">Đăng nhập admin</a></li>
                                    <?php }
                                    ?>
                                    <li class="account__menu--list"><a href="index.php?act=thoat">Đăng xuất</a></li>
                                </ul>
                            </div>
                            <div class="account__wrapper">
                                <div class="account__content">
                                    <h3 class="account__content--title">Thông tin</h3>
                                    <div class="account__details">
                                        <p class="account__details--desc">Họ tên: <?= $ho_ten ?> </p>
                                        <p class="account__details--desc">Tên đăng nhập: <?= $ten_dang_nhap ?> </p>
                                        <p class="account__details--desc">Email: <?= $email ?></p>
                                        <p class="account__details--desc">Mật khẩu: <?= $mat_khau ?> </p>
                                        <p class="account__details--desc">Số điện thoại: <?= $sdt ?> </p>
                                        <p class="account__details--desc">Địa chỉ: <?= $dia_chi ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>
    </div>


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


<!-- Mirrored from template.hasthemes.com/uniqlo/uniqlo/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 10:07:01 GMT -->

</html>