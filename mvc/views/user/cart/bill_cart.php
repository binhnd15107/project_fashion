<div style="background-color:whitesmoke;">
    <div class="container-fluid" style="opacity:0.9;max-width:1000px; margin:200px auto 100px auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a style="margin-bottom: 30px;" class="btn btn-info" href="http://localhost/huong_doi_tuong/du_an/"><i class="fas fa-angle-double-left"></i></a>
            </div>

            <form action="http://localhost/huong_doi_tuong/du_an/Home/hoa_don_chi_tiet" method="POST">
                <div class='cart-body' style="padding: 20px;max-width: 500px;
               margin: auto;    border: 1px solid black;
             border-radius: 10px;
              box-shadow: 2px 2px 2px black;">
                    <?php if (isset($_SESSION['check_kq'])) { ?>

                        <div style="background-color:#ffff;opacity:0.7;padding:10px">
                            <h4 style="text-align: center;color:darkgreen">
                                <?= $_SESSION['check_kq'];
                                unset($_SESSION['check_kq']);

                                ?>
                                <i class="far fa-laugh-wink"></i>
                            </h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['check_introduce_bill'])) { ?>

                        <div style="background-color:#ffff;opacity:0.7;padding:10px">
                            <h4 style="text-align: center;color:red">
                                <?= $_SESSION['check_introduce_bill'];
                                unset($_SESSION['check_introduce_bill'])
                                ?>
                                <i class="fas fa-sad-tear"></i>
                            </h4>
                        </div>
                    <?php } ?>
                    <h2 style="text-align: center;">Thông tin Của Bạn</h2>

                    <div>
                        <input type="hidden" value="<?= $_SESSION['introduce_tk']['id'] ?> " size="40">
                    </div>
                    <br>
                    <div>
                        <span style="color: black;font-size: 20px;font-weight: bold; ">Khách Hàng:</span> <input style="padding:10px;border-radius: 10px;" type="text" name="user_tk" size="40" value="<?= $_SESSION['introduce_tk']['user'] ?>">
                    </div>
                    <br>
                    <div>
                        <span style="color: black;font-size: 20px;font-weight: bold; ">Địa Chỉ:</span> <input style="padding:10px;border-radius: 10px;" type="text" name="dia_chi" size="45" value="<?= $_SESSION['introduce_tk']['dia_chi'] ?>">
                    </div>
                    <br>
                    <div>
                        <span style="color: black;font-size: 20px;font-weight: bold; ">Sdt:</span> <input style="padding:10px;border-radius: 10px;" type="text" name="tel" size="50" value="<?= $_SESSION['introduce_tk']['tel'] ?>">
                    </div>
                    <br>
                    <div>
                        <span style="color: black;font-size: 20px;font-weight: bold; ">Ghi chú:</span> <textarea name="ghi_chu" id="" cols="50" rows="5"></textarea>
                    </div>


                </div>
                <div class="card-body">
                    <?php if (isset($data['gio_hang'])) { ?>
                        <h2 style="text-align: center;">Đơn Hàng Của Bạn</h2>

                    <?php } else { ?>
                        <h2 style="text-align: center;">Đơn hàng đã được đặt </h2>
                    <?php } ?>


                    <table class="table table-success table-striped">
                        <thead>
                            <?php if (isset($data['gio_hang'])) { ?>
                                <tr style="text-align: center;">

                                    <td>Tên sản phẩm</td>
                                    <td>Giá</td>
                                    <td>Số Lượng</td>
                                    <td>Size</td>
                                    <td>ảnh</td>
                                    <td>Tổng Tiền</td>

                                </tr>
                            <?php } ?>

                        </thead>
                        <tbody>
                            <?php if (isset($data['gio_hang'])) {
                                $row = $data['gio_hang'];

                                //    echo '<pre>';
                                //         var_dump($row);
                                //         die();
                                $tong = 0;
                                $so_luong_hang = 0;
                                $biendem = 0;
                                foreach ($row as $value) {

                                    extract($value);

                                    $so_luong_hang = $so_luong_hang + $so_luong;
                                    $tong = $tong + ($gia * $so_luong);

                            ?>

                                    <tr style="text-align: center;">

                                        <td><?= $ten_sp ?></td>
                                        <td style=" color:red"><?= number_format($gia) ?> VNĐ</td>
                                        <td style="text-align: center;">
                                            <?= $so_luong ?>

                                            <!-- <input type="hidden" name="action" value="add">
                                            <input type="number" name="update_quantity" style="color:red" value="">
                                            <input type="submit" value="Cập nhật"> -->

                                        </td>
                                        <td><?= $size ?></td>
                                        <td><img style="width:150px;height:200px" src="./../<?= $img ?>" alt=""></td>
                                        <td style=" color:red"><?= number_format($gia * $so_luong) ?> VNĐ</td>

                                        <?php $biendem += 1; ?>
                                    </tr>


                                <?php
                                } ?>
                                <tr>

                                    <td>Tổng <?= $so_luong_hang ?> Sản phẩm</td>

                                </tr>
                                <tr>
                                    <td>
                                        Tổng Hóa Đơn: <?= number_format($tong);
                                                        $_SESSION['tong_tien'] = $tong;
                                                        ?>VNĐ
                                    </td>
                                </tr>

                            <?php

                            } ?>


                        </tbody>
                    </table>
                    <?php if (isset($data['gio_hang'])) { ?>
                        <div style="text-align: center;">
                            <button class='btn btn-primary'> Thanh Toán</button>
                        </div>
                    <?php } ?>


                    <!-- phân trang -->


                    <!-- end phân trang -->
                </div>
            </form>
        </div>

    </div>
</div>