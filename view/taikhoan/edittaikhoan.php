<!-- BẮT ĐẦU TỪ ĐÂY  -->
<!-- Start login section  -->
<style>
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

    .section--padding {
        padding: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .login__section--inner {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .account__login {
        width: 100%;
    }

    .account__login--header__title {
        color: #333;
        margin-top: 8%;
    }

    .account__login--input {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .account__login--btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .account__login--btn:hover {
        background-color: #0056b3;
    }



    /* Responsive */
    @media (max-width: 768px) {
        .login__section--inner {
            flex-direction: column;
        }

        .account__login {
            width: 100%;
        }
    }
</style>
<h3 style="color:red">
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
</h3>
<div class="login__section section--padding" style="margin-right: 2.5%; ">
    <div class="container">

        <div class="login__section--inner" style="width:1200px">
            <div class="row row-cols-md-2 row-cols-1">
                <div class="col">

                    <div class="account__login" style="width:1200px">
                        <div class="account__login--header ">
                            <h2 class="account__login--header__title ">CẬP NHẬT TÀI KHOẢN</h2>
                        </div>

                        <div class="account__login--inner">
                            <?php
                            if (isset($_SESSION['ten_dang_nhap']) && (is_array($_SESSION['ten_dang_nhap']))) {
                                extract($_SESSION['ten_dang_nhap']);
                                // echo '<pre>';
                                // print_r($_SESSION);
                                // echo '</pre>';
                            }
                            ?>
                            <form action="index.php?act=edittaikhoan" method="POST" onsubmit="return validate()">

                                <input class="account__login--input" placeholder="Tên tài khoản " type="text" name="ho_ten" value="<?= $ho_ten ?>" id="hoten"><br>
                                <span id="hoten_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Tên tài khoản " type="text" name="ten_dang_nhap" value="<?= $ten_dang_nhap ?>" id="ten"><br>
                                <span id="ten_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Mật khẩu " type="password" name="mat_khau" value="<?= $mat_khau ?>" id="mk"><br>
                                <span id="mk_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Email " type="email" name="email" value="<?= $email ?>" id="email"><br>
                                <span id="email_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Địa chỉ" type="text" name="dia_chi" value="<?= $dia_chi ?>" id="address"><br>
                                <span id="address_err" style="color: red;"></span>

                                <input class="account__login--input" placeholder="Số điện thoại " type="tel" name="sdt" value="<?= $sdt ?>" id="sdt"><br>
                                <span id="sdt_err" style="color: red;"></span>

                                <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check1">
                                            Ghi nhớ</label>
                                    </div>
                                </div>
                                <input type="hidden" name="id_tai_khoan" value="<?= $id_tai_khoan ?>">
                                <input class="account__login--btn primary__btn" type="submit" name="capnhat" value="Cập nhật">


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
    const hoten = document.getElementById('hoten');
    const ten = document.getElementById('ten');
    const address = document.getElementById('address');
    const email = document.getElementById('email');
    const mk = document.getElementById('mk');
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
            mk_err.innerHTML = "Mật khẩu ít nhất 6 kí tự phải có ít nhất 1 kí tự số";
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