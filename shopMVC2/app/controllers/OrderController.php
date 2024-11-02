<?php
class OrderController extends Controller{
    private $order;
    private $cart;

    public function __construct() {
        $this->order = $this->model('OrderModel');
        $this->cart=$this->model('CartModel');
    }

    public function checkout(){
        $user_id=$_SESSION['user_id'];
        $cartItems = $this->cart->getUserCart($user_id);
        $totalItems=$this->cart->getTotalItems($user_id);
        $totalPrice=$this->cart->getTotalPrice($user_id);
        $data=[
            'cartItems'=>$cartItems,
            'totalItems'=>$totalItems,
            'totalPrice'=>$totalPrice
        ];
        $this->view('order/view',$data);
    }

    public function payment(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_ADDRESS=filter_input_array(INPUT_POST);
        $address=trim($_ADDRESS['line1']) ." " .trim($_ADDRESS['line2']) . " ".
        trim($_ADDRESS['city']). " " .trim($_ADDRESS['state']). " " .trim($_ADDRESS['country'])." "
        . trim($_ADDRESS['zip']);
        $totalPrice=$this->cart->getTotalPrice($_SESSION['user_id']);
        $data=[
            'user_id'=>$_SESSION['user_id'],
            'address'=>$address,
            'total_amount'=>$totalPrice,
            'shipping_method'=>$_ADDRESS['shipping_method']
        ];
        $this->order->payment($data);
    }
}
}