<?php
class Products extends Controller{
    private $productModel;
    public function __construct(){
        $this->productModel=$this->model('Product');
    }
    public function index(){
        $products=$this->productModel->getProducts();
        $data=[
            'products'=>$products
        ];
        $this->view('product/index',$data);
    }


    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_PRODUCT=filter_input_array(INPUT_POST);
        $data=[
            'name'=>trim($_PRODUCT['name']),
            'quantity'=>trim($_PRODUCT['quantity']),
            'price' =>trim($_PRODUCT['price']),
            'weight' =>trim($_PRODUCT['weight'])
        ];
        $this->productModel->add($data);
        header('location:' . URLROOT.'/products');
    }
        else{
            $data=[
                'name'=>'',
                'quantity'=>'',
                'price' =>''
            ];
            $this->view('product/add',$data);
        }
    }

public function show($id){
    $product=$this->productModel->getProductById($id);
    $data=[
        'product'=>$product
    ];
    $this->view('product/show',$data);
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
    print_r($data);
    $this->productModel->edit($data);
    header('location:' . URLROOT.'/products');
}
    else{
        $product=$this->productModel->getProductById($id);
        $data=[
            'id' =>$id,
            'name'=>$product->name,
            'quantity'=>$product->quantity,
            'price' =>$product->price
        ];
        $this->view('product/edit',$data);
    }
}

public function delete($id){
        $product=$this->productModel->getProductById($id);
        $this->productModel->delete($id);
        header('location:' . URLROOT.'/products');
    }
}

