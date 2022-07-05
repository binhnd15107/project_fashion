<div class="content">
    <!-- Button trigger modal -->

    <div class="title">
        <h2>Thời trang công sở</h2>
    </div>
    <div class="products">
        <div class="row row-cols-4">
            <?php if (isset($data['sanpham'])) {
                $row = $data['sanpham'];
                foreach ($row as $value) {
                    extract($value);?>
                    <div class="col">
                        <div class="img_products">
                            <a href="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?>/<?= $page = 1 ?>"> <img src="../../<?= $img ?>" class="d-block w-100" alt="..."></a>
                        </div>
                        <div class="intro">
                        <?php if ($so_luong == 0) { ?>
                                <h3 style="text-align: center;">HẾT HÀNG</h3>
                            <?php   } else { ?>
                                <div class="item_top">
                                    <P>Mã Sp: <?= $ma_sp ?></P>
                                    <span class="price"><?= number_format($gia) ?>VNĐ</span>
                                </div>
                                <div class="product-name">
                                <h3><a href="Home/deltai_products/<?= $id ?>"><?= $ten_sp ?></a></h3>
                                </div>
                            <?php } ?>
                          
                        </div>
                    </div>
            <?php       }
            } ?>

        </div>
        <!-- phân trang -->

        <nav style="position: relative;" aria-label="Page navigation example">
            <ul style="text-align: center;" class="pagination">


                <?php if (isset($data['phantrang']) && isset($data['current_page'])) {
                    $totalPages = $data['phantrang'];
                    $current_page = $data['current_page'];
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                ?>
                        <li class="page-item"><a class="page-link" href="http://localhost/huong_doi_tuong/du_an/Home/trang_san_pham/<?php echo $prev_page ?>"><i class="fas fa-angle-double-left"></i></a></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i > $current_page - 3 && $current_page + 3 > $i) {
                    ?>

                            <li class="page-item"><a class="page-link" href="http://localhost/huong_doi_tuong/du_an/Home/trang_san_pham/<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }
                    }
                }
                ?>
                <?php if ($current_page < $totalPages - 1) {
                    $next_page = $current_page + 1;
                ?>
                    <li class="page-item"><a class="page-link" href="http://localhost/huong_doi_tuong/du_an/Home/trang_san_pham/<?php echo $next_page ?>"><i class="fas fa-angle-double-right"></i></a></li>
                <?php } ?>
            </ul>
        </nav>

        <!-- end phân trang -->
    </div>

</div>