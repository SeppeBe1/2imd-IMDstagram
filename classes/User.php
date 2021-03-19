<?php 
include_once(__DIR__ . "../Db.php");

class User {
    protected $username; 
    protected $email;
    protected $password;
    protected $confirmPassword;
    
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password)
    {
        if(strlen($password) < 5){
            throw new Exception("Passwords must be longer than 5 characters.");
        }

        $this->password = $password;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    public function canLogin() {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from users where username = :username");
        $statement->bindValue(":username", $this->username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $hash = $user['password'];

        if(password_verify($this->getPassword(), $hash)) {
            return true;
        }else{
            return false;
        }
    }

    public function registerUser() {
        $conn = Db::getInstance();
        $options = [
            'cost' => 15
        ];

        $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
        $username = $this->getUsername();
        $email = $this->getEmail();
        $password = password_hash($this->getConfirmPassword(), PASSWORD_DEFAULT, $options); // moet nog gehasht worden
            
        $statement->bindValue(":username", $username);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);

        $results = $statement->execute();
            
        return $results;
    }
}
