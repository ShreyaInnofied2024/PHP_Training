<?php
class Carts extends Controller {
    private $cartModel;
    private $productModel;

    public function __construct() {
        $this->cartModel = $this->model('Cart'); // Cart model
        $this->productModel = $this->model('Product');
    }

    public function add($id) {
        // Retrieve product by ID
        $product = $this->productModel->getProductsById($id);
        
        // Add product to the cart
        $this->cartModel->addToCart($product);
        
        // Redirect to cart view
        redirect('carts/show');
        exit();
    }

    public function update($id) {
        // Get the quantity from POST data
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
        
        // Update cart item quantity
        if ($quantity >= 0) {
            $this->cartModel->updateCartItem($id, $quantity);
        }
        
        // Redirect to cart view
        redirect('carts/show');
    }

    public function remove($id) {
        // Remove item from cart
        $this->cartModel->removeItem($id);
        
        // Redirect to cart view
        redirect('carts/show');
    }

    public function show() {
        // Redirect to index if admin
        if (isAdmin()) {
            redirect('pages/index');
        }

        // Get cart data for the view
        $cartItems = $this->cartModel->getCartContents();
        $totalItems = $this->cartModel->getTotalItems();
        $totalPrice = $this->cartModel->getTotalPrice();
        
        $data = [
            'cartItems' => $cartItems,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice
        ];

        // Load cart view
        $this->view('cart/view', $data);
    }
}
?>
