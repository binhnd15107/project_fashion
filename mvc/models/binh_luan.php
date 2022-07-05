<?php class binh_luan extends DB
{
    protected $item_per_page = 3;
    public $current_page;
    public function insert_bill($data){
        $sql = 'INSERT INTO bill(bill_name,bill_address,bill_tell,ghi_chu,ngay_dat_hang,tong_tien) VALUES (:bill_name,:bill_address,:bill_tell,:ghi_chu,:ngay_dat_hang,:tong_tien) ';
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        // return  true;         
    }

    public function insert($data)
    {
        $sql = 'INSERT INTO binh_luan(noi_dung,id_user,id_products,ngay_binh_luan) VALUES (:noi_dung,:id_user,:id_products,:ngay_binh_luan)';
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }
    public function getAll_binh_luan($id, $page)
    {

        $this->current_page = isset($page) ? $page : 1;
        $offset = ($this->current_page - 1) * $this->item_per_page;
        $sql = "SELECT binh_luan.ngay_binh_luan, binh_luan.noi_dung,binh_luan.ngay_binh_luan,tai_khoan.user,binh_luan.id_products,binh_luan.id,tai_khoan.img FROM binh_luan JOIN tai_khoan ON tai_khoan.id=binh_luan.id_user WHERE binh_luan.id_products=:id ORDER BY binh_luan.id DESC LIMIT " . $offset . "," . $this->item_per_page . "";
        $statement = $this->conn->prepare($sql);
        $statement->execute([
            'id' => $id,
            // 'offset'=>$offset,
            // 'item_per_page'=>$this->item_per_page,
        ]);
        return $statement->fetchAll();
    }
    //PHÂN TRANG 
    public function phantrang($id_products)
    {
        $sql = 'SELECT COUNT(*) FROM binh_luan WHERE id_products=:id_products ';
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id_products' => $id_products]);
        $totalRecords = $statement->fetchColumn();
        $totalPages = ceil($totalRecords / $this->item_per_page);
        return     $totalPages;
    }
    public function delete_cmt($id)
    {
        $sql = 'DELETE FROM binh_luan WHERE id=:id';
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }
    public function thongke_cmt($page)
    {

        $this->current_page = isset($page) ? $page : 1;
        $offset = ($this->current_page - 1) * 5;
        $sql = "SELECT binh_luan.id_products, binh_luan.id, san_pham.ten_sp,san_pham.ma_sp,COUNT(*)so_luong,MIN(binh_luan.ngay_binh_luan)cu_nhat,MAX(binh_luan.ngay_binh_luan)moi_nhat FROM binh_luan JOIN san_pham ON binh_luan.id_products=san_pham.id GROUP BY san_pham.ten_sp,san_pham.ma_sp HAVING so_luong>0  ORDER BY binh_luan.id DESC LIMIT $offset,5";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function phantrang_cmt()
    {
        $sql = "SELECT COUNT(*)so_luong FROM binh_luan JOIN san_pham ON binh_luan.id_products=san_pham.id GROUP BY san_pham.ten_sp,san_pham.ma_sp  HAVING so_luong>0 ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
  $hihi=  $statement->fetchAll();
        $totalRecords =count($hihi);
        $totalPages = ceil($totalRecords / 5);
        return     $totalPages;
    }
    public function deltai_cmt($id_products){
        
        $sql = "SELECT binh_luan.id_products, binh_luan.id,tai_khoan.user,binh_luan.ngay_binh_luan ,binh_luan.noi_dung FROM binh_luan JOIN tai_khoan ON binh_luan.id_user=tai_khoan.id WHERE binh_luan.id_products=:id_products ORDER BY binh_luan.id DESC LIMIT 0, 25";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id_products'=>$id_products]);
        return $statement->fetchAll();
    }
    public function delete_deltai($id_products){
        $sql = "DELETE FROM binh_luan WHERE id=:id_products";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id_products'=>$id_products]);
        return true;
    }
}
