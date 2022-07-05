<footer>
    <div class="row-footer">
        <div class="column-footer">
            <h3>HOTILE:0348048435</h3>
            <p>CTY TNHH ĐỨC BÌNH

            </p>
            <p>Địa chị: Đông Sơn chương mỹ</p>
            <p>@BẢN quyền phân phối thời trang K&K Fashion</p>
        </div>
        <div class="column-footer">
            <h3>THÔNG TIN LIÊN HỆ</h3>
            <ul>
                <li><a href="">Về chúng tôi</a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="">Hệ thống 13 Showrooms</a></li>
                <li><a href="">Thời trang nữ -Thời trang công sở K$K</a></li>
                <li><a href="">Fashion 2021</a></li>
            </ul>
        </div>
        <div class="column-footer">
            <h3>HỖ TRỢ KHÁCH HÀNG</h3>
            <ul>
                <li><a href="">Chính sách bảo mật thông tin khách hàng</a></li>
                <li><a href="">Chính sách đổi trả sản phẩm</a></li>
                <li><a href="">Chính sách bảo hành sản phẩm
                    </a></li>
                <li><a href="">Chính sách giao nhận, vận chuyển</a></li>
                <li><a href="">Phương thức thanh toán</a></li>
            </ul>
        </div>
        <div class="column-footer">
            <h3><i class="fab fa-facebook"></i>
                <i class="fab fa-facebook-messenger"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
            </h3>
            <p>Đăng ký để nhận bản tin ưu đãi từ K&K Fashion</p>
            <form action="">
                <input style="border: none;padding-right: 100px;" required type="email" placeholder=" Địa chỉ email của bạn">

                <button style="border: none;transform: translateX(-30px);"><i class="fab fa-telegram-plane"></i></button>
            </form>

        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<?php if (isset($data['pages'])) {
    if ($data['pages'] == 'home/introduce') { ?>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="./public/js/home.js"></script>
    <?php } elseif ($data['pages'] == 'home/lienhe') { ?>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="./public/js/home.js"></script>
    <?php  } elseif ($data['pages'] == 'home/blog') { ?>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="./public/js/home.js"></script>
        <script>
         $(function() {

                Swal.fire({
                    title: 'Welcome to K&K Fashion',

                    imageUrl: './public/assets/img/imgdz.jpg',
                    imageWidth: 450,
                    imageHeight: 300,
                    imageAlt: 'Custom image',
                    // title: 'Welcome to K&K Fashion',
                    // width: 600,
                    // padding: '3em',
                    // background: '#fff url(./public/assets/img/cute-cartoon-sweet-cartoon.gif)',
                    backdrop: `
      rgba(0,0,123,0.4)
      url("./public/assets/img/7eb23b8fa4b6c374504ce2fb9d9c5399.gif")
      left top
      no-repeat
    `,
                    // showConfirmButton: false,
                    // showCancelButton: false,
                    timer: 3000,

                })
            })
   
        </script>
    <?php } elseif ($data['pages'] == "home/deltai_products" || $data['pages'] == 'home_products/search_products' || $data['pages'] == 'home_products/category_products') { ?>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="../../../public/js/detail.js"></script>
        <script src="../../public/js/detail.js"></script>
        <script src="./../public/js/detail.js"></script>


        <script>
            $(() => {
                $('.cong').click(function() {
                    let quantity = document.getElementById('quantity').value;
                    let operator = 1;
                    var retunr = parseInt(quantity) + parseInt(operator);
                    document.getElementById('quantity').value = retunr;


                })

            })
            $(() => {
                $('.tru').click(function() {
                    let quantity = document.getElementById('quantity').value;
                    let operator = 1;
                    var retunr = parseInt(quantity) - parseInt(operator);
                    document.getElementById('quantity').value = retunr;


                })

            })
        </script>

<?php  }
} ?>


</body>

</html>