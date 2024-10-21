<?php

include('../database/database.php');
class Category
{
    private $db;
    public function __construct(
        public $name,
        public $quantity,
    ){
        $this->db = new Database();
    }

    public function add()
    {
        $query = "INSERT INTO Category(name, quantity) VALUES (:name, :quantity)";
        $params = [':name' => $this->name,':quantity' => $this->quantity];
        $this->db->executeQuery($query,$params);
        echo "New Category Added <br>";
    }

    public function list(){
        $query = "SELECT id, name, quantity FROM Category";
        $stmt=$this->db->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function view($id){
        $query = "SELECT name, quantity FROM Category where id=$id";
        $stmt=$this->db->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $query= "UPDATE Category SET name = :name, quantity = :quantity WHERE id = :id";
        $params = [':id' => $_POST['id'],':name' => $_POST['name'],':quantity' => $_POST['quantity']];
        $this->db->executeQuery($query,$params);
        echo "Record Updated <br>";
    }
    
    public function delete($id)
    {
        $query = "DELETE FROM Category where id=$id";
        $stmt=$this->db->executeQuery($query);
        echo "Sucessfully deleted <br>";
    }
}