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
                'user_role'=>trim($_USER['user_role']),
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
                'user_role'=>'',
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
                    'user_role'=>trim($_USER['user_role']),
                    'email_err'=>'',
                    'password_err'=>'',
                    'user_role_err'=>''
                ];
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){

                    }else{
                        $data['email_err']="No user found";
                    }
                }
                if (empty($data['user_role'])) {
                    $data['user_role_err'] = 'Please enter your user role';
                } elseif (!$this->userModel->findUserByRoleAndEmail($data['email'], $data['user_role'])) {
                    $data['user_role_err'] = "No user found with this role for the provided email";
                }
                  if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                  }

                if(empty($data['email_err']) && empty($data['password_err']) && empty($data['user_role_err'])){
                    $loggedInUser=$this->userModel->login($data['email'],$data['password'],$data['user_role']);
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
                'user_role'=>'',
                'email_err'=>'',
                'password_err' =>'',
                'user_role_err'=>''
            ];
            $this->view('user/login',$data);
        }
    }
    public function createUserSession($user){
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;
        $_SESSION['user_role']=$user->user_role;
        redirect('pages/choose');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function list(){
        $users=$this->userModel->getUsers();
        $data=[
            'users'=>$users
        ];
        $this->view('user/list',$data);
    }

    // public function changePassword($email){
    //     if($_SERVER['REQUEST_METHOD']=='POST'){
    //         $_USER=filter_input_array(INPUT_POST);
    //     $data=[
    //         'password' =>trim($_USER['password']),
    //         'password_err'=>''
    //     ];
    //     if(empty($data['password'])){
    //         $data['password_err']='Please enter password';
    //     }
    //     if(empty($data['password_err'])){
    
    //     if($this->userModel->changePassword($data)){
    //         flash('user_message',"Password Changed");
    //         redirect(URLROOT);
    //     }else{
    //         die('Something went wrong');
    //     }
    //     }else{
    //         $this->view('user/change_password',$data);
    //     }
    // }
    //     else{
    //         $user=$this->userModel->findUserByEmail($email);
    //         $data=[
    //             'password' =>$user->password,
    //             'password_err'=>''
    //         ];
    //         $this->view('user/edit',$data);
    //     }
    // }

    
}




