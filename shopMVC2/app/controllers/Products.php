<?php
class Products extends Controller{
    private $productModel;
    private $userModel;
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->productModel=$this->model('Product');
        $this->userModel=$this->model('User');
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
            'name_err'=>'',
            'quantity_err'=>'',
            'price_err'=>''
        ];

        if(empty($data['name'])){
            $data['name_err']='Please enter name of product';
        }
        if(empty($data['quantity'])){
            $data['quantity_err']='Please enter quantity of product';
        }
        if(empty($data['price'])){
            $data['price_err']='Please enter price of product';
        }
        if(empty($data['name_err']) && empty($data['quantity_err']) && empty($data['price_err'])){

        if($this->productModel->add($data)){
            flash('product_message',"Product Added");
            redirect('products');
        }else{
            die('Something went wrong');
        }
        }else{
            $this->view('product/add',$data);
        }
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
        'price' =>trim($_PRODUCT['price']),
        'name_err'=>'',
        'quantity_err'=>'',
        'price_err'=>''
    ];
    if(empty($data['name'])){
        $data['name_err']='Please enter name of product';
    }
    if(empty($data['quantity'])){
        $data['quantity_err']='Please enter quantity of product';
    }
    if(empty($data['price'])){
        $data['price_err']='Please enter price of product';
    }
    if(empty($data['name_err']) && empty($data['quantity_err']) && empty($data['price_err'])){

    if($this->productModel->edit($data)){
        flash('product_message',"Product Updated");
        redirect('products');
    }else{
        die('Something went wrong');
    }
    }else{
        $this->view('product/edit',$data);
    }
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
        if($this->productModel->delete($id)){
            flash('product_message','Product deleted');
            redirect('products');
        }else{
            die("Something went wrong");
        }
    }
}

