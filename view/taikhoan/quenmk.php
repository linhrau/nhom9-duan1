<!-- BẮT ĐẦU TỪ ĐÂY  -->
<!-- Start login section  -->
<style>
    .col {
        margin-top: 12%;
    }

    /* Reset CSS */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .login__section {
        width: 100%;
        max-width: 1600px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }


    .account__login {
        padding: 20px;
    }

    .account__login--header__title {
        color: #333;
    }

    .account__login--input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
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

    .account__login--divide {
        text-align: center;
        margin: 10px 0;
    }

    .account__social--link {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 5px;
        color: #333;
        text-decoration: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .account__social--link:hover {
        background-color: #f0f0f0;
    }

    h3 {
        margin-top: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .login__section {
            width: 90%;
            margin: 0 auto;
        }
    }
</style>

<div class="login__section section--padding" style="margin-right: 2.5%; ">
    <div class="container">

        <div class="login__section--inner" style="width:1200px">
            <div class="row row-cols-md-2 row-cols-1">
                <div class="col">

                    <div class="account__login" style="width:1200px">
                        <div class="account__login--header mb-25">
                            <h2 class="account__login--header__title h3 mb-10">QUÊN MẬT KHẨU</h2>
                        </div>

                        <div class="account__login--inner">

                            <form action="index.php?act=quenmk" method="POST" onsubmit="return validate()">



                                <input class="account__login--input" placeholder="Nhập vào Email của bạn " type="" name="email" id="email"><br>
                                <span id="email_err" style="color: red;"></span>
                                <h3 style="color:red">
                                    <?php
                                    if (isset($thongbao) && ($thongbao != "")) {
                                        echo $thongbao;
                                    }
                                    ?>
                                </h3>
                                <br>


                                <input class="account__login--btn primary__btn" type="submit" value="Gửi" name="guiemail">


                                <div class="account__login--divide">
                                    <span class="account__login--divide__text">OR</span>
                                </div>
                                <div class="account__social d-flex justify-content-center mb-15">
                                    <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com/">Facebook</a>
                                    <a class="account__social--link google" target="_blank" href="https://www.google.com/">Google</a>
                                    <a class="account__social--link twitter" target="_blank" href="https://twitter.com/">Twitter</a>
                                </div>
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
    const email = document.getElementById('email');

    const email_err = document.getElementById('email_err');

    function validate() {
        let kt = true;

        let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,50})+$/;
        if (!regexEmail.test(email.value)) {
            email_err.innerHTML = "Email phải đúng định dạng!";
            kt = false;
        } else {
            email_err.innerHTML = "";
        }
        return kt;
    }
</script>