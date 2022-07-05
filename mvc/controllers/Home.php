<?php
class Home extends controller
{
    protected $sanpham;
    function __construct()
    {
        $this->sanpham = $this->Model('sanpham');
        $this->category = $this->Model('category_products');
        $this->comment = $this->model('binh_luan');
        $this->bill = $this->model('cart');
    }
    //trang chủ 

    public function index()
    {

        $data = [
            'pages' => 'home/blog',
            'sanpham' => $this->sanpham->sanpham_home(),
            'sanpham_top10' => $this->sanpham->sanpham_top10_home(),
            'Allcategory' => $this->category->getAll(),
        ];
        $this->View('masterlayout', $data);
    }


    // trang sản phẩm ONLINE SHOP
    public function trang_san_pham($page = 1)
    {
        $data = [
            'pages' => 'home_products/products',
            'sanpham' => $this->sanpham->trang_sanpham($page),

            'Allcategory' => $this->category->getAll(),
            'phantrang' => $this->sanpham->phantrang_trang_sanpham(),
            'current_page' => $this->sanpham->current_page,

        ];
        $this->view('masterlayout', $data);
    }

    //trang tìm kiếm sản phẩm 
    public function trang_timkiem_san_pham()
    {
        $data = [

            'pages' => 'home_products/search_products',
            'Allcategory' => $this->category->getAll(),
            'timkiem_sanpham' => $this->sanpham->trang_timkiem_sanpham($_POST['intro_search']),
            'sanpham_top10' => $this->sanpham->sanpham_top10_home(),
        ];
        // echo '<pre>';
        //         var_dump($data['timkiem_sanpham']);
        //         die();
        $this->view('masterlayout', $data);
    }


    //select sản phẩm theo mã
    public function select_san_pham_where_loai($id_danh_muc)
    {

        $data = [
            'pages' => 'home_products/category_products',
            'Allcategory' => $this->category->getAll(),
            'sanpham_top10' => $this->sanpham->sanpham_top10_home(),
            'san_pham_theo_danh_muc' => $this->sanpham->select_sanpham_where_danhmuc_home($id_danh_muc)
        ];
        $this->View('masterlayout', $data);
    }

    //trang chi tiết sản phẩm
    public function deltai_products($id, $page = 1)

    {

        $data = [
            'pages' => 'home/deltai_products',
            'product_deltai' => $this->sanpham->sanpham_deltai($id),
            'img_deltai' => $this->sanpham->img_deltai($id),
            'update_luot_xem' => $this->sanpham->update_luot_xem($id),
            'current_page' => $this->comment->current_page,
            'sanpham_top10' => $this->sanpham->sanpham_top10_home(),
            'Allcategory' => $this->category->getAll(),
        ];
        if (isset($_POST['doit'])) {
            $insert = [
                'noi_dung' => $_POST['binh_luan'],
                'id_user' => $_POST['id_user'],
                'id_products' => $_POST['id_products'],
                'ngay_binh_luan' => date('h:i:a d/m/Y'),
            ];

            $data['insert_comment'] = $this->comment->insert($insert);
        }
        $data['select_comment'] = $this->comment->getAll_binh_luan($id, $page);
        $data['phantrang'] =  $this->comment->phantrang($id);
        $data['current_page'] = $this->comment->current_page;
        $this->view('masterlayout', $data);
    }

    //trang giới thiệu
    public function home_introduce()
    {
        $data = [
            'pages' => 'home/introduce',
            'Allcategory' => $this->category->getAll(),
        ];
        $this->view('masterlayout', $data);
    }
    public function home_lienhe()
    {
        $data = [
            'pages' => 'home/lienhe',
            'Allcategory' => $this->category->getAll(),
        ];
        $this->view('masterlayout', $data);
    }

    public function delete_cmt($id, $id_products, $curren)
    {
        $this->comment->delete_cmt($id);
        header("location:http://localhost/huong_doi_tuong/du_an/Home/deltai_products/$id_products/$curren");
    }
    //end trang giới thiệu



    //trang giỏ hàng

    public function my_cart()
    {


        $update_quantity = isset($_POST['update_quantity']) ? $_POST['update_quantity'] : $_POST['quantity'];

        if (!isset($_SESSION['introduce_tk'])) {
            header('location:http://localhost/huong_doi_tuong/du_an/login/');
            die();
        }
        if (!isset($_SESSION['my_cart'])) $_SESSION['my_cart'] = [];
        if (isset($_POST['submit_cart']) && isset($_SESSION['introduce_tk'])) {
            $id_gio_hang = $_POST['id_products'] . $_POST['flexRadioDefault'];

            $data_cart = [
                'id_gio_hang' => $id_gio_hang,
                'id_products' => $_POST['id_products'],
                'img' => $_POST['img'],
                'ten_sp' => $_POST['ten_sp'],
                'gia' => $_POST['gia'],
                'id_user' => $_SESSION['introduce_tk']['id'],
                'user' => $_SESSION['introduce_tk']['user'],
                'size' => $_POST['flexRadioDefault'],
                'so_luong' => $update_quantity,
            ];

            if (isset($_SESSION['my_cart'][$id_gio_hang])) {
                //   var_dump( $_SESSION['my_cart'][$_POST['id_products']]['size']);
                //   die();
                $data_cart['so_luong'] = $_SESSION['my_cart'][$id_gio_hang]['so_luong'] + $update_quantity;
                $_SESSION['my_cart'][$id_gio_hang] = $data_cart;
            } else {

                $_SESSION['my_cart'][$id_gio_hang] = $data_cart;
            }
        }



        $data = [
            'pages' => 'cart/mycart',
            'Allcategory' => $this->category->getAll(),
            'gio_hang' =>  $_SESSION['my_cart'],
        ];
        $this->view('masterlayout', $data);
    }
    public function delete_cart($id_products)
    {
        echo $id_products;
        unset($_SESSION['my_cart'][$id_products]);
        header('location:http://localhost/huong_doi_tuong/du_an/Home/my_cart');
    }
    public function update_cart($id_gio_hang)
    {
        $action = isset($_POST['action']) ? $_POST['action'] : "";
        $update_quantity = isset($_POST['update_quantity']) ? $_POST['update_quantity'] : $_POST['quantity'];
        $_SESSION['my_cart'][$id_gio_hang]['so_luong'] = $update_quantity;
        header('location:http://localhost/huong_doi_tuong/du_an/Home/my_cart');
    }
    public function bill_cart()
    {
        // if(isset($_SESSION['my_cart'])) { 
        //     $introduce_tk = $_SESSION['my_cart'];
        //    var_dump($introduce_tk);
        //    die();
        // }

        $data = [
            'pages' => 'cart/bill_cart',
            'Allcategory' => $this->category->getAll(),
            'gio_hang' =>  $_SESSION['my_cart'],
            'introduce_tk' => $_SESSION['introduce_tk'],
        ];
        $this->view('masterlayout', $data);
    }

    public function hoa_don_chi_tiet()
    {


        if (
            !isset($_POST['user_tk']) ||
            !isset($_POST['dia_chi']) ||
            !isset($_POST['tel'])

        ) {
            $_SESSION['check_introduce_bill'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/Home/bill_cart');
            die();
        }
        if (
            empty($_POST['user_tk']) ||
            empty($_POST['dia_chi']) ||
            empty($_POST['tel'])

        ) {
            $_SESSION['check_introduce_bill'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/Home/bill_cart');
            die();
        }
        if (strlen($_POST['tel']) < 10) {
            $_SESSION['check_introduce_bill'] = 'sdt không hợp lệ';
            header('location:http://localhost/huong_doi_tuong/du_an/Home/bill_cart');
            die();
        }

        if (isset($_SESSION['tong_tien'])) {
            $total = $_SESSION['tong_tien'];
        }

        $bill = [
            'bill_name' => $_POST['user_tk'],
            'bill_address' => $_POST['dia_chi'],
            'bill_tell' => $_POST['tel'],
            'ghi_chu' => $_POST['ghi_chu'],
            'ngay_dat_hang' => date('h:i:a d/m/Y'),
            'tong_tien' => $total,
            //    'tong_tien'=>

        ];
        $id_bill = $this->bill->insert_bill($bill);
        if (isset($_SESSION['my_cart'])) {

            foreach ($_SESSION['my_cart'] as $my_cart) {
                $cart = [
                    'id_hoa_don' => $my_cart['id_gio_hang'],
                    'id_user' => $my_cart['id_user'],
                    'id_products' => $my_cart['id_products'],
                    'img' => $my_cart['img'],
                    'user' => $my_cart['user'],
                    'price' => $my_cart['gia'],
                    'so_luong' => $my_cart['so_luong'],
                    'thanh_tien' => ($my_cart['gia'] * $my_cart['so_luong']),
                    'id_bill' => $id_bill,
                ];
                $this->bill->insert_cart($cart);
                $this->sanpham->update_so_luong_san_pham($cart['id_products'], $cart['so_luong']);
            }
        }
        unset($_SESSION['my_cart']);
        $_SESSION['check_kq'] = 'Đặt hàng thành công';
        header('location:http://localhost/huong_doi_tuong/du_an/Home/bill_cart');
    }


    public function show_cart($id_user)
    {
        $data = [
            'pages' => 'cart/show_cart',
            'Allcategory' => $this->category->getAll(),
            'select_bill' => $this->bill->select_bill($id_user),
        ];
        $this->view('masterlayout', $data);
    }
    public function  select_deltai_bill($id_bill)
    {
        $data = [
            'pages' => 'cart/deltai_bill_cart',
            'Allcategory' => $this->category->getAll(),
            'select_deltai_bill' => $this->bill->select_deltai_bill($id_bill),
        ];
        $this->view('masterlayout', $data);
    }


    //hủy đơn
    public function cancel_bill($id, $id_user)
    {
        $data = $this->bill->select_deltai_bill($id);
        foreach ($data as $value) {
            extract($value);
            $this->sanpham->update_so_luong_san_pham2($id_products, $so_luong);
        }
        $this->bill->delete_bill($id);
        $this->bill->delete_cart($id);
        header("location:http://localhost/huong_doi_tuong/du_an/Home/show_cart/$id_user");
    }

    //xóa đơn
    public function delete_bill($id, $id_user)
    {
        $this->bill->delete_bill($id);
        $this->bill->delete_cart($id);
        header("location:http://localhost/huong_doi_tuong/du_an/Home/show_cart/$id_user");
    }
    //end trang gio hàng

}
