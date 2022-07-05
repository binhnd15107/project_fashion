<div style="background-color:whitesmoke;">

    <div class="container-fluid" style="opacity:0.9;max-width:1000px; margin:200px auto 100px auto">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <h2 style="text-align: center;">Giỏ Hàng</h2>
                <?php if (!isset($data['gio_hang']) || empty($data['gio_hang'])) { ?>
                    <div style="text-align: center;">
                        <h3>Giỏ hàng trống <i class="fas fa-sad-tear"></i> </h3>
                    </div>
                <?php      } ?>
                <a class="btn btn-info" href="http://localhost/huong_doi_tuong/du_an/Home/trang_san_pham/<?= $page = 1 ?>">Thêm sản phẩm</a>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td>Giá</td>
                            <td>Số Lượng</td>
                            <td>Size</td>
                            <td>ảnh</td>
                            <td>Tổng Tiền</td>
                            <td>Action</td>
                        </tr>
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
                                <tr>

                                    <td><?= $ten_sp ?></td>
                                    <td style=" color:red"><?= number_format($gia) ?> VNĐ</td>
                                    <td>
                                        <form action="http://localhost/huong_doi_tuong/du_an/Home/update_cart/<?= $id_products ?><?= $size ?>" method="POST">
                                            <input type="hidden" name="action" value="add">
                                            <input type="number" name="update_quantity" style="color:red" value="<?= $so_luong ?>">
                                            <input type="submit" value="Cập nhật">
                                        </form>
                                    </td>
                                    <td><?= $size ?></td>
                                    <td><img style="width:150px;height:200px" src="./../<?= $img ?>" alt=""></td>
                                    <td style=" color:red"><?= number_format($gia * $so_luong) ?> VNĐ</td>
                                    <td><a class='btn btn-danger' onclick="return window.confirm('bạn có muốn sản phẩm không')" href="http://localhost/huong_doi_tuong/du_an/Home/delete_cart/<?= $id_products ?><?= $size ?>">Xóa</a></td>
                                    <?php $biendem += 1; ?>
                                </tr>


                        <?php
                            }
                        } ?>
                        <tr>
                            <td>Tổng <?= $so_luong_hang ?> Sản phẩm</td>

                        </tr>
                        <tr>
                            <td>
                                Tổng Hóa Đơn: <?= number_format($tong);

                                                ?>VNĐ

                            </td>
                        </tr>

                    </tbody>
                </table>
                <?php if (isset($data['gio_hang']) && !empty($data['gio_hang'])) { ?>
                    <div style="text-align: center;">
                        <a class='btn btn-primary' href="http://localhost/huong_doi_tuong/du_an/Home/bill_cart">Đặt Hàng</a>
                    </div>
                <?php      } ?>

                <!-- phân trang -->


                <!-- end phân trang -->
            </div>
        </div>

    </div>
</div>