<div style="max-width: 1000px;margin:20px auto 100px auto" class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <h2 style="text-align: center;">Đơn Hàng Của Bạn</h2>
            <a class="btn btn-info" href="admin/create_products">Thêm sản phẩm</a>

            <table class="table table-success table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <td>Mã Đơn Hàng</td>
                        <td>Số Lượng</td>
                        <td>Ngày Đặt Hàng</td>
                        <td>Tổng Tiền</td>
                        <td>Ghi Chú</td>
                        <td>Trạng Thái</td>
                        <td>Chi Tiết</td>
                        <td></td>


                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['select_bill_khachhang'])) {


                        $row = $data['select_bill_khachhang'];
                    

                        foreach ($row as $value) {

                            extract($value);
                            $_SESSION['bill_khach_hang']=$id_user
                    ?>

                            <tr style="text-align: center;">

                                <td>DON-<?= $id_bill ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $ngay_dat_hang ?></td>
                                <td style="color: red;"><?= number_format($tong_tien) ?>VNĐ</td>
                                <td><?= $ghi_chu ?></td>
                                <form action="http://localhost/huong_doi_tuong/du_an/admin/update_bill_cart_me/<?= $id_bill ?>" method="POST">
                                    <td><select size="1" name="trang_thai" id="">
                                            <option value="#">
                                                <?php if ($trang_thai == 0) {
                                                    echo 'Chưa xác nhận';
                                                } elseif ($trang_thai == 1) {
                                                    echo 'Đang giao';
                                                } else {
                                                    echo 'Đã giao hàng';
                                                }
                                                ?>
                                            </option>
                                            <hr>
                                            <option value="0">Chưa xác Nhận</option>
                                            <option value="1">Đang Giao</option>
                                            <option value="2">Đã Giao Thành Công</option>
                                        </select>

                                        <button style="text-align: left;" class='btn btn-primary'>Cập Nhật</button>
                                    </td>

                                </form>
                                <td><a class="btn btn-info" onclick="<?php ?>" href="http://localhost/huong_doi_tuong/du_an/Home/select_deltai_bill/<?= $id_bill ?>">Chi tiết</a></td>
                                <?php if ($trang_thai == 0) { ?>
                                    <td><a class="btn btn-danger" onclick="return window.confirm('bạn có muốn hủy đơn không')" href="http://localhost/huong_doi_tuong/du_an/admin/cancel_bill_me/<?= $id_bill ?>">Hủy Đơn</a></td>
                                <?php  } elseif ($trang_thai == 2) { ?>
                                    <td><a class="btn btn-danger" onclick="return window.confirm('bạn có muốn hủy đơn không')" href="http://localhost/huong_doi_tuong/du_an/admin/delete_bill_me/<?= $id_bill ?>">Xóa Đơn</a></td>
                                <?php } ?>

                            </tr>

                    <?php }
                    } ?>
                </tbody>
            </table>

            <!-- phân trang -->
            <!-- phân trang -->

            <!-- end phân trang -->
            <!-- end phân trang -->
        </div>
    </div>

</div>