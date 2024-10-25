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
                'password'=>trim($_USER['password']),
                'name_err'=>'',
                'email_err' =>'',
                'password_err'=>''
            ];

            if(empty($data['email'])){
                $data['email_err']='Please enter email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err']='Email is already taken';
                }
            }
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
              }
      
              if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
              } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
              }
              if(empty($data['email_err']) && empty($data['password_err']) && empty($data['name_err'])){
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                if($this->userModel->register($data)){
                    flash('Register_Success','You are registered and can log in');
                    redirect('users/login');
                }else{
                    die('something went wrong');
                }
            }else{
                    $this->view('user/register',$data);
                }
              }
        else{
            $data=[
                'name'=>'',
                'email' =>'',
                'password' =>'',
                'name_err'=>'',
                'email_err'=>'',
                'passowrd_err'=>''
            ];
            $this->view('user/register',$data);
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
                $_USER=filter_input_array(INPUT_POST);
                $data=[
                    'email'=>trim($_USER['email']),
                    'password'=>trim($_USER['password']),
                    'email_err'=>'',
                    'password_err'=>''
                ];
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){

                    }else{
                        $data['email_err']="No user found";
                    }
                }
                  if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                  }

                if(empty($data['email_err']) && empty($data['password_err'])){
                    $loggedInUser=$this->userModel->login($data['email'],$data['password']);
                    if($loggedInUser){
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err']='Password incorrect';
                        $this->view('user/login',$data);
                    }
                }else{
                    $this->view('user/login',$data);
                }
                }
                else{
            $data=[
                'email' =>'',
                'password' =>'',
                'email_err'=>'',
                'password_err' =>''
            ];
            $this->view('user/login',$data);
        }
    }
    public function createUserSession($user){
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;
        redirect('pages/choose');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}




