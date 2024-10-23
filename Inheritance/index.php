<?php
// Include the Product and Subclasses
include('Product.php');
include('DigitalProduct.php');
include('PhysicalProduct.php');

// Instantiate a Digital Product
$digitalProduct = new DigitalProduct(1, "E-book", 100, 9.99, "500MB");
echo "Digital Product ID: " . $digitalProduct->getterId() . "<br>";
echo "Digital Product Name: " . $digitalProduct->getterName() . "<br>";
echo "Digital Product File Size: " . $digitalProduct->getterFileSize() . "<br>";

//Cahnge the quantity
$digitalProduct->setterQuantity(50);
echo "Updated Digital Product Quantity: " . $digitalProduct->getterQuantity() . "<br>";


// Change the file size
$digitalProduct->setterFileSize("1GB");
echo "Updated Digital Product File Size: " . $digitalProduct->getterFileSize() . "<br>";

echo "<br>";  // Break line between products

// Instantiate a Physical Product
$physicalProduct = new PhysicalProduct(2, "Laptop", 50, 1500.00, "2.5kg", "30x20x2cm");
echo "Physical Product ID: " . $physicalProduct->getterId() . "<br>";
echo "Physical Product Name: " . $physicalProduct->getterName() . "<br>";
echo "Physical Product Weight: " . $physicalProduct->getterWeight() . "<br>";
echo "Physical Product Dimensions: " . $physicalProduct->getterDimensions() . "<br>";

// Change the weight of the physical product
$physicalProduct->setterWeight("2.8kg");
echo "Updated Physical Product Weight: " . $physicalProduct->getterWeight() . "<br>";
