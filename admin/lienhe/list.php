<div class="content-wrapper">
  <!-- Content -->

  <div class="card">
    <h5 class="card-header">DANH SÁCH LIÊN HỆ</h5>
    <form action="index.php?act=listlienhe" method="POST" style="display:flex; margin:0 0 10px 18px; ">
      <div class="navbar-nav align-items-center" style="margin-right: 5px">
        <div class="nav-item d-flex align-items-center">
          <input type="text" name="key" class="form-control border-0 shadow-none bg-body" placeholder="Nhập id" />
          <input type="submit" value="Tìm" style=" height:36px;background: green; color: white; border: 0.5px pink">
        </div>
      </div>

    </form>
    <div class="table-responsive text-nowrap">

      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Mã</th>
            <th>Khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Nội dung</th>
            <th>Trạng Thái</th>
            <th>Lựa chọn</th>

          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php
          foreach ($listlienhe as $lienhe) {
            extract($lienhe);
            $sualh = "index.php?act=sualh&id=" . $id_lien_he;
            $xoalh = "index.php?act=xoalh&id=" . $id_lien_he;

            $ttlh = get_ttlh($lienhe["trang_thai"]);


            echo ' <tr>
                    <td>' . $id_lien_he . '</td>
                    <td> ' . $ho_ten . '</td>
                    <td>' . $email . '</td>
                    <td>' . $sdt . '</td>
                    <td>' . $noi_dung . '</td> 
                    <td>' . $ttlh . '</td>


                    <td><a href="' . $sualh . '"><i class="mdi mdi-pencil" style=" height:36px;margin: 15px; color: green"></i></a> <a href="' . $xoalh . '"> <i class="mdi mdi-delete" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')" style="color: green"></i> </a></td>
                    
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