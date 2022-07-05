<?php if (isset($_SESSION['introduce_tk'])) {

    $introduce_tk = $_SESSION['introduce_tk'];
    extract($introduce_tk);
?>
    <div class="introduce">

        <h2>Xin chào <?= $user ?></h2>
        <div class='contro'>
            <div>
                <img style="width:250px;height:350px" src=".././<?= $img ?>" alt="">
                <div style="margin-top: 15px;">
                    <ul class='menu_tk'>
                        <?php if ($vai_tro == 0) { ?>
                            <li><a href="http://localhost/huong_doi_tuong/du_an/Home/show_cart/<?=$id?>"> Đơn Hàng</a></li>
                        <?php   } ?>

                        <li> <a onclick="return window.confirm('bạn có muốn sửa khôg')" href="http://localhost/huong_doi_tuong/du_an/login/edit_tk/<?= $id ?>">Cập Nhật tài Khoản</a></li>
                        <li><a href="http://localhost/huong_doi_tuong/du_an/login/edit_mk/<?= $id ?>"> Đổi Mật Khẩu</a></li>

                        <?php if ($vai_tro == 1) { ?>
                            <li> <a href="http://localhost/huong_doi_tuong/du_an/admin/view_products">Quản lí admin</a></li>
                        <?php   } ?>
                        <li> <a onclick="return window.confirm('bạn có muốn đăng xuất khôg')" href="http://localhost/huong_doi_tuong/du_an/login/unset_login">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <div>
                    <?php if (isset($_SESSION['edit_tk'])) {
                        $row_login = $_SESSION['edit_tk'];
                        unset($_SESSION['edit_tk']);
                        extract($row_login);
                    ?>
                        <div class="login-form">
                            <h5 style="text-align:center;">CẬP NHẬT TÀI KHOẢN</h5>

                            <form method="POST" action="http://localhost/huong_doi_tuong/du_an/login/update_tk" enctype="multipart/form-data">
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
                                    <input type="hidden" value="<?= $id ?>" name="id">
                                    <label for="exampleInputEmail1" class="form-label">Họ Tên</label>
                                    <input type="text" value="<?= $user ?>" name="ten_kh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" value="<?= $email ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                    <input type="text" value="<?= $dia_chi ?>" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                    <input type="number" name="tel" value="<?= $tel ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ảnh Đại Diện</label>
                                    <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <button type="submit" style="transform: translateX(220px); margin-bottom: 10px;" class="btn btn-primary">Cập Nhật</button>
                            </form>
                        </div>
                    <?php } elseif (isset($_SESSION['edit_mk'])) {
                        $edit_mk = $_SESSION['edit_mk'];

                        unset($_SESSION['edit_mk']);

                        extract($edit_mk);  ?>
                        <div class="login-form">
                            <h5 style="text-align:center;">Đổi mật khẩu</h5>

                            <form method="POST" action="http://localhost/huong_doi_tuong/du_an/login/update_mk">
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
                                    <input type="hidden" value="<?= $id ?>" name="id">
                                    <input type="hidden" value="<?= $mat_khau ?>" name="mk">
                                    <label for="exampleInputEmail1" class="form-label">Nhập mật khẩu cũ</label>
                                    <input type="passwork" name="mat_khau_cu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">

                                    <label for="exampleInputEmail1" class="form-label">Nhập mật khẩu mới</label>
                                    <input type="text" name="mat_khau_moi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div> <button type="submit" style="transform: translateX(220px); margin-bottom: 10px;" class="btn btn-primary">Cập Nhật</button>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div>
                            <h3> Thông Tin của bạn</h3>
                            <ul class='menu_tkk'>
                                <li>Email:<?= $email ?></li>
                                <li>Phone number:<?= $tel ?></li>
                                <li>Address:<?= $dia_chi ?></li>

                            </ul>
                        </div>
                    <?php   } ?>




                </div>

            </div>
        </div>


    </div>
<?php } else {
    header('location:http://localhost/huong_doi_tuong/du_an/login/');
} ?>