<?php 
class login_tk extends DB {
    public function insert($data){
        $sql='INSERT INTO tai_khoan(user,email,mat_khau,dia_chi,tel,img) VALUES (:user,:email,:mat_khau,:dia_chi,:tel,:img)';
        $statement=$this->conn->prepare($sql);
        $statement->execute($data);
        return true;
}

public function getAll(){
    $sql='SELECT*FROM tai_khoan';
    $statement=$this->conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(); 
}
public function dangnhap($data){
    $sql='SELECT*FROM tai_khoan WHERE email=:email AND mat_khau=:mat_khau';
    $statement=$this->conn->prepare($sql);
    $statement->execute($data);
    return $statement->fetch(); 
} 
public function finbyid($id){
    $sql='SELECT*FROM tai_khoan WHERE id=:id';
    $statement=$this->conn->prepare($sql);
    $statement->execute(['id'=>$id]);
    return $statement->fetch(); 
} 
public function update($data){
    $sql='UPDATE tai_khoan SET user=:user,email=:email,dia_chi=:dia_chi,tel=:tel,img=:img WHERE id=:id ';
    $statement=$this->conn->prepare($sql);
    $statement->execute($data);
    return true; 
}
public function update_mk($data){
    $sql='UPDATE tai_khoan SET mat_khau=:mat_khau WHERE id=:id';
    $statement=$this->conn->prepare($sql);
    $statement->execute($data);
    return true; 
}
public function select_mk($email){
    $sql='SELECT*FROM tai_khoan WHERE email=:email';
    $statement=$this->conn->prepare($sql);
    $statement->execute(['email'=>$email]);
    return $statement->fetch();    
}

}

