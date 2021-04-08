<?php 
namespace src\classes;
spl_autoload_register();

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
            throw new \Exception("Passwords must be longer than 5 characters.");
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
        $db = new Db();
        $conn = $db->getInstance();
        $options = parse_ini_file("settings/cost.ini"); //cost 15 - returns an array
        
        $statement = $conn->prepare("select * from users where username = :username");
        $statement->bindValue(":username", $this->username);
        $statement->execute();
        $user = $statement->fetch(\PDO::FETCH_ASSOC);

        $hash = $user['password'];

        if(password_verify($this->getPassword(), $hash)) {
            setcookie("loggedIn", "dareal" . $this->getUsername() . "748", time() + 60 * 60 * 24 * 7); //sets cookie for a week
            $_SESSION["user"] = $this->getUsername();
            header("location: feed.php");
            return true;
        }else{
            return false;
        }
    }

    public function emailExists() {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("select email from users where email = :email");
        $email = $this->getEmail();
        $statement->bindValue(":email", $email);
        $results = $statement->execute();
        $exists = $statement->fetch(\PDO::FETCH_ASSOC);

        if($exists["email"] == null){
            return true;
        }else{
            return false;
        }
    }

    public function usernameExists() {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("select username from users where username = :username");
        $username = $this->getUsername();
        $statement->bindValue(":username", $username);
        $results = $statement->execute();
        $usernameExists = $statement->fetch(\PDO::FETCH_ASSOC);

        if($usernameExists["username"] == null){
            return true;
        }else{
            return false;
        }
    }

    public function registerUser() {
        $db = new Db();
        $conn = $db->getInstance();
        $options = parse_ini_file("settings/cost.ini"); //cost 15 - returns an array

        $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
        $username = $this->getUsername();
        $email = $this->getEmail();
        $password = password_hash($this->getConfirmPassword(), PASSWORD_DEFAULT, $options);
        
        if($password == true) {
            $statement->bindValue(":username", $username);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":password", $password);
            $results = $statement->execute();

            session_start(); 
            setcookie("loggedIn", "dareal" . $this->getUsername() . "748", time() + 60 * 60 * 24 * 7);
            $_SESSION['user'] = "";
            header("Location: feed.php"); 
        }else {
            return false;
        }
        return $results;
    }

    // public static function getAvatar(){
    //     $conn = Db::getInstance();
    //     $statement = $conn->prepare("select avatar from users");
    //     $result = $statement->execute();
    //     var_dump($result);

    //     $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $users;
    // }
    public function onlyLoggedInUsers() {
        session_start();
        if(!isset($_SESSION['user'])){
            header("Location: login.php");
        }
    }

    public function changeEmail($email,$username){
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("UPDATE users SET email = :email WHERE username = :user ");
        $statement->bindValue(":email", $email);
        $statement->bindValue(":user", $username);
        $results = $statement->execute();
        return $results;

    }
}
