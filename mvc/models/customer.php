<?php 
class customer extends DB{
 
    public function select_khachhang(){
        $sql = 'SELECT * FROM tai_khoan WHERE vai_tro=0 ';
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function select_bill_khachhang($id){
        $sql = ' SELECT cart.id_user, cart.id_bill,SUM(so_luong)so_luong,bill.ngay_dat_hang,bill.ghi_chu,bill.tong_tien,bill.trang_thai FROM cart JOIN bill ON cart.id_bill=bill.id WHERE cart.id_user=:id GROUP BY id_bill ORDER BY cart.id_bill DESC ';
        $statement = $this->conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        return $statement->fetchAll();
       
    }

}
?>