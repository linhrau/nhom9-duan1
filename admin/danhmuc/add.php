<style>
  .loi {
    color: red;
  }
</style>

<div class="col-xxl">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">THÊM MỚI DANH MỤC</h5>
    </div>
    <div class="card-body">
      <form action="index.php?act=adddm" method="POST">

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Mã danh mục</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="maloai" disabled />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên danh mục</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="tenloai" />
            <span class="loi"><?php echo $errtenloai ?></span> <br>

          </div>
        </div>

        <div class="row mb-3">


          <div class="row mb10 ">
            <div style="display:flex">
              <div style="margin-right:10px"> <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI DANH MỤC" style=" height:36px;background: green; color: white; border: 0.5px pink; margin-top: 10px "></div>
              <div><input class="mr20" type="reset" value="NHẬP LẠI" style=" height:36px;background: green; color: white; border: 0.5px pink; margin-top: 10px "></div>

            </div>

          </div>

          <?php
          if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
          }
          ?>
      </form>
    </div>
  </div>
</div>