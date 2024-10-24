<?php
class Category extends Controller{
    private $categoryModel;
    public function __construct(){
        $this->categoryModel=$this->model('Categories');
    }
    public function index(){
        $products=$this->categoryModel->getCategory();
        $data=[
            'products'=>$products
        ];
        $this->view('category/index',$data);
    }


    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_PRODUCT=filter_input_array(INPUT_POST);
        $data=[
            'name'=>trim($_PRODUCT['name']),
            'quantity'=>trim($_PRODUCT['quantity']),
        ];
        $this->categoryModel->add($data);
        header('location:' . URLROOT.'/category');
    }
        else{
            $data=[
                'name'=>'',
                'quantity'=>'',
                'price' =>''
            ];
            $this->view('category/add',$data);
        }
    }

public function show($id){
    $product=$this->categoryModel->getcategoryById($id);
    $data=[
        'product'=>$product
    ];
    $this->view('category/show',$data);
}

public function edit($id){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_PRODUCT=filter_input_array(INPUT_POST);
    $data=[
        'id'=>$id,
        'name'=>trim($_PRODUCT['name']),
        'quantity'=>trim($_PRODUCT['quantity'])
    ];
    $this->categoryModel->edit($data);
    header('location:' . URLROOT.'/category');
}
    else{
        $product=$this->categoryModel->getCategoryById($id);
        $data=[
            'id' =>$id,
            'name'=>$product->name,
            'quantity'=>$product->quantity
        ];
        $this->view('category/edit',$data);
    }
}

public function delete($id){
        $product=$this->categoryModel->getCategoryById($id);
        $this->categoryModel->delete($id);
        header('location:' . URLROOT.'/category');
    }
}

