<?php
class Categories{
private $db;

public function __construct(){
    $this->db=new Database;
}
public function getCategory(){
    $this->db->query('Select * from category');
    $results=$this->db->resultSet();
    return $results;
}

public function add($data){
    $this->db->query('INSERT INTO category(name,quantity) VALUES (:name,:quantity)');
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':quantity',$data['quantity']);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}

public function getCategoryById($id){
    $this->db->query('SELECT * FROM category WHERE id=:id');
    $this->db->bind(':id',$id);
    $row=$this->db->single();
    return $row;
}

public function edit($data){
$this->db->query('UPDATE category SET name=:name,quantity=:quantity WHERE id=:id');
$this->db->bind(':id',$data['id']);
$this->db->bind(':name',$data['name']);
$this->db->bind(':quantity',$data['quantity']);
if($this->db->execute()){
    return true;
}else{
    return false;
}
}




public function delete($id){
    $this->db->query('DELETE FROM category WHERE id=:id');
    $this->db->bind(':id',$id);
    if($this->db->execute()){
        return true;
       }else{
        return false;
       }
    }
}