<?php 
namespace src\classes;
spl_autoload_register();

class User {
    protected $username; 
    protected $email;
    protected $password;
    protected $confirmPassword;
    protected $avatar;
    protected $fullName;
    protected $bio;
    protected $id;
    
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

    public function getFullName()
    {
        return $this->fullName;
    }
 
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function canLogin() {
        $db = new Db();
        $conn = $db->getInstance();
        $options = parse_ini_file("settings/cost.ini"); //cost 15 - returns an array
        
        $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindValue(":username", $this->username);
        $statement->execute();
        $user = $statement->fetch(\PDO::FETCH_ASSOC);

        $hash = $user['password'];

        if(password_verify($this->getPassword(), $hash)) {
            setcookie("loggedIn", "dareal" . $this->getUsername() . "748", time() + 60 * 60 * 24 * 7); //sets cookie for a week
            $_SESSION['user'] = $this->getUsername();
            header("location: feed.php");
            return true;
        }else{
            return false;
        }
    }

    public function emailExists() {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("SELECT email FROM users WHERE email = :email");
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

        $statement = $conn->prepare("SELECT username FROM users WHERE username = :username");
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

        $statement = $conn->prepare("INSERT into users (username, email, password) values (:username, :email, :password)");
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

//PROFILE EDIT___________ // -- moet werken met getters en setters
    public function changeEmail($email,$username){
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("UPDATE users SET email = :email WHERE username = :user ");
        $statement->bindValue(":email", $this->getEmail());
        $statement->bindValue(":user", $this->getUsername());
        $results = $statement->execute();
        
        return $results;
    }

    public function changefullName($fullName,$username){
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("UPDATE users SET fullName = :fullName WHERE username = :user ");
        $statement->bindValue(":fullName", $fullName);
        $statement->bindValue(":user", $username);
        $results = $statement->execute();
        
        return $results;
    }

    public function changeBio($bio,$username){
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("UPDATE users SET bio = :bio WHERE username = :user ");
        $statement->bindValue(":bio", $bio);
        $statement->bindValue(":user", $username);
        $results = $statement->execute();
        
        return $results;
    }

    public function Avatar (){
        //AVATAR KOMT TERECHT IN FOLDER IMG
        $folder ="upload_avatar/"; 
        $avatar = $_FILES['avatar']['name']; 
        $path = $folder . $avatar ; 
        $target_file=$folder.basename($_FILES["avatar"]["name"]);
        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
        $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['avatar']['name']; 
        $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

    { 
        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

    }else{ 
            move_uploaded_file( $_FILES['avatar'] ['tmp_name'], $path); 
            $conn = Db::getInstance();
            $statement=$conn->prepare("INSERT INTO users(avatar)values(:avatar) "); 

            $statement->bindValue(':avatar', $avatar); 
            $results = $statement->execute();

            return $results;
        } 
    }

    // TO GET THE CORRECT USERNAME ID FOR PROFILE.PHP
    public function getUsernameFrom($id){
        $db = new Db();
        $conn = $db->getInstance();
    
        $statement = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $correctUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $correctUsers;
    } 

    public function showUser($username){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindValue(":username", $this->getUsername());
        $result = $statement->execute();

        $user = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
        return $user;
     }

    public function checkLoggedInUsername() {
        echo $_SESSION['user'];
    }
}