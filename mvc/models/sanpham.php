<?php
class sanpham extends DB
{
    // phương thức dùng để phân trang
    protected $item_per_page = 4;
    public $current_page;

    // update so lượng sản phấm sau mỗi lần mua.
    
    public function update_so_luong_san_pham($id,$so_luong)
    {
        $sql = "UPDATE san_pham SET so_luong=so_luong - $so_luong WHERE id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        return true;
    }

    //UPDATE SỐ LƯỢNG SẢN PHẨM SAU MỖI LẦN HỦY ĐƠN
    public function update_so_luong_san_pham2($id,$so_luong)
    {
        $sql = "UPDATE san_pham SET so_luong=so_luong + $so_luong WHERE id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        return true;
    }
    //end

    
    //trang sản phẩm admin


    public function sanpham($page)
    {
        $this->current_page = isset($page) ? $page : 1;
        $offset = ($this->current_page - 1) * $this->item_per_page;
        $sql = "SELECT san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id ORDER BY san_pham.id DESC LIMIT " . $this->item_per_page . " OFFSET " . $offset . " ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function select_sanpham_where_danhmuc($id_danh_muc,$page){
        $this->current_page = isset($page) ? $page : 1;
        $offset = ($this->current_page - 1) * 3;
        $sql = "SELECT  san_pham.id_danh_muc, san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id WHERE danh_muc.id=:id ORDER BY san_pham.id DESC LIMIT $offset,3 ";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id'=>$id_danh_muc]);
        return $statement->fetchAll();
    }
    public function select_sanpham_where_danhmuc_home($id_danh_muc){
        $sql = "SELECT  san_pham.id_danh_muc, san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id WHERE danh_muc.id=:id ORDER BY san_pham.id DESC ";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id'=>$id_danh_muc]);
        return $statement->fetchAll();
    }

    //phân trang
    public function phantrang()
    {
        $sql = 'SELECT count(*) FROM san_pham ';
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $totalRecords = $statement->fetchColumn();

        $totalPages = ceil($totalRecords / $this->item_per_page);
        return     $totalPages;
    }
 // phân trang của sản phẩm theo danh mục
    public function phantrang_products_category($id)
    {
        $sql = 'SELECT count(*) FROM san_pham WHERE id_danh_muc=:id ';
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        $totalRecords = $statement->fetchColumn();

        $totalPages = ceil($totalRecords /3);
        return     $totalPages;
    }
    //end


    ///trang sản phẩm ở Online Shop
    public function trang_sanpham($page)
    {
        $this->current_page = isset($page) ? $page : 1;
        $offset = ($this->current_page - 1) * 8;
        $sql = "SELECT san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id ORDER BY san_pham.id DESC LIMIT $offset,8";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    //trang tìm kiếm sả phẩm
public function trang_timkiem_sanpham($id)
{
    $sql = "SELECT san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id WHERE san_pham.ten_sp LIKE '%$id%'ORDER BY san_pham.id DESC";
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}
    //phân trang của trang san pham
    public function phantrang_trang_sanpham()
    {
        $sql = 'SELECT count(*) FROM san_pham ';
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $totalRecords = $statement->fetchColumn();

        $totalPages = ceil($totalRecords / 8);
        return     $totalPages;
    }
    //end

    ///// trang sản phẩm ở trang chủ
    public function sanpham_home()
    {
        $sql = "SELECT san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id ORDER BY san_pham.id DESC ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function sanpham_top10_home()
    {
        $sql = "SELECT san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id ORDER BY san_pham.id DESC LIMIT 0,10 ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    //end
    // detail sản phẩm
    public function sanpham_deltai($id)
    {
        $sql = "SELECT san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id  WHERE san_pham.id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }
    public function img_deltai($id)
    {
        $sql = "SELECT san_pham.id,img_products.image FROM san_pham JOIN img_products ON san_pham.id=img_products.id_products WHERE san_pham.id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }
    //end deltai sản phẩm


    // Thểm Sửa xóa sản phẩm
    public function insert(array $data)
    {
        $sql = 'INSERT INTO san_pham (ten_sp,ma_sp,gia,so_luong,img,mieu_ta,id_danh_muc) VALUES (:ten_sp,:ma_sp,:gia,:so_luong,:img,:mo_ta,:id_danh_muc)';
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        $last_inserted_id = $this->conn->lastInsertId();
        return $last_inserted_id;
    }
    public function insert_img($data)
    {
        $sql = 'INSERT INTO img_products(id_products,image) VALUES (:id,:values)';
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM san_pham WHERE id=:id';
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }
    public function funbyid($id)
    {
        $sql = 'SELECT * FROM san_pham WHERE id=:id';
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id' => $id]);
        $row = $statement->fetchAll();
        if (count($row) > 0) {
            return $row[0];
        }
        return [];
    }

    public function update($data)
    {
        $sql = 'UPDATE san_pham SET ma_sp=:ma_sp,ten_sp=:ten_sp,so_luong=:so_luong,gia=:gia,mieu_ta=:mo_ta,id_danh_muc=:id_danh_muc WHERE id=:id';
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }
    // end thếm sửa xóa sp



    // Số lượt xem của sản phẩm

    // update lượt xem của sản phẩm
    public function update_luot_xem($id)
    {
        $sql = 'UPDATE san_pham SET luot_xem=luot_xem + 1 WHERE id=:id';
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }

    // select top sản phẩm có lượt xem cao
    public function top_luot_xem($page)
    {
        $this->current_page = isset($page) ? $page : 1;
        $offset = ($this->current_page - 1) * 3;
        $sql = "SELECT san_pham.luot_xem, san_pham.id,san_pham.ten_sp,san_pham.ma_sp,san_pham.gia,san_pham.so_luong,san_pham.img,san_pham.mieu_ta,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc=danh_muc.id WHERE san_pham.luot_xem>5 ORDER BY san_pham.luot_xem DESC LIMIT $offset,3";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function count_so_luot_xem()
    {

        $sql = "SELECT COUNT(*) FROM san_pham  WHERE luot_xem>5  ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();

        $totalRecords = $statement->fetchColumn();
        $totalPages = ceil($totalRecords / 3);
        return     $totalPages;
    }
    //end số lượt xem
}
