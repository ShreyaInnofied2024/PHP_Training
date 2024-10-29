<?php
class User{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM user WHERE email=:email');
        $this->db->bind(':email',$email);
        $row=$this->db->single();
        if($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public function register($data){
        $this->db->query('INSERT INTO user(name,email,password,user_role) VALUES (:name,:email,:password,:user_role)');
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':user_role',$data['user_role']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($email,$password,$user_role){
        $this->db->query('SELECT * FROM user WHERE email =:email AND user_role=:user_role');
        $this->db->bind(':email',$email);
        $this->db->bind(':user_role', $user_role);
        $row=$this->db->single();
        $hashed_password=$row->password;
        if(password_verify($password,$hashed_password)){
            return $row;
        }else{
            return false;
        }
    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
      }

      public function findUserByRoleAndEmail($email,$user_role){
        $this->db->query('SELECT * FROM user WHERE email=:email AND user_role=:user_role');
        $this->db->bind(':email',$email);
        $this->db->bind(':user_role',$user_role);
        $row=$this->db->single();
        if($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public function getUsers(){
        $this->db->query('Select * from user');
        $results=$this->db->resultSet();
        return $results;
    }
    
    
    public function changePassword($data){
    $this->db->query('UPDATE user SET password=:password WHERE email=:email');
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':password',$data['password']);
    if($this->db->execute()){
        return true;
       }else{
        return false;
       }
    }
    
    
    
    
    public function delete($id){
        $this->db->query('DELETE FROM product WHERE id=:id');
        $this->db->bind(':id',$id);
       if($this->db->execute()){
        return true;
       }else{
        return false;
       }
    }
    

}