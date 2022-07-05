<div class="container">
  <video id="video_background" src=".././public/assets/img/video2.mp4" preload="auto" autoplay loop muted></video>
  <?php if (isset($_SESSION['quen_mk'])) {
    unset($_SESSION['quen_mk']);
  ?>
    <div class="login" style="height: 400px;">
      <h2 style="text-align:center;">Nhập Email Của Bạn</h2>
      <form method="POST" action="http://localhost/huong_doi_tuong/du_an/login/edit_quen_mk">
        <?php if (isset($_SESSION['check_login'])) { ?>

          <div style="background-color:#ffff;opacity:0.7;padding:10px">
            <h4 style="text-align: center;color:red">
              <?= $_SESSION['check_login'];
              unset($_SESSION['check_login'])
              ?>
              <i class="fas fa-sad-tear"></i>
            </h4>
          </div>
        <?php } ?>
        <?php if (isset($_SESSION['mk'])) { ?>

          <div style="background-color:#ffff;opacity:0.7;padding:10px">
            <h4 style="text-align: center;color:darkgreen">
              <?= $_SESSION['mk'];
              ?>
              <i class="fas fa-grin-wink"></i>
            </h4>
          </div>
        <?php } ?>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <?php if (isset($_SESSION['mk'])) { ?>


          <a style="transform: translateX(220px); margin-bottom: 10px;" href="http://localhost/huong_doi_tuong/du_an/login/" class='btn btn-primary'>Đăng Nhập</a>
        <?php unset($_SESSION['mk']);
        } else { ?>
          <button type="submit" style="transform: translateX(220px); margin-bottom: 10px;" class="btn btn-primary">Submit</button>
        <?php   } ?>

      </form>

    </div>
  <?php } else { ?>

    <div class="login">
      <h2 style="text-align:center;">ĐĂNG NHẬP TÀI KHOẢN</h2>
      <form method="POST" action="http://localhost/huong_doi_tuong/du_an/login/check_login/">
        <?php if (isset($_SESSION['check_login'])) { ?>

          <div style="background-color:#ffff;opacity:0.7;padding:10px">
            <h4 style="text-align: center;color:red">
              <?= $_SESSION['check_login'];
              unset($_SESSION['check_login'])
              ?>
              <i class="fas fa-sad-tear"></i>
            </h4>
          </div>
        <?php } ?>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="mat_khau" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" style="transform: translateX(220px); margin-bottom: 10px;" class="btn btn-primary">Đăng Nhập</button>

      </form>
      <h4><a class='btn btn-warning btn-lgr' href="http://localhost/huong_doi_tuong/du_an/login/quen_mk">Quên mật Khẩu</a></h4>

      <h4><a class='btn btn-success' href="http://localhost/huong_doi_tuong/du_an/login/login_form">Đăng kí</a></h4>
    </div>
  <?php } ?>
</div>