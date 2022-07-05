<div class="container-fluid">
<?php $bien_phantrang=isset($data['bien'])? $data['bien']:1 ; ?>
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <a class="btn btn-info" href="admin/create_products">Thêm sản phẩm</a>

            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <td>tên sản phẩm</td>
                        <td>mã</td>
                        <td>giá</td>
                        <td>số lượng</td>

                        <td>ảnh</td>
                        <td>miêu tả</td>
                        <td>Danh Mục</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $row = $data['san_pham'];
                    foreach ($row as $value) { ?>

                        <tr>
                            <td><?php echo $value['ten_sp'] ?></td>
                            <td><?php echo $value['ma_sp'] ?></td>
                            <td><?php echo $value['gia'] ?></td>
                            <td><?php echo $value['so_luong'] ?></td>
                            <td><img style="width:200px;height:200px" src="<?php echo $value['img'] ?>" alt=""></td>
                            <td><?php echo $value['mieu_ta'] ?></td>
                            <td><?php echo $value['ten_danh_muc'] ?></td>
                            <td><a class="btn btn-danger" onclick="return window.confirm('bạn có muốn xóa khôg')" href="admin/detete_products/<?php echo $value['id'] ?>">xóa</a></td>
                            <td><a class="btn btn-primary" onclick="return window.confirm('bạn có muốn sửa khôg')" href="admin/edit_products/<?php echo $value['id'] ?>/<?=$bien_phantrang?>">edit</a></td>
                        </tr>
                        <?php  ?>
                    <?php } ?>
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
                            <li class="page-item"><a class="page-link" href="admin/view_products/<?php echo $prev_page ?>"><i class="fas fa-angle-double-left"></i></a></li>
<?php } ?>
                            <?php for ($i = 1; $i <= $totalPages; $i++) {
                                if ($i > $current_page - 3 && $current_page + 3 > $i) {
                            ?>

                                    <li class="page-item"><a class="page-link" href="admin/view_products/<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php }
                            }
                        }
                    ?>
                    <?php if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="admin/view_products/<?php echo $next_page ?>"><i class="fas fa-angle-double-right"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>

            <!-- end phân trang -->
        </div>
    </div>

</div>