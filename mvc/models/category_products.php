<?php 
class category_products extends DB{
    public function insert($data){
$sql='INSERT INTO danh_muc(ten_danh_muc) VALUES (:ten_danh_muc)';
$statement=$this->conn->prepare($sql);
$statement->execute($data);
return true;
    }
    public function getAll(){
        $sql='SELECT * FROM danh_muc ORDER BY id DESC';
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(); 
    }
    public function delete($id){
        $sql='DELETE FROM danh_muc WHERE id=:id';
        $statement=$this->conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        return true;
    }
    public function finbyid($id){
        $sql='SELECT*FROM danh_muc WHERE id=:id ';
        $statement=$this->conn->prepare($sql);
        $statement->execute(['id'=> $id]);
        return $statement->fetch();
    }
    public function update($data){
        $sql='UPDATE danh_muc SET  ten_danh_muc=:ten_danh_muc WHERE id=:id ';
        $statement=$this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }
}
?>