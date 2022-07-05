<div style="max-width: 1000px;margin:20px auto 100px auto" class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <h2 style="text-align: center;">Danh Sách Khách Hàng</h2>
            <a class="btn btn-info" href="admin/create_products">Thêm sản phẩm</a>

            <table class="table table-success table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <td>Mã Khách Hàng</td>
                        <td>Tên Khách Hàng</td>
                        <td>Email</td>
                        <td>Địa Chỉ</td>
                        <td>Ảnh</td>

                        <td>Đơn Hàng</td>


                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['select_khachhang'])) {


                        $row = $data['select_khachhang'];
                        // echo '<pre>';
                        // var_dump($row);
                        // die();
                        foreach ($row as $value) {

                            extract($value);

                    ?>

                            <tr style="text-align: center;">

                                <td>MA-<?= $id ?></td>
                                <td><?= $user ?></td>
                                <td><?= $email ?></td>
                                <td><?= $dia_chi ?></td>
                                <td><img style="width:200px;height:250px" src="<?= $img ?>" alt=""></td>
                                <td><a class='btn btn-info' href="http://localhost/huong_doi_tuong/du_an/admin/select_bill_khachhang/<?=$id?>">Đơn Hàng</a></td>
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