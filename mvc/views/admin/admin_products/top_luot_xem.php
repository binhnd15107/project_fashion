<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <h2 style="text-align: center;">Top sản phẩm có lượt xem cao</h2>
            <a class="btn btn-info" href="admin/create_products">Thêm sản phẩm</a>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                    <td>tên sản phẩm</td>
                        <td>mã</td>
                        <td>ảnh</td>
                        <td>lượt xem</td>
                        <td>Danh Mục</td>

                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['top_luot_xem'])) {


                        $row = $data['top_luot_xem'];

                        foreach ($row as $value) {
                          
                            extract($value);
                        
                    ?>

                            <tr>

                                <td><?= $ten_sp ?></td>
                                <td><?= $ma_sp ?></td>
                                <td><img style="width:200px;height:250px"  src="<?=$img?>" alt=""></td>
                                <td><?=$luot_xem?></td>
                           
                                <td><?= $ten_danh_muc ?></td>
                               

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
                            <li class="page-item"><a class="page-link" href="admin/select_luot_xem/<?php echo $prev_page ?>"><i class="fas fa-angle-double-left"></i></a></li>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) {
                       
                            if ($i > $current_page - 2 && $current_page + 2 > $i) {
                       ?>

                                <li class="page-item"><a class="page-link" href="admin/select_luot_xem/<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php }
                        }
                    } ?>
                    <?php if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="admin/select_luot_xem/<?php echo $next_page ?>"><i class="fas fa-angle-double-right"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>

            <!-- end phân trang -->
        </div>
    </div>

</div>