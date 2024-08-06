<div class="col-xxl">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">CẬP NHẬT THÔNG TIN ĐƠN HÀNG</h5>
    </div>
    <div class="card-body">
      <form action="index.php?act=updatedh" method="POST">
        <?php
        if (is_array($donhang)) {
          extract($donhang); //xô dl ra                            
          $countsp = loadall_ctdonhang_count($donhang["id_hoa_don"]);
          $ttdh = get_ttdh($donhang["trang_thai"]);
        }
        ?>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Mã Hóa Đơn</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="id" value="<?= $donhang['id_hoa_don'] ?>" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên khách hàng</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="user" value="<?= $donhang['ho_ten'] ?>" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Số lượng</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="" name="soluong" value="<?= $countsp ?>" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Giá trị đơn</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="tongtien" value="<?= $donhang['tong_tien'] ?>" />
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Ngày đặt </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="tongtien" value="<?= $donhang['ngay_dat_hang'] ?>" />
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Tình trạng đơn hàng </label>
          <div class="col-sm-10">
            <select class="form-control" name="trang_thai">
              <?php
              $status_array = [
                0 => "Đơn hàng mới",
                1 => "Đang xử lý",
                2 => "Đang giao hàng",
                3 => "Đã giao hàng"
              ];
              // Kiểm tra nếu không có sửa đổi nào thì chọn giá trị mặc định
              $current_status = $donhang['trang_thai']; // Giả định là giá trị ban đầu
              $changed = false; // Biến để kiểm tra xem có sửa đổi nào không
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                foreach ($_POST as $key => $value) {
                  if ($key !== 'update' && $value !== $donhang[$key]) {
                    $changed = true;
                    break;
                  }
                }
              }
              foreach ($status_array as $key => $value) {
                if ($current_status == 1 && $key < 1 || $current_status == 2 && $key < 2 || $current_status == 3 && $key < 3) {
                  continue; // Bỏ qua việc tạo option cho các trạng thái không thể chuyển được
                }
                $selected = ($key == $current_status && !$changed) ? 'selected' : '';
                echo "<option value='$key' $selected>$value</option>";
              }
              ?>
            </select>
          </div>

        </div>
        <input type="hidden" name="id_hoa_don" value="<?= $id_hoa_don ?>">


        <div class="row mb10 ">
          <div style="display:flex">

            <div style="margin-right:10px"> <input class="mr20" type="submit" name="update" value="CẬP NHẬT" style=" height:36px;background: green; color: white; border: 0.5px pink; margin-top: 10px "></div>
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