<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <h2 style="text-align: center;">Bình Luận chi tiết</h2>

            <a class="btn btn-info" href="admin/thong_ke_cmt">Quay Lại</a>

            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <td>Tên Khách Hàng</td>
                        <td>Nội Dung</td>
                        <td>Ngày Bình Luận</td>
<td>Action</td>

                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['deltai_cmt'])) {


                        $row = $data['deltai_cmt'];

                        foreach ($row as $value) {
                            extract($value);

                    ?>

                            <tr>

                                <td><?= $user ?></td>
                                <td><?= $noi_dung ?></td>
                                <td><?= $ngay_binh_luan ?></td>

                                <td><a class="btn btn-danger" onclick="return window.confirm('bạn có muốn xóa bình luận này không')" href="admin/delete_deltai_cmt/<?= $id ?>/<?= $id_products ?>">Xóa</a></td>

                            </tr>

                        <?php }
                    }
                    if (empty($data['deltai_cmt'])) {
                        ?>
                        <tr style="text-align: center;">
                            <th>
                                <h3>Không có Bình luận nào</h3>
                            </th>
                        </tr>



                    <?php    } ?>
                </tbody>
            </table>

            <!-- phân trang -->



            <!-- end phân trang -->
        </div>
    </div>

</div>