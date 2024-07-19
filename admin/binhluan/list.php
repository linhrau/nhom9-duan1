<div class="content-wrapper">
          <!-- Content -->

          <div class="card">
            <h5 class="card-header">DANH SÁCH BÌNH LUẬN </h5>
            <div class="table-responsive text-nowrap">
           
              <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th>Mã loại</th>
                    <th>Nội dung </th>
                    <th>Đánh giá</th>
                    <th>Id tài khoản</th>
                    <th>Id sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th>Xóa </th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                 
                 <?php 
                 foreach ($listbinhluan as $binhluan){
                     extract($binhluan);
                     $xoabl="index.php?act=xoabl&id=".$id_binh_luan;
 
                    echo' <tr>
                     <td>'.$id_binh_luan.'</td>
                     <td>'.$noi_dung.'</td>
                     <td>'.$danh_gia.'</td>
                     <td>'.$id_tai_khoan.'</td>
                     <td>'.$id_san_pham.'</td>
                     <td>'.$ngay_binh_luan.'</td>
 
                     <td> <a href="'.$xoabl.'"> <i class="mdi mdi-delete" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')" style="color: green"></i> </a></td>
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