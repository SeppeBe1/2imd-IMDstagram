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
    public static function getAllPosts(){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("select * from posts INNER JOIN users ON posts.user_id = users.id ORDER BY postedDate DESC LIMIT 20");
        $statement->execute();
        
        $posts = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $posts;

    }

    // FUNCTION THAT PUT THE POSTS OF THE USERS IN THE PROFILE.PHP
    public static function getPostsUser($user_id){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("select * from posts WHERE user_id = :user_id ORDER BY postedDate DESC");
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
        
        $postsUser = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $postsUser;
    }

    // TO GET POST IN DETAIL
    public static function getPostDetail($post_id){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("select * from posts inner join users on posts.user_id = users.id where posts.id = :id");
        $statement->bindValue(":id", $post_id);
        $statement->execute();
        // var_dump($results);
        $correctUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $correctUsers;
    }
}

?>
