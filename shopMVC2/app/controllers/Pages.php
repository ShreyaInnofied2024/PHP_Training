<?php
class Pages extends Controller{
    public function __construct()
    {
    }
    
    public function index(){
        if(isLoggedIn()){
            redirect('products');
        }       
             $data=[
            'title' => 'Welcome to shop',
            'description'=>'Simple shopping website built on the MVC PHP framework'
        ];
        $this->view('pages/index', $data);
    }


    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => 'App to shop anyhing'
          ];
        $this->view('pages/about',$data);
    }
}