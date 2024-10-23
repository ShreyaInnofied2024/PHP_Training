<?php
class Users extends Controller{
    private $userModel;
    public function __construct()
    {
        $this->userModel=$this->model('User');
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_USER=filter_input_array(INPUT_POST);
            $data=[
                'name'=>trim($_USER['name']),
                'email'=>trim($_USER['email']),
                'password'=>trim($_USER['password'])
            ];
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $this->userModel->register($data);
            header('location: ' .URLROOT.'/users/login');
        }
        else{
            $data=[
                'name'=>'',
                'email' =>'',
                'password' =>''
            ];
            $this->view('user/register',$data);
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
                $_USER=filter_input_array(INPUT_POST);
                $data=[
                    'email'=>trim($_USER['email']),
                    'password'=>trim($_USER['password'])
                ];
                $this->userModel->add($data);
        }else{
            $data=[
                'email' =>'',
                'password' =>''
            ];
            $this->view('user/login',$data);
        }
    }
}