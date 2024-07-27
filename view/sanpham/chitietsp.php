<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Chi tiết sản phẩm</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php?act=shop">Trang chủ</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="htc__product__details pt--120 pb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-sm-12">
                <div class="product__details__container">
                    <?php extract($onesp); ?>
                    <div class="product__big__images">
                        <div class="portfolio-full-image tab-content">
                            <div role="tabpanel" class="tab-pane active" id="img-tab-1">
                                <?php
                                $img = $img_path . $img;
                                echo '<img src="' . $img . '" alt="full-image">'
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-sm-12 smt-30 xmt-30">
                <div class="htc__product__details__inner">
                    <div class="pro__detl__title">
                        <h2><?= $ten_san_pham ?></h2>
                    </div>

                    <div class="pro__details">
                        <p>><?= $mo_ta_sp ?></p>
                    </div>
                    <ul class="pro__dtl__prize">
                        <li><?= number_format($gia, 0, ',', '.')  ?>đ</li>
                    </ul>

                    <div class="product-action-wrap">
                        <div class="prodict-statas"><span>Quantity :</span></div>
                        <div class="product-quantity">
                            <form id='myform' method='POST' action='#'>
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <ul class="pro__dtl__btn">
                        <li class="buy__now__btn"><a href="index.php?act=giohang" name="addcart">buy now</a></li>
                        <li><a href="#"><span class="ti-heart"></span></a></li>
                        <li><a href="#"><span class="ti-email"></span></a></li>
                    </ul>
                    <div class="pro__social__share">
                        <h2>Share :</h2>
                        <ul class="pro__soaial__link">
                            <li><a href="https://twitter.com/devitemsllc" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/devitems/" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                            <li><a href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a href="https://plus.google.com/" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>