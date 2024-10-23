<?php
class Product {
    private $id;
    private $name;
    private $quantity;
    private $price;

    public function __construct($id, $name, $quantity, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        echo "Constructor Product called for {$this->name} <br>";
    }

    // Getter and Setter for ID
    public function getterId() {
        return $this->id;
    }

    public function setterId($id) {
        $this->id = $id;
    }

    // Getter and Setter for Name
    public function getterName() {
        return $this->name;
    }

    public function setterName($name) {
        $this->name = $name;
    }

    // Getter and Setter for Quantity
    public function getterQuantity() {
        return $this->quantity;
    }

    public function setterQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // Getter and Setter for Price
    public function getterPrice() {
        return $this->price;
    }

    public function setterPrice($price) {
        $this->price = $price;
    }
}
