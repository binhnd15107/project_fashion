<div class="content">
    <div class="title">
        <?php if (isset($data['san_pham_theo_danh_muc'])) {
            $row = $data['san_pham_theo_danh_muc'];
            if (isset($row[0]['ten_danh_muc'])) {

        ?>
                <h2><?= $row[0]['ten_danh_muc']; ?></h2>
            <?php } else {
            ?>
                <h2>Danh Mục Chưa có Sản Phẩm</h2>
        <?php   }
        } ?>
    </div>
    <div class="products">
        <div class="row row-cols-4">
            <?php if (isset($data['san_pham_theo_danh_muc'])) {
                $row = $data['san_pham_theo_danh_muc'];

                foreach ($row as $value) {
                    extract($value);
            ?>
                    <div class="col">
                        <div class="img_products">
                            <a href="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?>/<?= $page = 1 ?>"> <img style="" src="../../<?= $img ?>" class="d-block w-100" alt="..."></a>
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

    </div>
    <div class="product_suggestion">
        <div class="hihi">
            <h2>GỢI Ý RIÊNG DÀNH CHO BẠN</h2>
            <img style="width:300px;height: 100px;" src="../../public/assets/img/9.png" alt="">
        </div>
        <div class="multiple-items">
            <div class="slider-img2">
                <?php if (isset($data['sanpham_top10'])) {
                    $products_top10 = $data['sanpham_top10'];
                    foreach ($products_top10 as $products_top1) {
                        extract($products_top1);

                ?>
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
                                        <h3><a href="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?><?= $page = 1 ?>"><?= $ten_sp ?> </a></h3>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                <?php }
                } ?>
            </div>

            <button id="arrow-prev2" class=""><i class="fas fa-angle-left"></i></button>
            <button id="arrow-next2"><i class="fas fa-angle-right"></i></button>
        </div>



    </div>

</div>