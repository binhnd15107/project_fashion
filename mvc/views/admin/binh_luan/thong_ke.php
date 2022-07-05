<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <h2 style="text-align: center;">Phản Hồi Khách Hàng</h2>
            <a class="btn btn-info" href="admin/create_products">Thêm sản phẩm</a>

            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>Mã sản phẩm</td>
                        <td>Số Lượng Bình Luận</td>
                        <td>Ngày cũ nhất</td>
                        <td>Ngày Mới nhất</td>
<td>deltai</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['select_cmt'])) {


                        $row = $data['select_cmt'];

                        foreach ($row as $value) {
                          
                            extract($value);
                        
                    ?>

                            <tr>

                                <td><?= $ten_sp ?></td>
                                <td><?= $ma_sp ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $cu_nhat ?></td>
                                <td><?= $moi_nhat ?></td>
                                <td><a class="btn btn-info" href="admin/deltai_cmt/<?=$id_products?>">Chi tiết</a></td>

                            </tr>

                    <?php }
                    } ?>
                </tbody>
            </table>

            <!-- phân trang -->

            <nav style="position: relative;" aria-label="Page navigation example">
                <ul style="text-align: center;" class="pagination">


                    <?php if (isset($data['phantrang']) && isset($data['current_page'])) {
                        $totalPages = $data['phantrang'];

                        $current_page = $data['current_page'];
      
                        if ($current_page > 1) {
                            $prev_page = $current_page - 1;
                    ?>
                            <li class="page-item"><a class="page-link" href="admin/thong_ke_cmt/<?php echo $prev_page ?>"><i class="fas fa-angle-double-left"></i></a></li>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i > $current_page - 3 && $current_page + 3 > $i) {
                        ?>

                                <li class="page-item"><a class="page-link" href="admin/thong_ke_cmt/<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php }
                        }
                    } ?>
                    <?php if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="admin/thong_ke_cmt/<?php echo $next_page ?>"><i class="fas fa-angle-double-right"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>

            <!-- end phân trang -->
        </div>
    </div>

</div>