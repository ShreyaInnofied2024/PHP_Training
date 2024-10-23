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
        $this->db->query('INSERT INTO user(name,email,passowrd) VALUES (:name,:email,:password)');
        $this->db->query(':name',$data['name']);
        $this->db->query(':email',$data['email']);
        $this->db->query(':password',$data['password']);
        $this->db->execute();
    }

}