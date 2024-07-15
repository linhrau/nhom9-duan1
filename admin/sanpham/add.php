


<div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">THÊM MỚI SẢN PHẨM</h5>
            </div>
            <div class="card-body">
              <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Danh mục</label>
                  <div class="col-sm-10">
                    <div class="form-floating form-floating-outline mb-4">
                        <select class="form-select" name="id_danh_muc" id="" aria-label="Default select example">
                        <option value="0" selected>Tất cả danh mục</option>
                        <?php
                                    foreach ($listdanhmuc as $danhmuc){
                                        extract($danhmuc);
                                        echo'<option value="'.$id_danh_muc.'">'.$ten_danh_muc.'</option>';
                                    }
                                ?>

                        </select>
                      </div>
          
           
                  </div>

                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Tên sản phẩm</label> 
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" placeholder="nhập vào tên sp" />  <span id="ten_san_pham_err" style="color: red;"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Giá</label>  
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="gia" name="gia" placeholder="nhập vào giá của sản phẩm" /><span id="giaerr" style="color: red;"></span>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-message">Mô tả </label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                     
                      <textarea name="mo_ta_sp" id="mo_ta_sp" class="form-control"
                      
                        aria-describedby="basic-icon-default-message2"></textarea>
                    </div>
                    <span id="mo_ta_sp_err" style="color: red;"></span>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-message">Thêm ảnh sản phẩm</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="file" class="form-control" id="hinh" name="hinh"/> 
                      <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <span id="hinh_err" style="color: red;"></span>
                  </div>

                  <div class="row mb10 " >
                  <div style="display:flex">
                    <div style="margin-right:10px"> <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI SẢN PHẨM"style=" height:36px;background: green; color: white; border: 0.5px pink; margin-top: 10px "></div>
                    <div><input class="mr20" type="reset" value="NHẬP LẠI"style=" height:36px;background: green; color: white; border: 0.5px pink; margin-top: 10px "></div>

                  </div>

                  </div>
                 
                <?php
                  if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                  }
                ?>
              </form>
            </div>
          </div>
        </div>


        
    <script>
        
        const ten_san_pham = document.getElementById('ten_san_pham');
        const gia = document.getElementById('gia');
        const mau = document.getElementById('mau');
        const mo_ta_sp = document.getElementById('mo_ta_sp');
        const hinh = document.getElementById('hinh');


        const ten_san_pham_err = document.getElementById('ten_san_pham_err');
        const gia_err = document.getElementById('gia_err');
        const mau_err = document.getElementById('mau_err');
        const mo_ta_sp_err = document.getElementById('mo_ta_sp_err');
        const hinh_err = document.getElementById('hinh_err');

      


        function validate() {
            let kt = true;

            if (ten.value.trim() == "") {
                ten_err.innerHTML = "Bạn chưa nhập tên";
                kt = false;
            } else {
                ten_err.innerHTML = "";
            }

            if (gia.value.trim() == "") {
                gia_err.innerHTML = "Bạn chưa nhập giá";
                kt = false;
            } else {
                gia_err.innerHTML = "";
            }

            if (mau.value.trim() == "") {
                mau_err.innerHTML = "Bạn chưa nhập màu";
                kt = false;
            } else {
                giamoi_err.innerHTML = "";
            }


            if (mo_ta_sp.value.trim() == "") {
                mo_ta_sp_err.innerHTML = "Bạn chưa nhập mô tả";
                kt = false;
            } else {
                mo_ta_sp_err.innerHTML = "";
            }

           
          
            if (hinh.value.trim() == "") {
                hinh_err.innerHTML = "Bạn chưa chọn hình";
                kt = false;
            } else {
               hinh_err.innerHTML = "";
            }
          

          

            
          

            return kt;
        }

    </script>