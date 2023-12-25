<?php
include_once 'Database.php';
class User extends Database
{
    public $user_id;
    public $picture;
    public $username;
    public $email;
    private $password;

    public function register($picture, $username, $email, $pwd){
        if($this->isEmailUnique($email)){
            $this->query('INSERT INTO users(username, picture, email, pwd) VALUES (:username, :picture, :email, :pwd)');
            $this->bind(':username', $username);
            $this->bind(':picture', $picture);
            $this->bind(':email', $email);
            $this->bind(':pwd', $pwd);
            $this->execute();
        } else {
            echo "Email déja existé";
        }

    }

    public function login($email, $password){
        $this->query('SELECT * FROM users WHERE email = :email and password = :pwd');
        $this->bind(':email', $email);
        $this->bind(':pwd', $password);
        $row = $this->single();
        if(is_null($row)){
            return false;
        }else {
            return $row;
        }
    }

    public function isEmailUnique($email){
        $this->query('SELECT email FROM users WHERE email = :email');
        $this->bind(':email', $email);
        $row = $this->single();
        if(is_null($row)){
            return true;
        }else {
            return false;
        }
    }


}
$user = new User();

