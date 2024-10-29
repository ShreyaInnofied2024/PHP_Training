<?php 

class Cart { 
    protected $cart_contents = []; // Array to hold cart items

    public function __construct() { 
        // Initialize cart contents from the session
        $this->cart_contents = !empty($_SESSION['cart_contents']) ? $_SESSION['cart_contents'] : ['cart_total' => 0, 'total_items' => 0]; 
    } 

    // Get all cart items
    public function contents() { 
        $cart = $this->cart_contents; 
        unset($cart['total_items'], $cart['cart_total']); // Remove totals from the list
        return array_reverse($cart); // Show newest first
    } 

    // Get a specific item from the cart
    public function get_item($row_id) { 
        return isset($this->cart_contents[$row_id]) ? $this->cart_contents[$row_id] : false; 
    } 

    // Get total items in the cart
    public function total_items() { 
        return $this->cart_contents['total_items']; 
    } 

    // Get the total price of the cart
    public function total() { 
        return $this->cart_contents['cart_total']; 
    } 

    // Add an item to the cart
    public function insert($item) { 
        if (!is_array($item) || count($item) === 0) return false; 
        if (!isset($item['id'], $item['name'], $item['price'], $item['qty'])) return false; 

        $item['qty'] = (float) $item['qty']; 
        if ($item['qty'] == 0) return false; 

        $item['price'] = (float) $item['price']; 
        $rowid = md5($item['id']); // Create a unique identifier for the item

        // Update quantity if item already exists
        $old_qty = isset($this->cart_contents[$rowid]['qty']) ? (int) $this->cart_contents[$rowid]['qty'] : 0; 
        $item['rowid'] = $rowid; 
        $item['qty'] += $old_qty; 
        $this->cart_contents[$rowid] = $item; 

        return $this->save_cart(); // Save changes
    } 

    // Update the cart
    public function update($item) { 
        if (!is_array($item) || count($item) === 0 || !isset($item['rowid'], $this->cart_contents[$item['rowid']])) return false; 

        // Update quantity
        if (isset($item['qty'])) { 
            $item['qty'] = (float) $item['qty']; 
            if ($item['qty'] == 0) { 
                unset($this->cart_contents[$item['rowid']]); // Remove item if quantity is zero
                return true; 
            } 
        } 

        // Update other item details
        foreach ($item as $key => $value) { 
            if (in_array($key, ['price', 'qty'])) { 
                $this->cart_contents[$item['rowid']][$key] = $value; 
            } 
        } 
        return $this->save_cart(); 
    } 

    // Save the cart to the session
    protected function save_cart() { 
        $this->cart_contents['total_items'] = 0; 
        $this->cart_contents['cart_total'] = 0; 

        foreach ($this->cart_contents as $key => $val) { 
            if (is_array($val) && isset($val['price'], $val['qty'])) { 
                $this->cart_contents['cart_total'] += ($val['price'] * $val['qty']); 
                $this->cart_contents['total_items'] += $val['qty']; 
                $this->cart_contents[$key]['subtotal'] = $val['price'] * $val['qty']; 
            } 
        } 

        // If cart is empty, remove it from the session
        if (count($this->cart_contents) <= 2) { 
            unset($_SESSION['cart_contents']); 
            return false; 
        } else { 
            $_SESSION['cart_contents'] = $this->cart_contents; 
            return true; 
        } 
    } 

    // Remove an item from the cart
    public function remove($row_id) { 
        unset($this->cart_contents[$row_id]); 
        return $this->save_cart(); 
    } 

    // Clear the cart
    public function destroy() { 
        $this->cart_contents = ['cart_total' => 0, 'total_items' => 0]; 
        unset($_SESSION['cart_contents']); 
    } 
} 
?>
