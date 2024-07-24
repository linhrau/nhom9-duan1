       <!-- Start Slider Area -->
       <div class="slider__container slider--one slider__new">
           <div class="slider__activation__wrap owl-carousel owl-theme">
               <!-- Start Single Slide -->
               <div class="animation__style02 slide slider__full--screen"
                   style="background: rgba(0, 0, 0, 0) url(uniqlo/uniqlo/images/slider/bg/5.jpg) no-repeat scroll center center / cover ;">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                               <div class="slider__content">
                                   <h1>Furniture <br> </h1>
                                   <h2><span class="text--theme">unique </span> Style.</h2>
                                   <p>Whether you adore a classic blueblood aesthetic or a downhome décor, you can find
                                       a wenro sofa to suit your desires perfectly.</p>
                                   <div class="uniq__btn">
                                       <a class="htc__btn" href="cart.html">shop now</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- End Single Slide -->
           </div>
       </div>
       <!-- Start Slider Area -->
       <!-- Start Banner Area -->
       <section class="uniq__banner__area bg__white pt--100">
           <div class="container">
               <div class="row">
                   <!-- Start Single Banner -->
                   <div class="col-lg-6 col-md-6 col-sm-12">
                       <div class="banner">
                           <div class="thumb">
                               <a href="#"><img src="uniqlo/uniqlo/images/new-product/3.jpg" alt=""></a>
                           </div>
                           <div class="content">
                               <h6>30% off</h6>
                               <h2><a href="#">New Collection</a></h2>
                               <a class="htc__btn shop__now__btn" href="#">shop now</a>
                           </div>
                       </div>
                   </div>
                   <!-- End Single Banner -->
                   <!-- Start Single Banner -->
                   <div class="col-lg-6 col-md-6 col-sm-12 xmt-40">
                       <div class="banner">
                           <div class="thumb">
                               <a href="#"><img src="uniqlo/uniqlo/images/new-product/4.jpg" alt=""></a>
                           </div>
                           <div class="content">
                               <h6>50% off</h6>
                               <h2><a href="#">Chair Collection</a></h2>
                               <a class="htc__btn shop__now__btn" href="#">shop now</a>
                           </div>
                       </div>
                   </div>
                   <!-- End Single Banner -->
               </div>
           </div>
       </section>
       <!-- Start Banner Area -->
       <!-- Start Our Product Area -->
       <section class="htc__product__area ptb--130 bg__white">
           <div class="container">
               <div class="htc__product__container">
                   <!-- Start Product MEnu -->
                   <div class="row">
                       <div class="col-md-12">
                           <div class="product__menu">
                               <button data-filter="*" class="is-checked">All</button>
                               <button data-filter=".cat--1">Furnitures</button>
                               <button data-filter=".cat--2">Bags</button>
                               <button data-filter=".cat--3">Decoration</button>
                               <button data-filter=".cat--4">Accessories</button>
                           </div>
                       </div>
                   </div>
                   <!-- End Product MEnu -->
                   <div class="row product__list">
                       <?php
                        if (isset($dssp) && is_array($dssp)) {
                            foreach ($dssp as $product) {
                                $id_san_pham = htmlspecialchars($product['id_san_pham']);
                                $ten_san_pham = htmlspecialchars($product['ten_san_pham']);
                                $hinh_anh = htmlspecialchars($product['img']);
                                $gia = htmlspecialchars($product['gia']);
                                $mo_ta_sp = htmlspecialchars($product['mo_ta_sp']);

                                echo '<div class="col-md-4 single__pro col-lg-3 cat--1 col-sm-12">';
                                echo '    <div class="product foo">';
                                echo '        <div class="product__inner">';
                                echo '            <div class="pro__thumb">';
                                echo '                <a href="product-details.php?id_san_pham=' . $id_san_pham . '">';
                                echo '                    <img src="img/' . $hinh_anh . '" alt="' . $ten_san_pham . '">';
                                echo '                </a>';
                                echo '            </div>';
                                echo '            <div class="product__hover__info">';
                                echo '                <ul class="product__action">';
                                echo '                    <li><a data-bs-toggle="modal" data-bs-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>';
                                echo '                    <li><a title="Add TO Cart" href="cart.php"><span class="ti-shopping-cart"></span></a></li>';
                                echo '                </ul>';
                                echo '            </div>';
                                echo '            <div class="add__to__wishlist">';
                                echo '                <a data-bs-toggle="tooltip" title="Add To Wishlist" class="add-to-cart" href="wishlist.php"><span class="ti-heart"></span></a>';
                                echo '            </div>';
                                echo '        </div>';
                                echo '        <div class="product__details">';
                                echo '            <h2><a href="index.php?act=chitietsp&id_san_pham=' . $id_san_pham . '">' . htmlspecialchars($ten_san_pham) . '</a></h2>';
                                echo '            <ul class="product__price">';
                                echo '                <li class="new__price">' . number_format($gia, 0, ',', '.') . 'đ</li>';
                                echo '            </ul>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No products available in this category.</p>';
                        }
                        ?>
                   </div>
               </div>
           </div>
       </section>

       <!-- End Our Product Area -->