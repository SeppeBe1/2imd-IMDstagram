<?php
namespace src\classes;
spl_autoload_register();

class Post  {
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
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("SELECT *, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY postedDate DESC LIMIT 20");
        $statement->execute();
        $posts = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
        return $posts;
    }

    public function createPost($username, $image, $description, $location, $filter){
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("INSERT INTO posts (photo, description, location, postedDate, user_id, filter_id)
        VALUES(:photo, :description, :location, SYSDATE(),(SELECT id FROM users WHERE username = :username),
        (SELECT id FROM filters WHERE filtername = :filter)); ");

        $statement->bindValue(":photo", $image);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":location", $location);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":filter", $filter);
        $statement->execute();
    }

    public function getAllFilters() {
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("SELECT * FROM filters");
        $statement->execute();
        $getFilters = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $getFilters;
    }

    // FUNCTION THAT PUT THE POSTS OF THE USERS IN THE PROFILE.PHP
    public static function getPostsUser($user_id){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("SELECT * FROM posts WHERE user_id = :user_id ORDER BY postedDate DESC");
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
        
        $postsUser = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $postsUser;
    }

    // TO GET POST IN DETAIL
    public static function getPostDetail($post_id){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = :id");
        $statement->bindValue(":id", $post_id);
        $statement->execute();
        $correctUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $correctUsers;
    }

    public static function getPhoto($post_id){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("SELECT photo FROM posts WHERE id = :id");
        $statement->bindValue(":id", $post_id);
        $statement->execute();

        $result = $statement->fetch();
        var_dump($result);
        return $result['photo'];

    }
}



?>