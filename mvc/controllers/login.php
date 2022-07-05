<?php class login extends controller
{
    function __construct()
    {
        $this->sanpham = $this->Model('sanpham');
        $this->category = $this->Model('category_products');
        $this->login = $this->Model('login_tk');
        $this->bill=$this->model('cart');
    }
    public function index()
    {
        $data = [
            'pages' => 'home/login_tk',
            'Allcategory' => $this->category->getAll(),
        ];


        $this->View('masterlayout', $data);
    }

    public function login_form()
    {
        $data = [
            'pages' => 'home/login_form',
            'Allcategory' => $this->category->getAll(),
        ];
        $this->View('masterlayout', $data);
    }
    public function insert_login()
    {
        if (
            !isset($_POST['ten_kh']) ||
            !isset($_POST['email']) ||
            !isset($_POST['matkhau']) ||
            !isset($_POST['address']) ||
            !isset($_POST['tel'])
        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/login/login_form');
            die();
        }
        if (
            empty($_POST['ten_kh']) ||
            empty($_POST['email']) ||
            empty($_POST['matkhau']) ||
            empty($_POST['address']) ||
            empty($_POST['tel'])
        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/login/login_form');
            die();
        }
        if (strlen($_POST['matkhau']) < 6) {
            $_SESSION['check_login'] = 'mật khẩu phải từ 6 kí tự';
            header('location:http://localhost/huong_doi_tuong/du_an/login/login_form');
            die();
        }
        if ($_POST['tel'] < 0 || strlen($_POST['tel']) < 10) {
            $_SESSION['check_login'] = 'số điện thoại không hợp lệ';
            header('location:http://localhost/huong_doi_tuong/du_an/login/login_form');
            die();
        }
        if (isset($_FILES['img'])) {
            $filename = $_FILES['img']['name'];
        }
        if ($_FILES['img']['size'] > 3072000) {
            $_SESSION['check_login'] = 'image kh được quá 3m';
            header('location:http://localhost/huong_doi_tuong/du_an/login/login_form');
            die();
        }
        if (strpos($_FILES['img']['type'], 'image') === false) {
            $_SESSION['check_login'] = 'image kh phải ảnh';
            header('location:http://localhost/huong_doi_tuong/du_an/login/login_form');
            die();
        }
        $hihi = [
            'user' => $_POST['ten_kh'],
            'email' => $_POST['email'],
            'mat_khau' => $_POST['matkhau'],
            'dia_chi' => $_POST['address'],
            'tel' => $_POST['tel'],

        ];
        $save = './public/assets/img/' . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $save);
        $hihi['img'] = $save;
        $data = [
            'pages' => 'home/login_form',
            'Allcategory' => $this->category->getAll(),
            'insert_tk' => $this->login->insert($hihi),
        ];
        $this->View('masterlayout', $data);
    }
    public function check_login()
    {
        if (

            !isset($_POST['email']) ||
            !isset($_POST['mat_khau'])

        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/login/');
            die();
        }
        if (

            empty($_POST['email']) ||
            empty($_POST['mat_khau'])

        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/login/');
            die();
        }
        $sotre_login = [
            'email' => $_POST['email'],
            'mat_khau' => $_POST['mat_khau'],
        ];
        $kqq = $this->login->dangnhap($sotre_login);

        if ($kqq == false) {
            $_SESSION['check_login'] = 'Sai email hoặc mật khẩu ';
            header('location:http://localhost/huong_doi_tuong/du_an/login/');
            die();
        } else {
            $_SESSION['introduce_tk'] = $kqq;

            header('location:http://localhost/huong_doi_tuong/du_an/');
        }
    }
    public function display_login()
    {
        $data = [
            'pages' => 'login/show_login',
            'Allcategory' => $this->category->getAll(),
        ];
        $this->View('masterlayout', $data);
    }
    public function unset_login()
    {
        unset($_SESSION['introduce_tk']);
        unset($_SESSION['my_cart']);
        header('location:http://localhost/huong_doi_tuong/du_an/');
    }
    public function edit_tk($id)
    {
        $_SESSION['edit_tk'] = $this->login->finbyid($id);
        header('location:http://localhost/huong_doi_tuong/du_an/login/display_login');
    }
    public function update_tk()
    {
        $id = $_POST['id'];
        if (
            !isset($_POST['ten_kh']) ||
            !isset($_POST['email']) ||
            !isset($_POST['address']) ||
            !isset($_POST['tel'])
        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_tk/$id");
            die();
        }
        if (
            empty($_POST['ten_kh']) ||
            empty($_POST['email']) ||

            empty($_POST['address']) ||
            empty($_POST['tel'])
        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_tk/$id");
            die();
        }

        if ($_POST['tel'] < 0 || strlen($_POST['tel']) < 10) {
            $_SESSION['check_login'] = 'số điện thoại không hợp lệ';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_tk/$id");
            die();
        }
        if (isset($_FILES['img'])) {
            $filename = $_FILES['img']['name'];
        }
        if ($_FILES['img']['size'] > 3072000) {
            $_SESSION['check_login'] = 'image kh được quá 3m';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_tk/$id");
            die();
        }
        if (strpos($_FILES['img']['type'], 'image') === false) {
            $_SESSION['check_login'] = 'image kh phải ảnh';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_tk/$id");
            die();
        }
        $capnhat = [
            'id' => $_POST['id'],
            'user' => $_POST['ten_kh'],
            'email' => $_POST['email'],
            'dia_chi' => $_POST['address'],
            'tel' => $_POST['tel'],

        ];
        $save = './public/assets/img/' . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $save);
        $capnhat['img'] = $save;
        $this->login->update($capnhat);
        header('location:http://localhost/huong_doi_tuong/du_an/login/');
    }
    public function edit_mk($id)
    {
        $_SESSION['edit_mk'] = $this->login->finbyid($id);
        header('location:http://localhost/huong_doi_tuong/du_an/login/display_login');
    }
    public function update_mk()
    {
        $id = $_POST['id'];
        $mk = $_POST['mk'];
        if (
            !isset($_POST['mat_khau_cu']) ||
            !isset($_POST['mat_khau_moi'])

        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_mk/$id");
            die();
        }
        if (
            empty($_POST['mat_khau_cu']) ||
            empty($_POST['mat_khau_moi'])
        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_mk/$id");
            die();
        }
        if (strlen($_POST['mat_khau_moi']) < 6) {
            $_SESSION['check_login'] = 'mật khẩu phải từ 6 kí tự';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_mk/$id");
            die();
        }
        if ($mk != $_POST['mat_khau_cu']) {
            $_SESSION['check_login'] = 'Sai mật khẩu hiện tại';
            header("location:http://localhost/huong_doi_tuong/du_an/login/edit_mk/$id");
            die();
        }
        $capnhat_mk = [
            'id' => $id,
            'mat_khau' => $_POST['mat_khau_moi'],
        ];
        $this->login->update_mk($capnhat_mk);
        header('location:http://localhost/huong_doi_tuong/du_an/login/');
    }
    public function quen_mk()
    {
        $_SESSION['quen_mk'] = 'quen mật khẩu';
        header('location:http://localhost/huong_doi_tuong/du_an/login/');
    }
    public function edit_quen_mk()
    {

        if (

            !isset($_POST['email'])

        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/login/quen_mk");
            die();
        }
        if (
            empty($_POST['email'])
        ) {
            $_SESSION['check_login'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/login/quen_mk");
            die();
        }
        $mk = $this->login->select_mk($_POST['email']);
        if ($mk == true) {
            extract($mk);
            $_SESSION['mk'] = "Mật Khẩu của Bạn là :" . $mat_khau;
            header("location:http://localhost/huong_doi_tuong/du_an/login/quen_mk");
            die();
        } else {
            $_SESSION['check_login'] = 'Sai Tài Khoản';
            header("location:http://localhost/huong_doi_tuong/du_an/login/quen_mk");
            die();
        }
    }
    
}
