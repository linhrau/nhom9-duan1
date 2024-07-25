<!-- BẮT ĐẦU TỪ ĐÂY  -->
<!-- Start login section  -->
<div class="login__section section--padding" style="margin-left: 30%;">
    <div class="container">
        <h3 style="color:red">
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
        </h3>
        <div class="login__section--inner">
            <div class="row row-cols-md-2 row-cols-1">
                <div class="col">

                    <div class="account__login">
                        <div class="account__login--header mb-25">
                            <h2 class="account__login--header__title h3 mb-10">Đăng Ký </h2>
                        </div>
                        <div class="account__login--inner">
                            <form action="index.php?act=dangky" method="POST" onsubmit="return validate()">

                                <input class="account__login--input" placeholder="Họ Tên" type="text" name="ho_ten" id="hoten"> <span id="ten_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Tên tài khoản " type="text" name="ten_tai_khoan" id="ten"> <span id="ten_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Mật khẩu " type="password" name="mat_khau" id="mk"> <span id="mk_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Email " type="email" name="email" id="email"> <span id="email_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Địa chỉ" type="text" name="dia_chi" id="address"> <span id="address_err" style="color: red;"></span>
                                <input class="account__login--input" placeholder="Số điện thoại " type="tel" name="sdt" id="sdt"> <span id="sdt_err" style="color: red;"></span>

                                <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check1">
                                            Ghi nhớ</label>
                                    </div>
                                </div>
                                <input class="account__login--btn primary__btn" type="submit" name="dangky" value="Đăng ký">

                                <div class="account__login--divide">
                                    <span class="account__login--divide__text">OR</span>
                                </div>
                                <div class="account__social d-flex justify-content-center mb-15">
                                    <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com/">Facebook</a>
                                    <a class="account__social--link google" target="_blank" href="https://www.google.com/">Google</a>
                                    <a class="account__social--link twitter" target="_blank" href="https://twitter.com/">Twitter</a>
                                </div>
                                <p class="account__login--signup__text">Bạn chưa có tài khoản?<button><a href="index.php?act=dangky"> Đăng ký ngay </a></button></p>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End login section  -->

<script>
    const hoten = document.getElementById('ho_ten');
    const ten = document.getElementById('ten_dang_nhap');
    const address = document.getElementById('dia_chi');
    const email = document.getElementById('email');
    const mk = document.getElementById('mat_khau');
    const sdt = document.getElementById('sdt');


    const hoten_err = document.getElementById('hoten_err');
    const ten_err = document.getElementById('ten_err');
    const email_err = document.getElementById('email_err');
    const mk_err = document.getElementById('mk_err');
    const address_err = document.getElementById('address_err');
    const sdt_err = document.getElementById('sdt_err');


    function validate() {
        let kt = true;
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
        if (nhaplaimk.value !== mk.value) {
            nhaplaimk_err.innerHTML = "Mật khẩu mới và mật khẩu mới lập lại phải trùng nhau"
            check = false
        } else {
            nhaplaimk_err.innerHTML = ""
        }




        return kt;
    }
</script>