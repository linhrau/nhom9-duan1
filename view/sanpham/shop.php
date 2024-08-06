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

                       <!-- Start Single Product -->
                       <div class="row">
                           <?php 
                            $i = 0;
                            foreach($dssp as $sp){
                                extract($sp);
                                $img = $img_path.$img;
                                $linksp="index.php?act=chitietsp&idsp=".$id_san_pham;
                        ?>
                           <div class="col-md-3 col-sm-6 single__pro">
                               <div class="product foo">
                                   <div class="product__inner">
                                       <div class="pro__thumb">
                                           <a href="<?php echo $linksp; ?>">
                                               <img src="<?php echo $img; ?>" alt="product images">
                                           </a>
                                       </div>
                                       <div class="product__hover__info">
                                           <ul class="product__action">
                                               <li><a data-bs-toggle="modal" data-bs-target="#productModal"
                                                       title="Quick View" class="quick-view modal-view detail-link"
                                                       href="#"><span class="ti-plus"></span></a></li>
                                               <li><a title="Add TO Cart" href="cart.html"><span
                                                           class="ti-shopping-cart"></span></a></li>
                                           </ul>
                                       </div>
                                       <div class="add__to__wishlist">
                                           <a data-bs-toggle="tooltip" title="Add To Wishlist" class="add-to-cart"
                                               href="wishlist.html"><span class="ti-heart"></span></a>
                                       </div>
                                   </div>
                                   <div class="product__details">
                                       <h2><a href="<?php echo $linksp; ?>"><?php echo $ten_san_pham; ?></a></h2>
                                       <ul class="product__price">
                                           <li class="price"><?php echo number_format($gia, 0, ',', '.').'đ'; ?></li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                           <?php 
                                $i++;
                                if($i % 4 == 0){
                                    echo '</div><div class="row">';
                                }
                            }
                            ?>
                       </div>

                       <!-- End Single Product -->
                   </div>
               </div>
           </div>
       </section>

       <!-- End Our Product Area -->