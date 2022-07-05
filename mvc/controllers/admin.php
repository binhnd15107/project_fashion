<?php class admin extends controller
{
    protected $category;
    protected $products;
    protected $comment;
    protected $bill;
    function __construct()
    {
        $this->category = $this->Model('category_products');
        $this->products = $this->Model('sanpham');
        $this->comment = $this->Model('binh_luan');
        $this->bill = $this->Model('cart');
        $this->customer = $this->model('customer');
    }

    public function index()
    {
}


    //view_category
    public function view_category()
    {
        $data = [
            'pages' => 'category_products/insert_category',
            'Allcategory' => $this->category->getAll(),
        ];
        $this->viewadmin(
            'masterlayout',
            $data
        );
    }
    //insert_category
    public function insert_category()
    {
        if (!isset($_POST['ten_danh_muc']) || empty($_POST['ten_danh_muc'])) {
            $_SESSION['check_category'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/admin/view_category');
            die();
        }

        $data = [
            'pages' => 'category_products/insert_category',
            'insert' => $this->category->insert([
                'ten_danh_muc' => $_POST['ten_danh_muc']
              
            ]),
            'Allcategory' => $this->category->getAll(),
        ];
        $this->viewadmin(
            'masterlayout',
            $data
        );
    }

    //delete_category
    public function delete_category($id)
    {
        $data = [
            'pages' => 'category_products/insert_category',
            'delete-category' => $this->category->delete($id),
            'Allcategory' => $this->category->getAll(),

        ];
        $this->viewadmin(
            'masterlayout',
            $data
        );
    }
    //edit_category 
    public function edit_category($id)
    {
        $data = [
            'pages' => 'category_products/insert_category',
            'finbyid-category' => $this->category->finbyid($id),
            'Allcategory' => $this->category->getAll(),
        ];
        $this->viewadmin(
            'masterlayout',
            $data
        );
    }
    //update_category{}
    public function update_category()
    {
        $id = $_POST['id'];

        if (!isset($_POST['ten_danh_muc']) || empty($_POST['ten_danh_muc'])) {
            $_SESSION['check_category'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/admin/edit_category/$id");
            die();
        }
        $row = [
            'id' => $id,
            'ten_danh_muc' => $_POST['ten_danh_muc'],
        ];

        $data = [
            'pages' => 'category_products/insert_category',
            'update-category' => $this->category->update($row),
            'Allcategory' => $this->category->getAll(),
        ];
        $this->viewadmin(
            'masterlayout',
            $data
        );
    }


    //view_product
    public function view_products($page = 1)
    {
        $data = [
            'bien' => $page,
            'pages' => 'admin_products/shows_products',
            'san_pham' => $this->products->sanpham($page),
            'phantrang' => $this->products->phantrang(),
            'current_page' => $this->products->current_page,
            'Allcategory' => $this->category->getAll(),

        ];
        $this->viewadmin('masterlayout', $data);
    }

    //select sản phẩm admin theo mã
    public function select_san_pham_where_loai($id_danh_muc, $page = 1)
    {

        $data = [
            'bien' => $page,
            'pages' => 'category_products/products_by_category',
            'Allcategory' => $this->category->getAll(),
            'san_pham_theo_danh_muc' => $this->products->select_sanpham_where_danhmuc($id_danh_muc, $page),
            'phantrang' => $this->products->phantrang_products_category($id_danh_muc),
            'current_page' => $this->products->current_page,
        ];
        $this->viewadmin(
            'masterlayout',
            $data
        );
    }

    //create_products
    public function create_products()
    {
        $data = [
            'pages' => 'admin_products/create_products',
            'Allcategory' => $this->category->getAll(),
        ];
        $this->viewadmin('masterlayout', $data);
    }
    //insert products
    public function store()
    {

        if (
            !isset($_POST['ten_sp']) ||
            !isset($_POST['ma_sp']) ||
            !isset($_POST['so_luong']) ||
            !isset($_POST['gia']) ||
            !isset($_POST['id_danh_muc']) ||
            !isset($_POST['mo_ta'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/admin/create_products');
            die();
        }
        if (
            empty($_POST['ten_sp']) ||
            empty($_POST['ma_sp']) ||
            empty($_POST['so_luong']) ||
            empty($_POST['gia']) ||
            empty($_POST['id_danh_muc']) ||
            empty($_POST['mo_ta'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/admin/create_products');
            die();
        }
        if (
            !is_numeric($_POST['so_luong']) || $_POST['so_luong'] < 0 ||
            !is_numeric($_POST['gia']) || $_POST['gia'] < 0
        ) {
            $_SESSION['a'] = 'phải là số dương';
            header('location:http://localhost/huong_doi_tuong/du_an/admin/create_products');
            die();
        }
        if (isset($_FILES['img'])) {
            $filename = $_FILES['img']['name'];
        }
        if ($_FILES['img']['size'] > 3072000) {
            $_SESSION['a'] = 'image kh được quá 3m';
            header('location:http://localhost/huong_doi_tuong/du_an/admin/create_products');
            die();
        }
        if (strpos($_FILES['img']['type'], 'image') === false) {
            $_SESSION['a'] = 'image kh phải ảnh';
            header('location:http://localhost/huong_doi_tuong/du_an/admin/create_products');
            die();
        }
        $hihi = [
            'ten_sp' => $_POST['ten_sp'],
            'ma_sp' => $_POST['ma_sp'],
            'so_luong' => $_POST['so_luong'],
            'gia' => $_POST['gia'],
            'mo_ta' => $_POST['mo_ta'],
            'id_danh_muc' => $_POST['id_danh_muc']
        ];
        $save = './public/assets/img/' . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $save);
        $hihi['img'] = $save;
        if (isset($_FILES['imgs'])) {
            $filenames = $_FILES['imgs']['name'];
        }
        foreach ($filenames as $key => $value) {
            move_uploaded_file($_FILES['imgs']['tmp_name'][$key], './public/assets/img/' . $value);
        }
        $kq = $this->products->insert($hihi);
        foreach ($filenames as $key => $value) {
            $this->products->insert_img([
                'id' => $kq,
                'values' => $value,
            ]);
        }
        $this->viewadmin('masterlayout', [
            'pages' => 'admin_products/create_products',
            'Allcategory' => $this->category->getAll(),
            'insert_products' => $kq,

        ]);
    }

    //delete_products_by_category
    public function detete_category_products($id, $page = 1, $id_danh_muc)
    {

        $this->products->delete($id);
        $this->products->sanpham($page);
        header("location:http://localhost/huong_doi_tuong/du_an/admin/select_san_pham_where_loai/$id_danh_muc/$page");
    }
    //end

    //delete products
    public function detete_products($id, $page = 1)
    {

        $this->products->delete($id);
        $this->products->sanpham($page);
        header("location:http://localhost/huong_doi_tuong/du_an/admin/view_products/$page");
    }
    //edit products
    public function edit_products($id, $page = 1)
    {
        $data = [
            'bien' => $page,
            'pages' => 'admin_products/edit_products',
            'Allcategory' => $this->category->getAll(),
            'finbyid' => $this->products->funbyid($id),

        ];
        $this->viewadmin('masterlayout', $data);
    }
    //update products
    public function update_products()
    {
        $id = $_POST['id'];
        $page = $_POST['bien_phantrang'];
        if (
            !isset($_POST['ten_sp']) ||
            !isset($_POST['ma_sp']) ||
            !isset($_POST['so_luong']) ||
            !isset($_POST['gia']) ||
            !isset($_POST['id_danh_muc']) ||
            !isset($_POST['mo_ta'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/admin/edit_products/$id/$page");
            die();
        }
        if (
            empty($_POST['ten_sp']) ||
            empty($_POST['ma_sp']) ||
            empty($_POST['so_luong']) ||
            empty($_POST['gia']) ||
            empty($_POST['id_danh_muc']) ||
            empty($_POST['mo_ta'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/admin/edit_products/$id");
            die();
        }
        if (
            !is_numeric($_POST['so_luong']) || $_POST['so_luong'] < 0 ||
            !is_numeric($_POST['gia']) || $_POST['gia'] < 0
        ) {
            $_SESSION['a'] = 'phải là số dương';
            header("location:http://localhost/huong_doi_tuong/du_an/admin/edit_products/$id");
            die();
        }

        $hihi = [
            'id' => $_POST['id'],
            'ten_sp' => $_POST['ten_sp'],
            'ma_sp' => $_POST['ma_sp'],
            'so_luong' => $_POST['so_luong'],
            'gia' => $_POST['gia'],
            'mo_ta' => $_POST['mo_ta'],
            'id_danh_muc' => $_POST['id_danh_muc']
        ];

        $this->products->update($hihi);
        header("location:http://localhost/huong_doi_tuong/du_an/admin/view_products/$page");
    }
    // top sp có lượt xem cao
    public function select_luot_xem($page = 1)
    {
        $data = [
            'pages' => 'admin_products/top_luot_xem',
            'Allcategory' => $this->category->getAll(),
            'phantrang' => $this->products->count_so_luot_xem(),
            'top_luot_xem' => $this->products->top_luot_xem($page),
        ];
        $data['current_page'] = $this->products->current_page;
        $this->viewadmin('masterlayout', $data);
    }

    //BÌnh luân
    public function thong_ke_cmt($page = 1)
    {
        $data = [
            'pages' => 'binh_luan/thong_ke',
            'Allcategory' => $this->category->getAll(),
            'select_cmt' => $this->comment->thongke_cmt($page),
            'phantrang' => $this->comment->phantrang_cmt(),


        ];
        $data['current_page'] = $this->comment->current_page;
        $this->viewadmin('masterlayout', $data);
    }
    public function deltai_cmt($id_products)
    {
        $data = [
            'pages' => 'binh_luan/deltai_cmt',
            'Allcategory' => $this->category->getAll(),
            'deltai_cmt' => $this->comment->deltai_cmt($id_products),
        ];
        $this->viewadmin('masterlayout', $data);
    }
    public function delete_deltai_cmt($id, $id_products)
    {
        $this->comment->delete_deltai($id);

        header("location:http://localhost/huong_doi_tuong/du_an/admin/deltai_cmt/$id_products");
    }
    //đơn hàng
    public function bill_cart()
    {
        $data = [
            'pages' => 'bill/bill_cart',
            'Allcategory' => $this->category->getAll(),
            'select_bill' => $this->bill->select_bill_admin(),
        ];
        $this->viewadmin('masterlayout', $data);
    }
    //delete_bill_
    public function cancel_bill($id)
    {
        $data = $this->bill->select_deltai_bill($id);
        foreach ($data as $value) {
            extract($value);
            $this->products->update_so_luong_san_pham2($id_products, $so_luong);
        }
        $this->bill->delete_bill($id);
        $this->bill->delete_cart($id);

        header('location:http://localhost/huong_doi_tuong/du_an/admin/bill_cart');
    }
    public function delete_bill($id)
    {
        $this->bill->delete_bill($id);
        $this->bill->delete_cart($id);

        header('location:http://localhost/huong_doi_tuong/du_an/admin/bill_cart');
    }
    //end

    public function update_bill_cart($id_bill)
    {
        if (isset($_POST['trang_thai'])) {
            $trang_thai = $_POST['trang_thai'];
            $this->bill->update_bill_cart($trang_thai, $id_bill);

            header('location:http://localhost/huong_doi_tuong/du_an/admin/bill_cart');
        }
    }

    //delete_bill_ở phần danh sách khách hàng
    public function cancel_bill_me($id)
    {
        $data = $this->bill->select_deltai_bill($id);
        foreach ($data as $value) {
            extract($value);
            $this->products->update_so_luong_san_pham2($id_products, $so_luong);
        }
        $this->bill->delete_bill($id);
        $this->bill->delete_cart($id);
        if (isset($_SESSION['bill_khach_hang'])) {
            $kq = $_SESSION['bill_khach_hang'];
            unset($_SESSION['bill_khach_hang']);
            header("location:http://localhost/huong_doi_tuong/du_an/admin/select_bill_khachhang/$kq");
            die();
        }
    }
    public function delete_bill_me($id)
    {

        $this->bill->delete_bill($id);
        $this->bill->delete_cart($id);
        if (isset($_SESSION['bill_khach_hang'])) {
            $kq = $_SESSION['bill_khach_hang'];
            unset($_SESSION['bill_khach_hang']);
            header("location:http://localhost/huong_doi_tuong/du_an/admin/select_bill_khachhang/$kq");
            die();
        }
    }
    //end
    public function update_bill_cart_me($id_bill)
    {
        if (isset($_POST['trang_thai'])) {
            $trang_thai = $_POST['trang_thai'];
            $this->bill->update_bill_cart($trang_thai, $id_bill);
            if (isset($_SESSION['bill_khach_hang'])) {
                $kq = $_SESSION['bill_khach_hang'];
                unset($_SESSION['bill_khach_hang']);
                header("location:http://localhost/huong_doi_tuong/du_an/admin/select_bill_khachhang/$kq");
                die();
            }
        }
    }


    // CUSTOMER

    public function select_customer()
    {
        $data = [
            'pages' => 'Customer/customer',
            'Allcategory' => $this->category->getAll(),
            'select_khachhang' => $this->customer->select_khachhang(),

        ];
        $this->viewadmin('masterlayout', $data);
    }
    public function select_bill_khachhang($id_kh)
    {
        $data = [
            'pages' => 'Customer/bill_me',
            'Allcategory' => $this->category->getAll(),
            'select_bill_khachhang' => $this->customer->select_bill_khachhang($id_kh),

        ];
        $this->viewadmin('masterlayout', $data);
    }
}
