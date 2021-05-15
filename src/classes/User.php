<?php 
namespace src\classes;
spl_autoload_register();

class User {
    //protected voor inheritance (extends -> admin)
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

    public function getAdmin(){
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT isAdmin FROM users WHERE username = :username");
        $statement->bindValue(":username", $this->username);
        $statement->execute();
        $result = $statement->fetch();

        return $result["isAdmin"];

    }

    public function canLogin() {
        $conn = Db::getInstance();
        $options = parse_ini_file("settings/cost.ini"); //cost 15 - returns an array
        
        $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindValue(":username", $this->username);
        $statement->execute();
        $user = $statement->fetch(\PDO::FETCH_ASSOC);

        $hash = $user['password'];

        if(password_verify($this->getPassword(), $hash)) {
            setcookie("loggedIn", "dareal" . $this->getUsername() . "748", time() + 60 * 60 * 24 * 7); //sets cookie for a week
            $_SESSION['user'] = $this->getUsername();
            if($this->getAdmin()== NULL){
                header("location: feed.php"); 
            } else{
                header("location: admin.php");
            }

            return true;
        }else{
            return false;
        }
    }

    public function emailExists() {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT email FROM users WHERE email = :email");
        $email = $this->getEmail();
        $statement->bindValue(":email", $email);
        $results = $statement->execute();
        $exists = $statement->fetch(\PDO::FETCH_ASSOC);

        if($exists["email"] == null){ //als email leeg is return true (dus email is beschikbaar)
            return true;
        }else{
            return false;
        }
    }

    public function usernameExists() {
        $conn = Db::getInstance();

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
        $conn = Db::getInstance();
        $options = parse_ini_file("settings/cost.ini"); //cost 15 - returns an array

        $statement = $conn->prepare("insert into users (username, email, password, avatar) values (:username, :email, :password, 'placeholder.jpeg')");
        $username = $this->getUsername();
        //var_dump($username);
        $email = $this->getEmail();
        $password = password_hash($this->getConfirmPassword(), PASSWORD_DEFAULT, $options);
        
        if($password == true) {
            $statement->bindValue(":username", $username);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":password", $password);
            $results = $statement->execute();

            session_start(); 
            setcookie("loggedIn", "dareal" . $this->getUsername() . "748", time() + 60 * 60 * 24 * 7); //sets cookie for a week
            $_SESSION['user'] = $this->getUsername();
            header("location: feed.php"); 
        }else {
            return false;
        }
        return $results;
    }

    public function onlyLoggedInUsers() {
        session_start();
            if(!isset($_SESSION['user'])){
                header("Location: login.php");
            }
    }

//PROFILE EDIT___________ // -- moet werken met getters en setters
    public function changeEmail(){
        $conn = Db::getInstance();

        $statement = $conn->prepare("UPDATE users SET email = :email WHERE username = :user ");
        $statement->bindValue(":email", $this->getEmail());
        $statement->bindValue(":user", $this->getUsername());
        $results = $statement->execute();
        
        return $results;
    }

    public function changefullName(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("UPDATE users SET fullName = :fullName WHERE username = :user ");
        $fullName = $this->getFullName();
        $username = $this->getUsername();
        $statement->bindValue(":fullName", $fullName);
        $statement->bindValue(":user", $username);
        $results = $statement->execute();
        
        return $results;
    }

    public function changeUsername($username,$oldusername){
        $conn = Db::getInstance();

        $statement = $conn->prepare("UPDATE users SET username = :username WHERE username = :user ");
        $username = $this->getUsername();
        $statement->bindValue(":username", $username);
        $statement->bindValue(":user", $oldusername);
        $results = $statement->execute();
        
        return $results;
    }

    public function changeBio(){
        $conn = Db::getInstance();

        $statement = $conn->prepare("UPDATE users SET bio = :bio WHERE username = :user ");
        $bio = $this->getBio();
        $username = $this->getUsername();
        $statement->bindValue(":bio", $bio);
        $statement->bindValue(":user", $username);
        $results = $statement->execute();
        
        return $results;
    }

    public function changePassword($password,$username){
        $conn = Db::getInstance();
        $options = parse_ini_file("settings/cost.ini"); //cost 15 - returns an array

        $statement = $conn->prepare("UPDATE users SET password = :password WHERE username = :user");
        $password = password_hash($this->getConfirmPassword(), PASSWORD_DEFAULT, $options);
        $statement->bindValue(":user", $username);
        $statement->bindValue(":password", $password);
        $results = $statement->execute();
        
        return $results;
    }

    public function changeAvatar($avatar, $username) {
        $conn = Db::getInstance();
        $statement = $conn->prepare("UPDATE users SET avatar = :avatar WHERE username = :user ");
        $statement->bindValue(":user", $username);
        $statement->bindValue(":avatar", $avatar);
        $result = $statement->execute();
        $changedAvatar = $statement->fetch(); 
        
        return $changedAvatar;
    }

    public function checkIfImgExists($avatar, $username) {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select avatar from users where avatar = :avatar");
        $statement->bindValue(":avatar", $avatar);
        $result = $statement->execute();
        $avataruser = $statement->fetch();

        $imageUrl = './user_avatar/'.$avataruser['avatar'];
        
        //if file doesn't exist in folder (removed manually or whatever) - change to default placeholder
        if(!file_exists($imageUrl) ){
            $statement = $conn->prepare("UPDATE users set avatar = 'placeholder.jpeg' where username= :user");
            $statement->bindValue(":user", $username);
            $result = $statement->execute();
           
            
            return $result;
        }
    }

    public function deleteAvatar($username) {
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT avatar FROM users WHERE username = :user ");
        $statement->bindValue(":user", $username);
        $avatar = $statement->execute();
        $avataruser = $statement->fetch();
        //image path
        $imageUrl = './user_avatar/'.$avataruser['avatar'];
        $imagePlaceholder = './user_avatar/placeholder.jpeg';
        //check if image exists
        if(file_exists($imageUrl) && $avataruser['avatar'] != "placeholder.jpeg"){

        //delete the image from folder
        unlink(realpath($imageUrl));
        echo"check";
        $statement = $conn->prepare("UPDATE users set avatar = 'placeholder.jpeg' where username= :user");
        $statement->bindValue(":user", $username);
        $result = $statement->execute();
        
        header ("Refresh:0");
        echo "deleted";
        }
    }

    public function deleteUser($user_id){
        $conn = Db::getInstance();
        $statement = $conn->prepare("DELETE  FROM users WHERE id = $user_id ");
        $statement->bindValue(":user", $user_id);
        $statement->execute();
    }

    public function deleteUserAllPosts($user_id)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("DELETE  FROM posts WHERE user_id = $user_id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
    }

    // TO GET THE CORRECT USERNAME ID FOR PROFILE.PHP
    public function getUsernameFrom($username){
        $conn = Db::getInstance();
    
        $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindValue(":username", $username);
        $statement->execute();
        $correctUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $correctUsers;
    } 

    public function showUser(){ //CURRENTUSER
        $conn = Db::getInstance();

        $statement = $conn->prepare("select * from users where username = :username");
        $username = $this->getUsername();
        $statement->bindValue(":username", $username);
        $result = $statement->execute();

        $user = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
        return $user;
     }

    public function checkLoggedInUsername() {
        echo $_SESSION['user'];
    }
}