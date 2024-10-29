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
    $this->db->query('INSERT INTO category(name) VALUES (:name)');
    $this->db->bind(':name',$data['name']);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}

// public function getCategoryById($id){
//     $this->db->query('SELECT * FROM category WHERE id=:id');
//     $this->db->bind(':id',$id);
//     $row=$this->db->single();
//     return $row;
// }

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

public function updateCategoryQuantityOnAdd($categoryId,$quantity){
    $this->db->query('UPDATE category SET quantity = IFNULL(quantity, 0) + :quantity  WHERE id = :category_id');
    $this->db->bind(':quantity',$quantity);
    $this->db->bind('category_id',$categoryId);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}

public function updateCategoryQuantityOnDelete($categoryId,$quantity){
    $this->db->query('UPDATE category SET quantity = quantity - :quantity WHERE id = :category_id');
    $this->db->bind(':quantity',$quantity);
    $this->db->bind('category_id',$categoryId);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}

public function getCategoryById($id) {
    $this->db->query("SELECT 
                category.id AS category_id,
                category.name AS category_name,
                category.quantity AS category_quantity,
                product.name AS product_name,
                product.quantity AS product_quantity,
                product.price AS product_price,
                product.type AS product_type
            FROM 
                category
            LEFT JOIN 
                product ON category.id = product.category_id
            WHERE 
                category.id = :id");
    $this->db->bind(':id', $id);
    $results = $this->db->resultSet();
    return $results;
}


}