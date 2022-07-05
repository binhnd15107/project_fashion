<div style="max-width: 1000px;margin:200px auto 100px auto" class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <h2 style="text-align: center;">Đơn Hàng Của Bạn</h2>
            <a class="btn btn-info" href="http://localhost/huong_doi_tuong/du_an/Home/trang_san_pham/<?=$page=1?>">Thêm sản phẩm</a>

            <table class="table table-success table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <td>Mã Đơn Hàng</td>

                        <td>Tên Sản Phâm</td>
                        <td>Ảnh</td>
                        <td>Giá</td>
                        <td>Số Lượng</td>
                        <td>Tổng Tiền</td>



                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['select_deltai_bill'])) {


                        $row = $data['select_deltai_bill'];
                        //    echo '<pre>';
                        //     var_dump($row);
                        //     die();
                        $tong_all = 0;
                        foreach ($row as $value) {

                            extract($value);
                            $tong = $price * $so_luong;
                            $tong_all += $tong;
                    ?>

                            <tr style="text-align: center;">

                                <td>DON-<?= $id_bill ?></td>
                                <td><?= $ten_sp ?></td>
                                <td><img style="width:200px;height:250px" src="../../<?= $img ?>" alt=""></td>
                                <td style="color: red;"><?= number_format($price)  ?>VNĐ</td>
                                <td><?= $so_luong ?></td>
                                <td style="color: red;"><?= number_format($tong) ?>VNĐ</td>
                            </tr>

                            <?php
                                } ?>
                               
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

            <!-- phân trang -->


            <!-- end phân trang -->
        </div>
    </div>

</div>