<?php include('view/header.php'); ?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Checkout</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Checkout Area -->
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <form action="index.php?act=donhang" method="post">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="ckeckout-left-sidebar">
                        <!-- Start Checkbox Area -->
                        <div class="checkout-form">
                            <h2 class="section-title-3">Thông tin vận chuyển</h2>
                            <div class="checkout-form-inner">
                                <div class="single-checkout-box">
                                    <input value="<?= $_SESSION['user']['ho_ten'] ?? '' ?>" name="ho_ten" type="text" placeholder="Tên khách hàng">
                                    <input value="<?= $_SESSION['user']['email'] ?? '' ?>" name="email" type="email" placeholder="Email*">
                                </div>
                                <div class="single-checkout-box">
                                    <input value="<?= $_SESSION['user']['sdt'] ?? '' ?>" name="sdt" type="text" placeholder="Phone*">
                                    <input value="<?= $_SESSION['user']['dia_chi'] ?? '' ?>" name="dia_chi" type="text" placeholder="Địa chỉ*">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="checkout-right-sidebar">
                        <div class="our-important-note">
                            <h2 class="section-title-3">Chi tiết đơn hàng :</h2>
                            <div class="table-content table-responsive mt-2">
                                <?php if (!empty($_SESSION['mycart'])) {  ?>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="img">Ảnh</th>
                                                <th class="ten_san_pham">Sản Phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số Lượng</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($_SESSION['mycart'] as $cart) {
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
                                                    <td class="product-quantity"><a href="#"><?= $cart[4] ?></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <th colspan="3">Tổng thanh toán</th>
                                            <th><?= number_format($total, 0) ?> đ</th>
                                        </tfoot>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <h2 class="section-title-3">Chọn phương thức thanh toán</h2>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pttt" value="0" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Thanh toán khi nhận hàng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pttt" value="1" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Thanh toán Online
                    </label>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="payUrl" value="Đặt hàng">
        </form>
    </div>
</section>

<?php include('view/footer.php'); ?>