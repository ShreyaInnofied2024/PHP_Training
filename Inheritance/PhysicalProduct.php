<?php
class PhysicalProduct extends Product {
    private $weight;
    private $dimensions;

    public function __construct($id, $name, $quantity, $price, $weight, $dimensions) {
        parent::__construct($id, $name, $quantity, $price);
        $this->weight = $weight;
        $this->dimensions = $dimensions;
        echo "Constructor Physical Product called for {$this->getterName()} <br>";
    }

    // Getter and Setter for Weight
    public function getterWeight() {
        return $this->weight;
    }

    public function setterWeight($weight) {
        $this->weight = $weight;
    }

    // Getter and Setter for Dimensions
    public function getterDimensions() {
        return $this->dimensions;
    }

    public function setterDimensions($dimensions) {
        $this->dimensions = $dimensions;
    }
}
