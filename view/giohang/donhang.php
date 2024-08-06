  <!-- BẮT ĐẦU TỪ ĐÂY  -->
  <!-- Start checkout page area -->
  <div class="checkout__page--area" style="margin-bottom:50px">
      <div class="container">
          <div class="checkout__page--inner d-flex">
              <div class="main checkout__mian">
                  <header class="main__header checkout__mian--header mb-30">
                      <nav>
                          <ol class="breadcrumb checkout__breadcrumb d-flex">
                              <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                  <a class="breadcrumb__link" href="cart.html">Giỏ hàng</a>
                                  <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                  </svg>
                              </li>

                              <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                  <span class="breadcrumb__text current">Thông tin giao hàng</span>
                                  <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                  </svg>
                              </li>

                          </ol>
                      </nav>
                  </header>
                  <main class="main__content_wrapper">
                      <?php
                        if (isset($donhang) && (is_array($donhang))) {
                            extract($donhang);
                        }

                        ?>
                      <div class="checkout__content--step section__shipping--address pt-0">
                          <div class="section__header checkout__header--style3 position__relative mb-25">
                              <span class="checkout__order--number">Đơn hàng số LL<?= $donhang['id']; ?></span>
                              <h2 class="section__header--title h3">Cảm ơn bạn đã gửi</h2>
                              <div class="checkout__submission--icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25.995" height="25.979" viewBox="0 0 512 512">
                                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M416 128L192 384l-96-96" />
                                  </svg>
                              </div>
                          </div>
                          <div class="order__confirmed--area border-radius-5 mb-15">
                              <h3 class="order__confirmed--title h4">Đơn hàng của bạn đã được xác nhận</h3>
                              <p class="order__confirmed--desc">Bạn sẽ sớm nhận được email xác nhận kèm theo số đơn đặt hàng của bạn</p>
                          </div>
                          <div class="customer__information--area border-radius-5">
                              <h3 class="customer__information--title h4">Thông tin khách hàng</h3>
                              <div class="customer__information--inner d-flex">
                                  <div class="customer__information--list">
                                      <div class="customer__information--step">
                                          <h4 class="customer__information--subtitle h5">Thông tin liên lạc</h4>
                                          <ul>
                                              <li><a class="customer__information--text__link" href=""><?= $donhang['email']; ?></a></li>
                                          </ul>
                                      </div>
                                      <div class="customer__information--step">
                                          <h4 class="customer__information--subtitle h5">Địa chỉ giao hàng</h4>
                                          <ul>
                                              <li><span class="customer__information--text"><?= $donhang['ho_ten']; ?> </span></li>
                                              <li><span class="customer__information--text"><?= $donhang['sdt']; ?></span></li>
                                              <li><span class="customer__information--text"><?= $donhang['dia_chi']; ?></span></li>
                                          </ul>
                                      </div>
                                      <div class="customer__information--step">
                                          <h4 class="customer__information--subtitle h5">Phương thức thanh toán </h4>
                                          <ul>
                                              <li><span class="customer__information--text">Thanh toán khi nhận được hàng </span></li>

                                          </ul>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                      <div class="checkout__content--step__footer d-flex align-items-center">
                          <a class="continue__shipping--btn primary__btn border-radius-5" href="?act=listdonhang">Xem danh sách đơn hàng</a>
                      </div>
                  </main>

              </div>




              <aside class="checkout__sidebar sidebar">
                  <div class="cart__table checkout__product--table">
                      <h2 class="section__header--title h3">Chi tiết đơn hàng của bạn</h2>

                      <table class="cart__table--inner">

                          <?php foreach ($ctdonhang as $ctdonhang) : ?>

                              <tbody class="cart__table--body">
                                  <tr class="cart__table--body__items">
                                      <td class="cart__table--body__list">
                                          <div class="product__image two  d-flex align-items-center">
                                              <div class="product__thumbnail border-radius-5">
                                                  <a href="product-details.html"><img class="border-radius-5" src="<?= $ctdonhang['img'] ?>" alt="cart-product"></a>
                                                  <span class="product__thumbnail--quantity"><?= $ctdonhang['soluong'] ?></span>
                                              </div>
                                              <div class="product__description">
                                                  <h3 class="product__description--name h4"><a href=""><?= $ctdonhang['name'] ?></a></h3>
                                                  <span class="product__description--variant"><?= $ctdonhang['size'] ?></span>
                                              </div>
                                          </div>
                                      </td>
                                      <td class="cart__table--body__list">
                                          <span class="cart__price"><?= number_format($ctdonhang['tt'], 0, ',', '.') ?>đ</span>
                                      </td>
                                  </tr>

                              </tbody>
                          <?php endforeach; ?>

                      </table>
                  </div>


              </aside>
          </div>
      </div>
  </div>
  <!-- End checkout page area -->