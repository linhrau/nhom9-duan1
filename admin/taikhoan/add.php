

<div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">THÊM MỚI TÀI KHOẢN</h5>
            </div>
            <div class="card-body">
            <form action="index.php?act=addtk" method="POST" onsubmit="return validate()">
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Id tài khoản</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id=""  name="id_tai_khoan" disabled />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Họ Tên</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ten"  name="ho_ten"  />

                    <span id="ten_err" style="color: red;"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Đăng Nhập</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ten"  name="ten_dang_nhap"  />

                    <span id="ten_err" style="color: red;"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Mật khẩu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mk"  name="mat_khau"  />

                    <span id="mk_err" style="color: red;"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email"  name="email"  />

                    <span id="email_err" style="color: red;"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Địa chỉ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="address"  name="dia_chi"  />

                    <span id="address_err" style="color: red;"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Điện thoại</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tel"  name="sdt"  />

                    <span id="tel_err" style="color: red;"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Quyền</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="role"  name="role"  />

                    <span id="role_err" style="color: red;"></span>
                  </div>
                </div>
               
                <div class="row mb-3">
                 

                  <div class="row mb10 " >
                  <div style="display:flex">
                    <div style="margin-right:10px"> <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI TÀI KHOẢN"style=" height:36px;background: green; color: white; border: 0.5px pink; margin-top: 10px "></div>
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
        
        const ten = document.getElementById('ten');
        const address = document.getElementById('address');
        const email = document.getElementById('email');
        const mk = document.getElementById('mk');
        const tel = document.getElementById('tel');
        const role = document.getElementById('role');



        const ten_err = document.getElementById('ten_err');
        const email_err = document.getElementById('email_err');
        const mk_err = document.getElementById('mk_err');
        const address_err = document.getElementById('address_err');
        const tel_err = document.getElementById('tel_err');
        const role_err = document.getElementById('role_err');


        function validate() {
            let kt = true;
            if (ten.value.trim() == "") {
                ten_err.innerHTML = "Bạn chưa nhập tên";
                kt = false;
            } else {
                ten_err.innerHTML = "";
            }

            if (role.value.trim() == "") {
                role_err.innerHTML = "Bạn chưa nhập tên";
                kt = false;
            } else {
                role_err.innerHTML = "";
            }

            if (address.value.trim() == "") {
                address_err.innerHTML = "Bạn chưa nhập địa chỉ";
                kt = false;
            } else {
                address_err.innerHTML = "";
            }

          
          

            let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,50})+$/;
            if (!regexEmail.test(email.value)) {
                email_err.innerHTML = "Email phải đúng định dạng!";
                kt = false;
            } else {
                email_err.innerHTML = "";
            }

            let regexMK = /^(?=.*\d).{6,}$/;
            if(!regexMK.test(mk.value)) {
                mk_err.innerHTML = "Mật khẩu  phải có ít nhất 1 kí tự số";
                kt = false
            } else {
                mk_err.innerHTML = "";
            }

            let regexTel = /^0[1-9]\d{8}$/
            if(!regexTel.test(tel.value)){
                tel_err.innerHTML="Số điện thoại chưa đúng định dạng"
                kt = false
            }else{
                tel_err.innerHTML=""

            }

            
          

            return kt;
        }
</script>