<?php
class products extends controller
{
    protected $model;
    function __construct()
    {
        $this->model = $this->Model('sanpham');
        $this->model_category = $this->Model('category_products');
        $this->bill=$this->model('cart');
    }

public function index()
    {
        $this->viewadmin('masterlayout', [
            'pages' => 'loai_tin/shows_products',
            'sanpham' => $this->model->sanpham()
        ]);
    }
    public function view_insert()
    {
        $this->viewadmin('masterlayout', [
            'pages' => 'loai_tin/insert',
        ]);
    }
//insert sản phẩm
public function insert()
    {
        if (
            !isset($_POST['ten_sp']) ||
            !isset($_POST['ma_sp']) ||
            !isset($_POST['so_luong']) ||
            !isset($_POST['gia']) ||
            !isset($_POST['don_vi'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/products/view_insert');
            die();
        }
        if (
            empty($_POST['ten_sp']) ||
            empty($_POST['ma_sp']) ||
            empty($_POST['so_luong']) ||
            empty($_POST['gia']) ||
            empty($_POST['don_vi'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header('location:http://localhost/huong_doi_tuong/du_an/products/view_insert');
            die();
        }

        if (isset($_FILES['img'])) {
            $filename = $_FILES['img']['name'];
        }
        if ($_FILES['img']['size'] > 3072000) {
            $_SESSION['a'] = 'image kh được quá 3m';
            header('location:http://localhost/huong_doi_tuong/du_an/products/view_insert');
            die();
        }
        if (strpos($_FILES['img']['type'], 'image') === false) {
            $_SESSION['a'] = 'image kh phải ảnh';
            header('location:http://localhost/huong_doi_tuong/du_an/products/view_insert');
            die();
        }
        $hihi = [
            'ten_sp' => $_POST['ten_sp'],
            'ma_sp' => $_POST['ma_sp'],
            'so_luong' => $_POST['so_luong'],
            'gia' => $_POST['gia'],
            'don_vi' => $_POST['don_vi'],
        ];
        $save = './public/assets/img/' . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $save);
        $hihi['img'] = $save;
        $kq = $this->model->insert($hihi);

        $this->viewadmin('masterlayout', [
            'pages' => 'loai_tin/insert',
            'insert_products' => $kq,
        ]);
    }
//view_show san phẩm
public function view_show()
    {
        $data =  [
            'pages' => 'loai_tin/shows_products',
            'sanpham' => $this->model->sanpham()
        ];
        $this->viewadmin('masterlayout', $data);
    }
//delete sản phẩm
public function delete_products($id)
    {
        $data =  [
            'pages' => 'loai_tin/shows_products',
            'delete' => $this->model->delete($id),
            'sanpham' => $this->model->sanpham(),

        ];
        $this->viewadmin('masterlayout', $data);
    }
//edit sản phẩm
public function edit_products($id)
    {
        $data =  [
            'pages' => 'loai_tin/edit',
            'sanpham' => $this->model->funbyid($id),
        ];
        $this->viewadmin('masterlayout', $data);
    }
// update sản phẩm
public function update_products()
    {
        $id = $_POST['id'];
        if (
            !isset($_POST['ten_sp']) ||
            !isset($_POST['ma_sp']) ||
            !isset($_POST['so_luong']) ||
            !isset($_POST['gia']) ||
            !isset($_POST['don_vi'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/products/edit_products/$id");
            die();
        }
        if (
            empty($_POST['ten_sp']) ||
            empty($_POST['ma_sp']) ||
            empty($_POST['so_luong']) ||
            empty($_POST['gia']) ||
            empty($_POST['don_vi'])
        ) {
            $_SESSION['a'] = 'không được bỏ trống';
            header("location:http://localhost/huong_doi_tuong/du_an/products/edit_products/$id");
            die();
        }

        if (isset($_FILES['img'])) {
            $filename = $_FILES['img']['name'];
        }
        if ($_FILES['img']['size'] > 3072000) {
            $_SESSION['a'] = 'image kh được quá 3m';
            header("location:http://localhost/huong_doi_tuong/du_an/products/edit_products/$id");
            die();
        }
        if (strpos($_FILES['img']['type'], 'image') === false) {
            $_SESSION['a'] = 'image kh phải ảnh';
            header("location:http://localhost/huong_doi_tuong/du_an/products/edit_products/$id");
            die();
        }
        $hihi = [
            'id' => $_POST['id'],
            'ten_sp' => $_POST['ten_sp'],
            'ma_sp' => $_POST['ma_sp'],
            'so_luong' => $_POST['so_luong'],
            'gia' => $_POST['gia'],
            'don_vi' => $_POST['don_vi'],
        ];
        $save = './public/assets/img/' . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $save);
        $hihi['anh'] = $save;

        $kq = $this->model->update($hihi);
        $data = [
            'pages' => 'loai_tin/shows_products',
            'sanpham' => $this->model->sanpham(),
            'insert_edit' => $kq,
        ];
        $this->viewadmin('masterlayout', $data);
    }
}


//inseert danh muc sản phẩm

