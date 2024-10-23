<?php
class DigitalProduct extends Product {
    private $fileSize;

    public function __construct($id, $name, $quantity, $price, $fileSize) {
        parent::__construct($id, $name, $quantity, $price);
        $this->fileSize = $fileSize;
        echo "Constructor Digital Product called for {$this->getterName()} <br>";
    }

    // Getter and Setter for File Size
    public function getterFileSize() {
        return $this->fileSize;
    }

    public function setterFileSize($fileSize) {
        $this->fileSize = $fileSize;
    }
}
