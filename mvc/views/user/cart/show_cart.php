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
                        <td>Số Lượng</td>
                        <td>Ngày Đặt Hàng</td>
                        <td>Tổng Tiền</td>
                        <td>Trạng Thái</td>
                        <td>Chi Tiết</td>
                        <td></td>


                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['select_bill'])) {


                        $row = $data['select_bill'];

                        foreach ($row as $value) {

                            extract($value);

                    ?>

                            <tr style="text-align: center;">

                                <td>DON-<?= $id_bill ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $ngay_dat_hang ?></td>
                                <td style="color: red;"><?= number_format($tong_tien) ?>VNĐ</td>
                                <td><?php if ($trang_thai == 0) {
                                        echo 'Chưa xác nhận';
                                    } elseif ($trang_thai == 1) {
                                        echo 'Đang giao';
                                    } else {
                                        echo 'Đã giao hàng';
                                    }
                                    ?>


                                </td>
                                <td><a class="btn btn-info" href="http://localhost/huong_doi_tuong/du_an/Home/select_deltai_bill/<?=$id_bill?>">Chi tiết</a></td>
                                <?php if ($trang_thai == 0) { ?>
                                    <td><a class="btn btn-danger" onclick="return window.confirm('bạn có muốn hủy đơn không')" href="http://localhost/huong_doi_tuong/du_an/Home/cancel_bill/<?=$id_bill?>/<?=$id_user?>">Hủy Đơn</a></td>
                                <?php  } elseif ($trang_thai == 2) { ?>
                                    <td><a class="btn btn-danger" onclick="return window.confirm('bạn có muốn hủy đơn không')" href="http://localhost/huong_doi_tuong/du_an/Home/delete_bill/<?=$id_bill?>/<?=$id_user?>">Xóa Đơn</a></td>
                                <?php } ?>

                            </tr>

                    <?php }
                    } ?>
                </tbody>
            </table>

            <!-- phân trang -->


            <!-- end phân trang -->
        </div>
    </div>

</div>