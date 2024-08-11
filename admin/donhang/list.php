<div class="content-wrapper">
  <!-- Content -->

  <div class="card">
    <h5 class="card-header">DANH SÁCH ĐƠN HÀNG</h5>
    <form action="index.php?act=listdonhang" method="POST" style="display:flex; margin:0 0 10px 18px; ">
      <div class="navbar-nav align-items-center" style="margin-right: 5px">
        <div class="nav-item d-flex align-items-center">
          <input type="text" name="key" class="form-control border-0 shadow-none bg-body" placeholder="Nhập mã đơn hàng" />
          <input type="submit" value="Tìm" style=" height:36px;background: green; color: white; border: 0.5px pink">
        </div>
      </div>

    </form>
    <div class="table-responsive text-nowrap">

      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Số lượng hàng</th>
            <th>Giá trị đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Tình trạng đơn</th>
            <th>Lựa chọn</th>

          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php
          foreach ($listdonhang as $donhang) { // gtri và bảng danhmuc
            extract($donhang); //xô dl ra
            $suadh = "index.php?act=suadh&id=" . $id_hoa_don;
            $xoadh = "index.php?act=xoadh&id=" . $id_hoa_don;

            $countsp = loadall_ctdonhang_count($donhang["id_hoa_don"]);
            $ttdh = get_ttdh($donhang["trang_thai"]);



            echo ' <tr>
                    <td>LL' . $donhang['id_hoa_don'] . '</td>
                    <td> ' . $ho_ten . '</td>
                    <td>' . $countsp . '</td>
                    <td>' . number_format($donhang['tong_tien'], 0, ',', '.') . 'đ</td>
                    <td>' . $donhang['ngay_dat_hang'] . '</td>
                    <td>' . $ttdh . '</td>

                    <td><a href="' . $suadh . '"><i class="mdi mdi-pencil" style=" height:36px;margin: 15px; color: green"></i></a> </td>
                    </tr>';
          }
          ?>

        </tbody>
      </table>

    </div>
  </div>
  <!-- / Content -->

  <!-- Footer -->


  <div class="content-backdrop fade"></div>
</div>