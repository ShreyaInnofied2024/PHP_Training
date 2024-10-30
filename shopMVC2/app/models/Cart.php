<?php
class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addToCart($item) {
        $id = $item->id;
        $_SESSION['cart'][$id] = [
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => isset($_SESSION['cart'][$id]) ? $_SESSION['cart'][$id]['quantity'] + 1 : 1
        ];
    
    }

    public function updateCartItem($id, $quantity) {
        if (isset($_SESSION['cart'][$id])) {
            if ($quantity > 0) {
                $_SESSION['cart'][$id]['quantity'] = $quantity; // Update quantity
            } else {
                unset($_SESSION['cart'][$id]); // Remove item if quantity is 0
            }
        }
    }
    

    public function removeItem($id) {
        unset($_SESSION['cart'][$id]);
    }

    public function getCartContents() {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }
    
    public function getTotalItems() {
        return isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;
    }
    
    public function getTotalPrice() {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
    
    public function clearCart() {
        $_SESSION['cart'] = [];
    }
}
