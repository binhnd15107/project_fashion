<div class="detail-products">
    <?php if (isset($data['product_deltai'])) {
        $row =  $data['product_deltai'];
        extract($row);
    ?>
        <div class="slider-img">
            <div style="position: relative;">
                <img id="featured" class="main-img" src="../../../<?= $img ?>" alt="">
                <div id="for_slick_slider" class="for_slick_slider">
                    <?php if (isset($data['img_deltai'])) {
                        $row_img = $data['img_deltai'];
                        foreach ($row_img as $value) {
                            extract($value);

                    ?>
                            <div class="items">
                                <img id="thumbnail" class="thumbnail" src="../../../public/assets/img/<?= $image ?>" alt="">
                            </div>
                    <?php }
                    } ?>
                </div>
                <button id="slideLeft" class="slideLeft"><i class="fas fa-angle-left"></i></button>
                <button id="slideRight" class="slideRight"><i class="fas fa-angle-right"></i></button>
            </div>
            <div>
                <div style="max-width:350px">
                    <h4>Bình luận</h4>
                    <table class="table table-hover">
                        <?php if (isset($data['select_comment'])) {
                            $select_comment = $data['select_comment'];
                            foreach ($select_comment as $value_comment) {
                        ?>
                                <tr>
                                    <td><a href=""><img style="width:40px;height:40px;border-radius:50%;" src="../../../<?= $value_comment['img'] ?>" alt=""></a></td>
                                    <td><?= $value_comment['user'] ?></td>
                                    <td><?= $value_comment['noi_dung'] ?></td>
                                    <?php if (isset($_SESSION['introduce_tk'])) {
                                        if ($_SESSION['introduce_tk']['user'] == $value_comment['user']) {
                                            if (isset($data['current_page'])) {
                                                $current_page = $data['current_page'];
                                    ?>



                                                <td><a onclick="return window.confirm('bạn có muốn xóa bình luận')" style="width:60px;height:40px" class='btn btn-danger' href="http://localhost/huong_doi_tuong/du_an/Home/delete_cmt/<?= $value_comment['id'] ?>/<?= $value_comment['id_products'] ?>/<?= $current_page ?>">Xóa</a></td>
                                </tr>
            <?php  }
                                        }
                                    }
                                }
                            } ?>
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
                                    <li class="page-item"><a class="page-link" href="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?>/<?php echo $prev_page ?>"><i class="fas fa-angle-double-left"></i></a></li>
                                <?php } ?>
                                <?php for ($i = 1; $i <= $totalPages; $i++) {
                                    if ($i > $current_page - 2 && $current_page + 2 > $i) {
                                ?>

                                        <li class="page-item"><a class="page-link" href="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?>/<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php }
                                }

                                ?>
                                <?php if ($current_page < $totalPages - 1) {
                                    $next_page = $current_page + 1;
                                ?>
                                    <li class="page-item"><a class="page-link" href="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?>/<?php echo $next_page ?>"><i class="fas fa-angle-double-right"></i></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </nav>


                    <!-- end phân trang -->
                </div>
                <div>
                    <?php if (isset($_SESSION['introduce_tk'])) {

                    ?>
                        <div>


                            <form action="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?>/<?= $page = 1 ?>" method="POST">
                                <input type="hidden" value="<?= $id ?>" name="id_products">
                                <input size="30" type="hidden" value="<?= $_SESSION['introduce_tk']['id'] ?>" name="id_user">
                                <img style="width:40px;height:40px;border-radius:50%;" src="../../../<?= $_SESSION['introduce_tk']['img'] ?> " alt=""> <input size="30" style="border-radius: 10px;padding-left: 10px;" type="text" placeholder="comment" name="binh_luan">
                                <input type="submit" style="border-radius: 10px;" name="doit" value="GỬI">
                            </form>
                        </div>
                    <?php } else { ?>
                        <div style="background:oldlace;text-align: center;opacity:0.8;">
                            <h3 style="padding:15px"><a style="text-decoration: none; color:black;padding:20px" href="http://localhost/huong_doi_tuong/du_an/login/">Đăng nhập để bình luận</a></h3>
                        </div>
                    <?php } ?>
                </div>
            </div>


        </div>
        <div class="information">

            <form action="http://localhost/huong_doi_tuong/du_an/Home/my_cart" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $id ?>" name="id_products">
                <input type="hidden" value="<?= $img ?>" name="img">
                <input type="hidden" value="<?= $ten_sp ?>" name="ten_sp">
                <input type="hidden" value="<?= $gia ?>" name="gia">
                <?php if (isset($_SESSION['introduce_tk'])) {

                ?>
                    <input type="hidden" value="<?= $_SESSION['introduce_tk']['id'] ?>" name="id_khach_hang">
                    <input type="hidden" value="<?= $_SESSION['introduce_tk']['user'] ?>" name="ten_khach_hang">
                <?php } ?>
                <h2 class="product_title" itemprop="name"><?= $ten_sp ?></h2>
                <p class="sku"><span class="fontutm">Mã SP : </span><span><?= $ma_sp ?></span></p>
                <span><?= number_format($gia) ?> VNĐ</span>
                <br>
                <br>
                Size
                <div class="form-check">

                    <label class="form-check-label" for="flexRadioDefault1">
                        S
                    </label>
                    <input class="form-check-input" value="S" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                </div>
                <div class="form-check">
                    <label class="form-check-label" for="flexRadioDefault2">
                        M
                    </label>
                    <input class="form-check-input" value="M" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="flexRadioDefault2">
                        L
                    </label>
                    <input class="form-check-input" type="radio" value="L" name="flexRadioDefault" id="flexRadioDefault2" checked>

                </div>

                <div class="quantity2">

                    <div id="tru" class="tru"></div>
                    <input class="quantity" type="number" name='quantity' id="quantity" value="1" min="1" max="20" size="4">
                    <div id="cong" class="cong">
                    </div>
                </div>
                <br>
                <input type="submit" name="submit_cart" value="Thêm vào giỏ hàng" class="submit">
            </form>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i style="padding-right: 9px;" class="fas fa-tshirt"></i> MÔ TẢ SẢN PHẨM
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                <?= $mieu_ta ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i style="padding-right:10px" class="fas fa-arrow-alt-circle-down"></i> QUY ĐỊNH ĐỔI
                            HÀNG
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <ul>
                                <li> Hàng còn nguyên tem, mạc, hóa đơn, không bị dơ bẩn, hư hỏng, chưa qua sử dụng
                                    hoặc giặt tẩy.</li>
                                <li> Khách hàng tại Tp.HCM có thể đến bất kì cửa hàng nào để đổi hàng.</li>
                                <li>Khách hàng tỉnh gửi lại sản phẩm kèm hóa đơn sp đổi đến địa chỉ:
                                    K&K Fashion - 028.36222 999, 40 Lê Văn Sỹ, phường 11, quận Phú Nhuận
                                    (phí vận chuyển 35k nếu không mua thêm sp mới).</li>
                                <li> Liên hệ đổi hàng sau 13:30 - Trong vòng 3 ngày kể từ ngày nhận hàng.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i style="padding-right: 10px;" class="fas fa-truck"></i> MIỄN PHÍ VẬN CHUYỂN
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="kk-hotline">
                                <p><i class="fas fa-headphones"></i> 028.36222 999 - Hotline đặt hàng nhanh</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<?php }
?>
<div class="product_suggestion">
    <div class="hihi">
        <h2>GỢI Ý RIÊNG DÀNH CHO BẠN</h2>
        <img style="width:300px;height: 100px;" src="../../../public/assets/img/9.png" alt="">
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
                            <a href="http://localhost/huong_doi_tuong/du_an/Home/deltai_products/<?= $id ?>/<?= $page = 1 ?>"> <img src="../../../<?= $img ?>" class="d-block w-100" alt="..."></a>
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
</div>
</div>