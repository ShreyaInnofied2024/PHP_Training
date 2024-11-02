<?php

    class OrderModel {
        private $db;
    
        public function __construct() {
            $this->db = new Database; // Assume $database is a PDO instance
        }
    
        public function payment($data) {
                $this->db->query("INSERT INTO orders (user_id, address, total_amount, shipping_method) 
                                  VALUES (:user_id, :address, :total_amount, :shipping_method)");
                $this->db->bind(':user_id', $data['user_id']);
                $this->db->bind(':address', $data['address']);
                $this->db->bind(':total_amount', $data['total_amount']);
                $this->db->bind(':shipping_method', $data['shipping_method']);
    
                // Execute the statement
                if ($this->db->execute()) {
                    return true; // Payment data stored successfully
                } else {
                    return false; // Failed to store payment data
                }
            }
        }
    