<div class="content">
    <div class="products_hot">
        <div class="hihi">
            <h2>SẢN PHẨM NỔI BẬT</h2>
            <img style="width:300px;height: 100px;" src="./public/assets/img/9.png" alt="">
        </div>
        <div class="multiple-items">
            <div class="slider-img">
                <?php if (isset($data['sanpham'])) {
                    $row = $data['sanpham'];
                    foreach ($row as $value) {
                        extract($value);
                ?>
                        <div class="col">
                            <div class="img_products">
                                <a href="Home/deltai_products/<?= $id ?>/<?= $page = 1 ?>"> <img src="<?= $img ?>" class="d-block w-100" alt="..."></a>
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

            <button id="arrow-prev" class=""><i class="fas fa-angle-left"></i></button>
            <button id="arrow-next"><i class="fas fa-angle-right"></i></button>
        </div>

    </div>

    <div class="product_suggestion">
        <div class="hihi">
            <h2>GỢI Ý RIÊNG DÀNH CHO BẠN</h2>
            <img style="width:300px;height: 100px;" src="./public/assets/img/9.png" alt="">
        </div>
        <div class="multiple-items">
            <div class="slider-img2">
                <?php if (isset($data['sanpham_top10'])) {
                    $row_top10 = $data['sanpham_top10'];
                    foreach ($row_top10 as $value_top10) {
                        extract($value_top10);
                ?>
                        <div class="col">
                            <div class="img_products">
                                <a href="Home/deltai_products/<?= $id ?>/<?= $page = 1 ?>"> <img src="<?= $img ?>" class="d-block w-100" alt="..."></a>
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

            <button id="arrow-prev2" class=""><i class="fas fa-angle-left"></i></button>
            <button id="arrow-next2"><i class="fas fa-angle-right"></i></button>
        </div>



    </div>
    <div class="loolbook">
        <div class="hihi">
            <h2>LOOKBOOK</h2>
            <img style="width:200px;height: 100px;" src="./public/assets/img/9.png" alt="">
        </div>
        <div class="row-lookbook">
            <div class="lookbook-item">
                <div class="hover-img">
                    <a href=""><img src="./public/assets/img/41e04024c542cfbcfd000857e26a9c46.gif" alt=""></a>
                </div>
                <div class="lookbook_content">
                    <h3 class="">ME AND NETURE</h3>
                    <P>#lookbook</P>
                </div>
            </div>
            <div class="lookbook-item">
                <div class="hover-img">
                    <a href=""><img src="./public/assets/img/9f65426d108d3447710fdee077a7d3cb.gif" alt=""></a>
                </div>
                <div class="lookbook_content">
                    <h3 class="">ME AND NETURE</h3>
                    <P>#lookbook</P>
                </div>
            </div>
            <div class="lookbook-item">
                <div class="hover-img">
                    <a href=""><img src="./public/assets/img/fbe9867aa156b08307e071214d92b205.gif" alt=""></a>
                </div>
                <div class="lookbook_content">
                    <h3 class="">ME AND NETURE</h3>
                    <P>#lookbook</P>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="video_kk">
    <div style="max-width: 1250px; margin: auto; display: grid; grid-template-columns: 1fr 1fr; position: relative;">
        <div class="video">
            <iframe width="760" height="415" src="https://www.youtube.com/embed/sAgh1RKD5UQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div>
            <h3 class="learn_video">LIVE LIKE A FLOWER</h3>
            <p class="learn_video">
                Mang hơi thở thiên nhiên của các hoa, hoa đồng tiền - loài hoa đại diện cho sự hạnh phúc và nét
                đẹp
                tươi mới, hoa bảo thạch trắng - mong manh, mềm mại, hoa hồng tím - thủy chung sắc son, hay thanh
                lịch thuần khiết như loài hoa môn trắng, đôi lúc lại mạnh mẽ, phóng khoáng như hoa thiên điểu…
                tất
                cả được ví như tính cách của người phụ nữ, mỗi người đều mang trong mình một dấu ấn riêng chẳng
                ai
                giống ai. Và đó chính là nguồn cảm hứng để K&K Fashion cho ra mắt BST “Live Like A Flower” như
                thổi
                một làn gió tươi mới đến phong cách thời trang của phái đẹp.
            </p>
        </div>
    </div>


</div>
<div class="blog">
    <h2>BOLG</h2>
    <div class="main-blog">
        <div class="new-leaning">
            <div>
                <img src="./public/assets/img/blog1webp.webp" alt="">
            </div>

            <div class="blog-intro">
                <h3>Thời trang tuổi 45 - 8 set đồ giúp quý cô thăng hạng nhan sắc</h3>
                <p>Chắn hẳn ở độ tuổi trung niên, quý cô nào cũng sẽ muốn thông qua cách ăn mặc của mình để
                    có một khí chất trang nhã, thời thượng và sang xịn nhất có thể. Và không quá khó, cũng
                    không cần phải “lên đồ” cầu kỳ để các cô làm được điều đó.</p>
            </div>
        </div>

        <div class="new-leaning">
            <div>
                <img src="./public/assets/img/blog2.webp" alt="">
            </div>

            <div class="blog-intro">
                <h3>Thời trang tuổi 45 - 8 set đồ giúp quý cô thăng hạng nhan sắc</h3>
                <p>Chắn hẳn ở độ tuổi trung niên, quý cô nào cũng sẽ muốn thông qua cách ăn mặc của mình để
                    có một khí chất trang nhã, thời thượng và sang xịn nhất có thể. Và không quá khó, cũng
                    không cần phải “lên đồ” cầu kỳ để các cô làm được điều đó.</p>
            </div>
        </div>
        <div class="new-leaning">
            <div>
                <img src="./public/assets/img/blog3.webp" alt="">
            </div>

            <div class="blog-intro">
                <h3>Thời trang tuổi 45 - 8 set đồ giúp quý cô thăng hạng nhan sắc</h3>
                <p>Chắn hẳn ở độ tuổi trung niên, quý cô nào cũng sẽ muốn thông qua cách ăn mặc của mình để
                    có một khí chất trang nhã, thời thượng và sang xịn nhất có thể. Và không quá khó, cũng
                    không cần phải “lên đồ” cầu kỳ để các cô làm được điều đó.</p>
            </div>
        </div>
        <div class="new-leaning">
            <div>
                <img src="./public/assets/img/blog4.webp" alt="">
            </div>

            <div class="blog-intro">
                <h3>Thời trang tuổi 45 - 8 set đồ giúp quý cô thăng hạng nhan sắc</h3>
                <p>Chắn hẳn ở độ tuổi trung niên, quý cô nào cũng sẽ muốn thông qua cách ăn mặc của mình để
                    có một khí chất trang nhã, thời thượng và sang xịn nhất có thể. Và không quá khó, cũng
                    không cần phải “lên đồ” cầu kỳ để các cô làm được điều đó.</p>
            </div>
        </div>
        <div class="new-leaning">
            <div>
                <img src="./public/assets/img/banner1.jpg" alt="">
            </div>

            <div class="blog-intro">
                <h3>Thời trang tuổi 45 - 8 set đồ giúp quý cô thăng hạng nhan sắc</h3>
                <p>Chắn hẳn ở độ tuổi trung niên, quý cô nào cũng sẽ muốn thông qua cách ăn mặc của mình để
                    có một khí chất trang nhã, thời thượng và sang xịn nhất có thể. Và không quá khó, cũng
                    không cần phải “lên đồ” cầu kỳ để các cô làm được điều đó.</p>
            </div>
        </div>
    </div>
    <button id="arrow-prev3" class=""><i class="fas fa-angle-left"></i></button>
    <button id="arrow-next3"><i class="fas fa-angle-right"></i></button>
</div>
</div>