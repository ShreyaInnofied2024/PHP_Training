<?php
class CartModel {
    private $db;

    public function __construct() {
        $this->db = new Database; 
    }

    public function addToCart($data) {
        $existingItem = $this->getCartItem($data['user_id'], $data['product_id']);
        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $data['quantity'];
            return $this->updateQuantity($data['user_id'], $data['product_id'], $newQuantity);
        } else {
            $this->db->query("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':quantity', $data['quantity']);
            return $this->db->execute();
        }
    }

    // Get a specific cart item for a user
    public function getCartItem($user_id, $product_id) {
        $this->db->query("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':product_id', $product_id);
        return $this->db->single();
    }

    // Update the quantity of a product in the cart
    public function updateQuantity($user_id, $product_id, $quantity) {
        $this->db->query("UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':product_id', $product_id);
        return $this->db->execute();
    }

    // Remove an item from the cart
    public function removeFromCart($user_id, $product_id) {
        $this->db->query("DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':product_id', $product_id);
        return $this->db->execute();
    }

    // Get all items in the user's cart
    public function getUserCart($user_id) {
        $this->db->query("SELECT * FROM cart WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }
}
