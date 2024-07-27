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

<body>
    <h3 style="color:red; margin-left:27%;">
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
        ?>
    </h3>
    <!-- Body main wrapper start -->
    <!-- Start Login Register Area -->
    <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(uniqlo/images/bg/5.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <ul class="login__register__menu nav justify-contend-center" role="tablist">
                        <li role="presentation" class="register active"><a class="active" href="#dangky" role="tab" data-bs-toggle="tab">Register</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row tab-content justify-content-center">
                <div class="col-md-6  ml-auto mr-auto">
                    <div class="htc__login__register__wrap">
                        <!-- Start Single Content -->
                        <div id="dangky" role="tabpanel" class="account__login--inner single__tabs__panel tab-pane active">
                            <form action="index.php?act=dangky" method="POST" onsubmit="return validate()">
                                <input type="text" class="account__login--input" placeholder="Họ Tên" name="ho_ten" id="hoten">
                                <span id="hoten_err" style="color: red;"></span>

                                <input type="text" class="account__login--input" placeholder="User Name*" name="ten_dang_nhap" id="ten">
                                <span id="ten_err" style="color: red;"></span>

                                <input type="password" class="account__login--input" name="mat_khau" placeholder="Password*" id="mk">
                                <span id="mk_err" style="color: red;"></span>

                                <input type="text" class="account__login--input" placeholder="Email" name="email" id="email">
                                <span id="email_err" style="color: red;"></span>

                                <input type="text" class="account__login--input" placeholder="Địa chỉ" name="dia_chi" id="diachi">
                                <span id="diachi_err" style="color: red;"></span>

                                <input type="text" class="account__login--input" placeholder="Số điện thoại" name="sdt" id="tel">
                                <span id="tel_err" style="color: red;"></span>





                                <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Remember me</span>
                                    <span class="forget"><a href="index.php?act=quenmk">Forget Pasword?</a></span>
                                </div>

                                <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>

                                        <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>

                                        <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>

                                        <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                                <div class="htc__login__btn mt--30">
                                    <input class="account__login--btn primary__btn" type="submit" name="dangky" value="Đăng ký">
                                </div>
                            </form>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
            <!-- End Login Register Content -->
        </div>
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

    <script>
        const hoten = document.getElementById('ho_ten');
        const ten = document.getElementById('ten_dang_nhap');
        const diachi = document.getElementById('dia_chi');
        const email = document.getElementById('email');
        const mk = document.getElementById('mat_khau');
        const tel = document.getElementById('sdt');


        const hoten_err = document.getElementById('ho_ten_err');
        const ten_err = document.getElementById('ten_dang_nhap_err');
        const email_err = document.getElementById('email_err');
        const mk_err = document.getElementById('mat_khau_err');
        const diachi_err = document.getElementById('dia_chi_err');
        const tel_err = document.getElementById('sdt_err');


        function validate() {
            let kt = true;
            if (hoten.value.trim() == "") {
                hoten_err.innerHTML = "Bạn chưa nhập tên";
                kt = false;
            } else {
                hoten_err.innerHTML = "";
            }
            if (ten.value.trim() == "") {
                ten_err.innerHTML = "Bạn chưa nhập tên";
                kt = false;
            } else {
                ten_err.innerHTML = "";
            }
            if (address.value.trim() == "") {
                address_err.innerHTML = "Bạn chưa nhập địa chỉ";
                kt = false;
            } else {
                address_err.innerHTML = "";
            }

            let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,50})+$/;
            if (!regexEmail.test(email.value)) {
                email_err.innerHTML = "Email phải đúng định dạng!";
                kt = false;
            } else {
                email_err.innerHTML = "";
            }

            let regexMK = /^(?=.*\d).{6,}$/;
            if (!regexMK.test(mk.value)) {
                mk_err.innerHTML = "Mật khẩu ít nhất 6 kí tự phải 1 kí tự là số";
                kt = false
            } else {
                mk_err.innerHTML = "";
            }

            let regexSdt = /^0[1-9]\d{8}$/
            if (!regexSdt.test(sdt.value)) {
                sdt_err.innerHTML = "Số điện thoại phải có 10 số và bắt đầu là số 0"
                kt = false
            } else {
                sdt_err.innerHTML = ""

            }

            return kt;
        }
    </script>

</body>


<!-- Mirrored from template.hasthemes.com/uniqlo/uniqlo/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 10:07:01 GMT -->

</html>