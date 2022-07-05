<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php if (isset($data['pages'])) {
        if ($data['pages'] == 'home/introduce') { ?>

            <link rel="stylesheet" href=".././public/css/contact-me.css">
            <link rel="stylesheet" href=".././public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <?php } elseif ($data['pages'] == 'home/lienhe' || $data['pages'] == 'cart/deltai_bill_cart' || $data['pages'] == 'cart/mycart' || $data['pages'] == 'cart/show_cart'   || $data['pages'] == 'cart/bill_cart') { ?>
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
            <link rel="stylesheet" href=".././public/css/lienhe.css">
            <link rel="stylesheet" href="../../public/css/lienhe.css">
            <link rel="stylesheet" href=".././public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" href="../../public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <?php  } elseif ($data['pages'] == 'home/blog') { ?>
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
            <link rel="stylesheet" href="./public/css/inde.css">
            <link rel="stylesheet" href="./public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <?php } elseif ($data['pages'] == "home/deltai_products") { ?>
            <link rel="stylesheet" href="../../../public/css/detail.css">
            <link rel="stylesheet" href="./../public/css/detail.css">
            <link rel="stylesheet" href="../../../public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

        <?php } elseif ($data['pages'] == 'home/login_tk') { ?>
            <link rel="stylesheet" href=".././public/css/login.css">
            <link rel="stylesheet" href="../../public/css/login.css">
            <link rel="stylesheet" href=".././public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <?php } elseif ($data['pages'] == 'home/login_form') { ?>
            <link rel="stylesheet" href=".././public/css/login_from.css">
            <link rel="stylesheet" href=".././public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <?php } elseif ($data['pages'] == 'login/show_login') { ?>

            <link rel="stylesheet" href=".././public/css/display_login.css">
            <link rel="stylesheet" href=".././public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <?php } elseif ($data['pages'] == 'home_products/products' ||   $data['pages'] == 'home_products/search_products' || $data['pages'] == 'home_products/category_products') { ?>
            <link rel="stylesheet" href="./../public/css/sanpham.css">
            <link rel="stylesheet" href="../../public/css/sanpham.css">
            <link rel="stylesheet" href="./../public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" href="../../public/fontawesome-free-5.15.4-web/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <?php }
    } ?>



</head>

<body>
    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="http://localhost/huong_doi_tuong/du_an/Home/trang_timkiem_san_pham" method="post">
                    <div class="modal-body">

                        <div class="mb-3">

                            <input type="text" name="intro_search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="contai">
        <header>

            <div id="header-top" class="header-top">
                <h3>Miễn phí vận chuyển mọi đơn hàng</h3>
                <div class="admin">
                    <ul class="adimin">

                        <?php if (isset($_SESSION['introduce_tk'])) {

                            $introduce_tk = $_SESSION['introduce_tk'];
                            extract($introduce_tk);
                        ?>
                            <li style="border-right: 1px solid white;"><a href="http://localhost/huong_doi_tuong/du_an/login/display_login">
                                    <?php if (isset($data['pages'])) {
                                        if ($data['pages'] == 'home/introduce'   || $data['pages'] == 'home/lienhe' ||   $data['pages'] == 'home_products/search_products' || $data['pages'] == 'cart/mycart'  || $data['pages'] == 'cart/bill_cart' || $data['pages'] == "home/login_tk" || $data['pages'] == 'home/login_form'  || $data['pages'] == 'login/show_login') { ?>
                                            <?= $user ?> <img style="width:30px;height:30px;border-radius:50%;" src=".././<?= $img ?>" alt="">
                                        <?php } elseif ($data['pages'] == 'home/blog') { ?>

                                            <?= $user ?> <img style="width:30px;height:30px;border-radius:50%;" src="<?= $img ?>" alt="">

                                        <?php } elseif ($data['pages'] == "home/deltai_products") { ?>

                                            <?= $user ?> <img style="width:30px;height:30px;border-radius: 50%;" src="../../../<?= $img ?>" alt=""></a></li>

                        <?php } elseif ($data['pages'] == 'cart/deltai_bill_cart' || $data['pages'] == 'home_products/category_products' || $data['pages'] == 'cart/show_cart' || $data['pages'] == 'home_products/products') { ?>

                            <?= $user ?> <img style="width:30px;height:30px;border-radius: 50%;" src="../../<?= $img ?>" alt=""></a></li>
                    <?php }
                                    } ?>
                    </a></li>
                <?php  } else {

                ?>
                    <li style="border-right: 1px solid white;"><a href="http://localhost/huong_doi_tuong/du_an/login/">TÀI KHOẢN <i class="fas fa-user-clock"></i> </a></li>

                <?php } ?>

                <li><a href="http://localhost/huong_doi_tuong/du_an/Home/my_cart">GIỎ HÀNG <i class="fas fa-luggage-cart"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="header-main">


                <div class="navbar">
                    <ul class="menu">


                        <li><a href="http://localhost/huong_doi_tuong/du_an/Home/home_introduce">GIỚI THIỆU</a>
                            <ul class="sub-menu">
                                <li><a href="http://localhost/huong_doi_tuong/du_an/Home/home_introduce">Về chúng tôi</a></li>
                                <li><a href="http://localhost/huong_doi_tuong/du_an/Home/home_lienhe">Liên Hệ</a></li>
                                <li><a href="">CHính sách bảo mật</a></li>
                            </ul>
                        </li>
                        <li><a href="http://localhost/huong_doi_tuong/du_an/Home/trang_san_pham/<?= $page = 1 ?>">SHOP ONLINE</a>
                            <ul class="sub-menu">
                                <li><a href="">New Collection</a></li>
                                <?php if (isset($data['Allcategory'])) {
                                    $allcategory = $data['Allcategory'];
                                    foreach ($allcategory as $categoy_value) {

                                        extract($categoy_value);
                                        // var_dump($categoy_value);
                                        // die();
                                ?>
                                        <li><a href="http://localhost/huong_doi_tuong/du_an/Home/select_san_pham_where_loai/<?= $id ?>"><?= $ten_danh_muc ?></a></li>
                                <?php }
                                } ?>
                            </ul>
                        </li>
                        <li><a href="">BLOG</a></li>
                        <li><a href="">LOOKBOOK</a></li>
                    </ul>
                </div>
                <?php if (isset($data['pages'])) {
                    if ($data['pages'] == 'home/introduce'  || $data['pages'] == 'home/lienhe'  ||   $data['pages'] == 'home_products/search_products' || $data['pages'] == 'cart/mycart'   || $data['pages'] == 'cart/bill_cart' || $data['pages'] == "home/login_tk" || $data['pages'] == 'home/login_form' ||  $data['pages'] == 'login/show_login') { ?>
                        <div class="logo">
                            <a href="http://localhost/huong_doi_tuong/du_an/"><img style="width:120px;height:120px" src=".././public/assets/img/logo3.jpg" alt=""></a>
                        </div>
                    <?php } elseif ($data['pages'] == 'home/blog') { ?>
                        <div class="logo">
                            <a href=""><img style="width:120px;height:120px" src="./public/assets/img/logo3.jpg" alt=""></a>
                        </div>
                    <?php } elseif ($data['pages'] == "home/deltai_products") { ?>
                        <div class="logo">
                            <a href="http://localhost/huong_doi_tuong/du_an/"><img style="width:120px;height:120px" src="../../../public/assets/img/logo3.jpg" alt=""></a>
                        </div>
                    <?php  } elseif ($data['pages'] == 'cart/deltai_bill_cart' || $data['pages'] == 'home_products/category_products' ||  $data['pages'] == 'cart/show_cart' || $data['pages'] == 'home_products/products') { ?>
                        <div class="logo">
                            <a href="http://localhost/huong_doi_tuong/du_an/"><img style="width:120px;height:120px" src="../../public/assets/img/logo3.jpg" alt=""></a>
                        </div>
                <?php  }
                } ?>
                <div class="showroom">

                    <ul class="menu-show">
                        <li><a href="">HỆ THỐNG SHOWROOM</a></li>
                        <li><a href="">HƯỚNG DẪN MUA HÀNG</a>
                            <ul class="sub-menu">
                                <li><a href="">Các bước mua hàng</a></li>
                                <li><a href="">Quy Định đổi hàng</a></li>
                                <li><a href="">Thông tin tài khoản</a></li>
                            </ul>
                        </li>

                        <li style="border-left: 1px solid black;">
                            <!-- Button trigger modal -->
                            <button type="button" style="border: none;    background-color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i style="transform: translateY(10px);" class="fas fa-search"></i>
                            </button>


                        </li>
                    </ul>
                </div>
            </div>

        </header>
        <?php if (isset($data['pages'])) {
            if ($data['pages'] == 'home/blog') { ?>
                <div class="banner">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./public/assets/img/banner1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./public/assets/img/bannre2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <video src="./public/assets/img/KampampK-Fashion-fdown.net.mp4" preload="metadata" height="700px" width="1900px" autoplay loop muted></video>

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
        <?php }
        } ?>