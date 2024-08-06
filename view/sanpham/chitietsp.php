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

                    <form id='myform' method='POST' action='index.php?act=giohang'>
                        <div class="product-action-wrap">
                            <div class="prodict-statas"><span>Quantity :</span></div>
                            <div class="product-quantity">
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" name="soluong" type="text" name="qtybutton" value="02">
                                    </div>
                                    <input type="hidden" name="id_san_pham" value="<?= $id_san_pham ?>">
                                    <input type="hidden" name="img" value="<?= $img ?>">
                                    <input type="hidden" name="ten_san_pham" value="<?= $ten_san_pham ?>">
                                    <input type="hidden" name="gia" value="<?= $gia ?>">
                                </div>
                            </div>
                        </div>
                        <ul class="pro__dtl__btn">
                            <li class="buy__now__btn">
                                <input type="submit" type="text" value="Thêm vào giỏ hàng" name="addcart">
                            </li>
                            <li><a href="#"><span class="ti-heart"></span></a></li>
                            <li><a href="#"><span class="ti-email"></span></a></li>
                        </ul>
                    </form>
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

<section class="htc__product__comments pt--50 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Customer Reviews</h2>
                <div class="comment-form">
                    <form method="POST">
                        <input type="hidden" name="id_san_pham" value="<?= htmlspecialchars($id_san_pham) ?>" />
                        <input type="hidden" name="id_tai_khoan" value="<?= htmlspecialchars($id_tai_khoan) ?>" />
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select name="danh_gia" id="rating" required>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea name="noi_dung" id="comment" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>



                <div class="comment-list">
                    <h3>Comments:</h3>
                    <?php foreach ($binhluan as $comment) : ?>
                        <div class="comment">
                            <h4><?= htmlspecialchars($comment['ten_dang_nhap']) ?> -
                                <?= htmlspecialchars($comment['danh_gia']) ?> Stars</h4>
                            <p><?= htmlspecialchars($comment['noi_dung']) ?></p>
                            <small>Posted on <?= htmlspecialchars($comment['ngay_binh_luan']) ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</section>