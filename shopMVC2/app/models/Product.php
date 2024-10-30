<?php
class Product{
private $db;

public function __construct(){
    $this->db=new Database;
}
public function getProducts(){
    $this->db->query("SELECT 
                product.id, 
                product.name, 
                product.quantity, 
                product.price,
                product.type,
                product.category_id,
                category.name AS category_name
            FROM 
                product
            LEFT JOIN 
                category ON  category.id=product.category_id");
    $results=$this->db->resultSet();
    return $results;
}

public function add($data){
    $this->db->query('INSERT INTO product(name,quantity,price,type,category_id) VALUES (:name,:quantity,:price,:type,:category_id)');
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':quantity',$data['quantity']);
    $this->db->bind(':price',$data['price']);
    $this->db->bind(':type',$data['type']);
    $this->db->bind(':category_id',$data['category']);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}

public function getProductById($id) {
    $this->db->query("SELECT 
                product.id, 
                product.name, 
                product.quantity, 
                product.price, 
                product.type,
                product.category_id,
                category.name AS category_name
            FROM 
                product
            LEFT JOIN 
                category ON category.id = product.category_id
            WHERE 
                product.id = :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
}

    public function getProductsById($id) {
        $this->db->query("SELECT * FROM product WHERE id = :id");
        $this->db->bind(':id', $id);
        $product = $this->db->single();
        return $product ? $product : [];
    }




public function edit($data){
$this->db->query('UPDATE product SET name=:name,quantity=:quantity,price=:price, type =:type, category_id=:category_id WHERE id=:id');
$this->db->bind(':id',$data['id']);
$this->db->bind(':name',$data['name']);
$this->db->bind(':quantity',$data['quantity']);
$this->db->bind(':price',$data['price']);
$this->db->bind(':type',$data['type']);
$this->db->bind(':category_id',$data['category']);
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

public function getProductByType($type) {
    $this->db->query("SELECT 
                product.id, 
                product.name, 
                product.quantity, 
                product.price,
                product.category_id,
                category.name AS category_name
            FROM 
                product
            LEFT JOIN 
                category ON category.id = product.category_id
            WHERE 
                product.type= :type");
    $this->db->bind(':type', $type);
    $results=$this->db->resultSet();
    return $results;
}

public function deleteByCategory($category){
    $this->db->query('DELETE FROM product WHERE category_id=:category');
    $this->db->bind(':category',$category);
   if($this->db->execute()){
    return true;
   }else{
    return false;
   }
}


}