<?php
class Product{
private $db;

public function __construct(){
    $this->db=new Database;
}
public function getProducts(){
    $this->db->query('Select * from product');
    $results=$this->db->resultSet();
    return $results;
}

public function add($data){
    $this->db->query('INSERT INTO product(name,quantity,price) VALUES (:name,:quantity,:price)');
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':quantity',$data['quantity']);
    $this->db->bind(':price',$data['price']);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}

public function getProductById($id){
    $this->db->query('SELECT * FROM product WHERE id=:id');
    $this->db->bind(':id',$id);
    $row=$this->db->single();
    return $row;
}

public function edit($data){
$this->db->query('UPDATE product SET name=:name,quantity=:quantity,price=:price WHERE id=:id');
$this->db->bind(':id',$data['id']);
$this->db->bind(':name',$data['name']);
$this->db->bind(':quantity',$data['quantity']);
$this->db->bind(':price',$data['price']);
if($this->db->execute()){
    return true;
}else{
    return false;
}
}




public function delete($id){
    $this->db->query('DELETE FROM product WHERE id=:id');
    $this->db->bind(':id',$id);
   if($this->db->execute()){
    return true;
   }else{
    return false;
   }
}
}