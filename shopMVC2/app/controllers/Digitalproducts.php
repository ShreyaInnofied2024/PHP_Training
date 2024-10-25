<?php
class Digitalproducts extends Controller{
    private $productModel;
    public function __construct(){
        $this->productModel=$this->model('Digitalproduct');
    }
    public function index(){
        $products=$this->productModel->getProducts();
        $data=[
            'products'=>$products
        ];
        $this->view('digitalproduct/index',$data);
    }


public function show($id){
    $product=$this->productModel->getProductById($id);
    $data=[
        'product'=>$product
    ];
    $this->view('digitalproduct/show',$data);
}

public function edit($id){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_PRODUCT=filter_input_array(INPUT_POST);
    $data=[
        'id'=>$id,
        'name'=>trim($_PRODUCT['name']),
        'quantity'=>trim($_PRODUCT['quantity']),
        'price' =>trim($_PRODUCT['price'])
    ];
    $this->productModel->edit($data);
    header('location:' . URLROOT.'/digitalproduct');
}
    else{
        $product=$this->productModel->getProductById($id);
        $data=[
            'id' =>$id,
            'name'=>$product->name,
            'quantity'=>$product->quantity,
            'price' =>$product->price
        ];
        $this->view('digitalproduct/edit',$data);
    }
}

public function delete($id){
        $product=$this->productModel->getProductById($id);
        $this->productModel->delete($id);
        header('location:' . URLROOT.'/digitalproduct');
    }
}

