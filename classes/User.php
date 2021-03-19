<?php 
include_once(__DIR__ . "/connection.php");

class User {
    protected $username; 
    protected $email;
    protected $password;

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

    public function saveUser() {
        $conn = \Database::getConn();

        $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
        $username = $this->getUsername();
        $email = $this->getEmail();
        $password = $this->getPassword(); // moet nog gehasht worden
        
        $statement->bindValue(":username", $username);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);

        $results = $statement->execute();
    
        return $results;
    }
}
