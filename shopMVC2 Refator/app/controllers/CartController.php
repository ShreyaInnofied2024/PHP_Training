<?php
class CartController extends Controller{
    private $cart;

    public function __construct() {
        $this->cart = $this->model('CartModel');
    }

    public function index(){

    }

    // Add to cart
    public function add($product_id) {
        $user_id=$_SESSION['user_id'];
        $quantity=1;
        $data=[
            'user_id'=>$user_id,
            'product_id'=>$product_id,
            'quantity'=>$quantity
        ];
        $this->cart->addToCart($data);
        // redirect('cartController');
    }

    // Increase quantity of an item in the cart
    public function increaseQuantity($user_id, $product_id) {
        $cartItem = $this->cart->getCartItem($user_id, $product_id);
        if ($cartItem) {
            $newQuantity = $cartItem->quantity + 1;
            $this->cart->updateQuantity($user_id, $product_id, $newQuantity);
        }
        header('Location: /cart');  // Redirect to cart view
    }

    // Decrease quantity of an item in the cart
    public function decreaseQuantity($user_id, $product_id) {
        $cartItem = $this->cart->getCartItem($user_id, $product_id);
        if ($cartItem && $cartItem->quantity > 1) {
            $newQuantity = $cartItem->quantity - 1;
            $this->cart->updateQuantity($user_id, $product_id, $newQuantity);
        } else {
            $this->cart->removeFromCart($user_id, $product_id);
        }
        header('Location: /cart');  // Redirect to cart view
    }

    // Remove item from cart
    public function remove($user_id, $product_id) {
        $this->cart->removeFromCart($user_id, $product_id);
        header('Location: /cart');  // Redirect to cart view
    }

    // Display cart view
    public function viewCart($user_id) {
        $cartItems = $this->cart->getUserCart($user_id);
        include 'views/cart.php';  // Load the cart view
    }
}
