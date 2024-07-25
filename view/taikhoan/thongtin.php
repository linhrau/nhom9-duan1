   <!-- BẮT ĐẦU TỪ ĐÂY  -->
   <!-- Start login section  -->
   <div style="margin-top:5%">
       <div class="container">
           <?php
            if (isset($_SESSION['ten_dang_nhap'])) {
                extract($_SESSION['ten_dang_nhap']);
            ?>
               <h2 class="account__content--title h3 mb-20">Thông tin tài khoản</h2>
               <section class="my__account--section section " style=" margin-bottom:10%;">
                   <div class="container">
                       <div class="my__account--section__inner border-radius-10 d-flex">
                           <div class="account__left--sidebar">

                               <ul class="account__menu">
                                   <li class="account__menu--list"><a href="index.php?act=edittaikhoan">Cập nhật tài khoản</a></li>
                                   <li class="account__menu--list "><a href="index.php?act=quenmk">Quên mật khẩu</a></li>

                                   <?php
                                    if ($role == 1) { ?>

                                       <li class="account__menu--list"><a href="admin/index.php">Đăng nhập admin </a></li>
                                   <?php }
                                    ?>
                                   <li class="account__menu--list"><a href="index.php?act=thoat">Đăng xuất</a></li>

                               </ul>
                           </div>
                           <div class="account__wrapper">
                               <div class="account__content">
                                   <h3 class="account__content--title mb-20">Thông tin</h3>
                                   <div class="account__details two">
                                       <p class="account__details--desc">Họ tên: <?= $ten_dang_nhap ?> </p>
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