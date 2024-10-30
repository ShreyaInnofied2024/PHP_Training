<?php
class Category extends Controller{
    private $categoryModel;
    private $productModel;
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->categoryModel=$this->model('Categories');
    }
    
    public function index(){
        $category=$this->categoryModel->getCategory();
        $data=[
            'category'=>$category
        ];
        $this->view('category/index',$data);
    }

    public function add(){
        if(!isAdmin()){
            redirect('category/index');
        }

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_CATEGORY=filter_input_array(INPUT_POST);
        $data=[
            'name'=>trim($_CATEGORY['name']),
            'name_err'=>''
        ];

        if(empty($data['name'])){
            $data['name_err']='Please enter name of category';
        }
        if(empty($data['name_err'])){

        if($this->categoryModel->add($data)){
            flash('category_message',"Category Added");
            redirect('category');
        }else{
            die('Something went wrong');
        }
        }else{
            $this->view('category/add',$data);
        }
    }
        else{
            $data=[
                'name'=>''
            ];
            $this->view('category/add',$data);
        }
    }

public function show($id){
    $category=$this->categoryModel->getCategoryById($id);
    $data=[
        'category'=>$category
    ];
    $this->view('category/show',$data);
}



public function delete($id){
    if(!isAdmin()){
        redirect('category/index');
    }else{
        $category=$this->categoryModel->getCategoryById($id);
        if($this->categoryModel->delete($id)){
            if($this->productModel->deleteBycategory($category->id))
            flash('category_message','Category deleted');
            redirect('category');
        }else{
            die("Something went wrong");
        }
    }
    }
}

