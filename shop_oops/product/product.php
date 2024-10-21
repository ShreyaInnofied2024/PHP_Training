<?php

include('../database/database.php');
class Product
{
    private $db;
    public function __construct(
        public $name,
        public $quantity,
        public $price
    ){
        $this->db = new Database();
    }

    public function add()
    {
        $query = "INSERT INTO product(name, quantity, price) VALUES (:name, :quantity, :price)";
        $params = [':name' => $this->name,':quantity' => $this->quantity,':price' => $this->price];
        $this->db->executeQuery($query,$params);
        echo "New Record Added <br>";
    }

    public function list(){
        $query = "SELECT id, name, quantity, price FROM product";
        $stmt=$this->db->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function view($id){
        $query = "SELECT name, quantity, price FROM product where id=$id";
        $stmt=$this->db->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $query= "UPDATE product SET name = :name, quantity = :quantity, price = :price WHERE id = :id";
        $params = [':id' => $_POST['id'],':name' => $_POST['name'],':quantity' => $_POST['quantity'],':price' => $_POST['price']];
        $this->db->executeQuery($query,$params);
        echo "Record Updated <br>";
    }
    
    public function delete($id)
    {
        $query = "DELETE FROM product where id=$id";
        $stmt=$this->db->executeQuery($query);
        echo "Sucessfully deleted <br>";
    }
}