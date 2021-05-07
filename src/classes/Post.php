<?php
namespace src\classes;
spl_autoload_register();

class Post  {
    //veranderen naar private
    protected $image;
    protected $description;
    protected $location;
    protected $postDate;

    protected $isLiked;
    protected $innappropriate;
    protected $filters;

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;

        return $this;
    }

    public function setIsLiked($isLiked)
    {
        $this->isLiked = $isLiked;

        return $this;
    }

    public function setInnappropriate($innappropriate)
    {
        $this->innappropriate = $innappropriate;

        return $this;
    }

    public function setfilters($filters)
    {
        $this->filters = $filters;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getPostDate()
    {
        return $this->postDate;
    }

    public function getIsLiked()
    {
        return $this->isLiked;
    }

    public function getInnappropriate()
    {
        return $this->innappropriate;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    // FUNCTION THAT PICKS UP THE POSTS FROM ALL THE USER FOR FEED.PHP
    public function getAllPosts(){
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT *, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY postedDate DESC LIMIT 20");
        $statement->execute();
        $posts = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
        return $posts;
    }

    public function createPost($username, $image, $description, $location, $filter){
        $conn = Db::getInstance();

        $statement = $conn->prepare("INSERT INTO posts (photo, description, location, postedDate, user_id, filter_id)
        VALUES(:photo, :description, :location, SYSDATE(),(SELECT id FROM users WHERE username = :username),
        (SELECT id FROM filters WHERE filtername = :filter)); ");
        //htmlspecialchars op description
        $statement->bindValue(":photo", $image);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":location", $location);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":filter", $filter);
        $statement->execute();
    }

    public function getAllFilters() {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM filters");
        $statement->execute();
        $getFilters = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $getFilters;
    }

    // FUNCTION THAT PUT THE POSTS OF THE USERS IN THE PROFILE.PHP
    public static function getPostsUser($user_id){
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM posts WHERE user_id = :user_id ORDER BY postedDate DESC");
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
        
        $postsUser = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $postsUser;
    }

    // TO GET POST IN DETAIL
    public static function getPostDetail($post_id){
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = :id");
        $statement->bindValue(":id", $post_id);
        $statement->execute();
        $correctUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $correctUsers;
        var_dump($correctUsers);
    }

    public static function getPhoto($post_id){
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT photo FROM posts WHERE id = :id");
        $statement->bindValue(":id", $post_id);
        $statement->execute();
        $result = $statement->fetch();
        
        return $result['photo'];
    }

    public function deletePost($id){
        $conn = Db::getInstance();
        
        $statement = $conn->prepare("DELETE FROM posts WHERE id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch();
        header ("Refresh:0");
        return $result;
    }

    public function rapportPost($post_id, $username)
    {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("INSERT INTO reports (user_id, post_id) VALUES ((SELECT id FROM users WHERE username = :username), :post_id) ");
        $statement->bindValue(":post_id", $post_id);
        $statement->bindValue(":username", $username);
        $statement->execute();
        header("Refresh:0");

        $this->makeHiddenPost($post_id);
    }

    public function makeHiddenPost($post_id)
    {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("SELECT count(*) FROM reports WHERE post_id = :post_id");
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
        $result = $statement->fetchColumn();
        var_dump($result);
        if ($result >= 3) {
            return false;
        } else {
            return true;
        }
    }
}