<div class="contaier">
    <video id="video_background" src=".././public/assets/img/KampampK-Fashion-fdown.net.mp4" preload="auto" autoplay loop muted></video>
    <div class="login-form">
        <h2 style="text-align:center;">ĐĂNG KÍ TÀI KHOẢN</h2>

        <form method="POST" action="http://localhost/huong_doi_tuong/du_an/login/insert_login" enctype="multipart/form-data">
            <?php if (isset($_SESSION['check_login'])) { ?>
               
                <div style="background-color:#ffff;opacity:0.7;padding:10px">
                    <h4 style="text-align: center;color:red">
                    <?= $_SESSION['check_login'];
                unset($_SESSION['check_login'])
                ?>
                  <i class="fas fa-sad-tear"></i>  </h4>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ Tên</label>
                <input type="text" name="ten_kh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="matkhau" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                <input type="number" name="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ảnh Đại Diện</label>
                <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <?php if (isset($data['insert_tk'])) {
                $data['insert_tk'] == true;
            ?>
            <div>
            <a style="transform: translateX(230px); margin-bottom:15px" class='btn btn-primary' href="http://localhost/huong_doi_tuong/du_an/login/"> Đăng Nhập</a>
            </div>
               
                <?php } else { ?>
  <button type="submit" style="transform: translateX(220px); margin-bottom: 10px;" class="btn btn-primary">Đăng Kí</button>
           <?php     } ?>
          
            <?php if (isset($data['insert_tk'])) {
                $data['insert_tk'] == true;
            ?>
                <div style="background-color:#ffff;opacity:0.7;padding:10px">
                    <h4 style="text-align: center;color:darkgreen">

                        đăng kí thành công <i class="fas fa-thumbs-up"></i>
                    </h4>
                </div>
                <?php } ?>
        </form>
    </div>
</div>