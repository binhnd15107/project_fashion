<?php 
class cart extends DB{
    protected $item_per_page = 3;
    public $current_page;
    public function insert_bill($data){
        $sql = 'INSERT INTO bill(bill_name,bill_address,bill_tell,ghi_chu,ngay_dat_hang,tong_tien) VALUES (:bill_name,:bill_address,:bill_tell,:ghi_chu,:ngay_dat_hang,:tong_tien) ';
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return $this->conn->lastInsertId();         
    }
    public function insert_cart($data){
        $sql = 'INSERT INTO cart(id_hoa_don,id_user,id_products,img,user,price,so_luong,thanh_tien,id_bill)  VALUES (:id_hoa_don,:id_user,:id_products,:img,:user,:price,:so_luong,:thanh_tien,:id_bill) ';
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }
    //select_bill của khách hàng
    public function select_bill($id_user){
    
        $sql = "SELECT cart.id_user, cart.id_bill,SUM(so_luong)so_luong,bill.ngay_dat_hang,bill.ghi_chu,bill.tong_tien,bill.trang_thai FROM cart JOIN bill ON cart.id_bill=bill.id WHERE cart.id_user=:id_user GROUP BY id_bill ORDER BY cart.id_bill DESC";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id_user'=>$id_user]);
        return $statement->fetchAll();
    }
    //select _bill của admin
      public function select_bill_admin(){
    
        $sql = "SELECT  cart.id_user, cart.id_bill,SUM(so_luong)so_luong,bill.ngay_dat_hang,bill.ghi_chu,bill.tong_tien,bill.trang_thai ,bill.bill_name,bill.bill_address FROM cart JOIN bill ON cart.id_bill=bill.id  GROUP BY id_bill ORDER BY cart.id_bill DESC";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function phantrang_bill()
    {
        $sql = "SELECT COUNT(*) FROM bill";  
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $totalRecords =$statement->fetchColumn();;
        $totalPages = ceil($totalRecords / 5);
        return     $totalPages;
    }
    public function select_deltai_bill($id){
        $sql = "SELECT cart.id_products, cart.id_bill,cart.img,cart.price,cart.so_luong,cart.thanh_tien,san_pham.ten_sp FROM cart JOIN san_pham ON cart.id_products =san_pham.id WHERE id_bill=:id_bill";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id_bill'=>$id]);
        return $statement->fetchAll();
    }
    public function delete_bill($id){
        $sql = "DELETE FROM bill WHERE id=:id_bill";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id_bill'=>$id]);
        return true;
    }
    public function delete_cart($id){
        $sql = "DELETE FROM cart WHERE id_bill=:id_bill";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id_bill'=>$id]);
        return true;  
    }
    public function update_bill_cart($trang_thai,$id_bill){
        $sql = "UPDATE bill SET trang_thai=:trang_thai WHERE id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['trang_thai'=>$trang_thai,
    'id'=>$id_bill
    ]);
        return true;
    }
    
    
}
?>