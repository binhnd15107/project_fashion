<?php 
class DB{
    protected $conn;
    function __construct()
    {    
    $this->conn=new PDO('mysql:host=localhost;dbname=du_an_mau','root','');
    
    }
}
?>