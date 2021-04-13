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

    public static function getAllPosts(){
        $db = new Db();
        $conn = $db->getInstance();
        $statement = $conn->prepare("select * from posts INNER JOIN users ON posts.user_id = users.id ORDER BY postedDate DESC LIMIT 20");
        $statement->execute();
        
        $posts = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $posts;

    }

    public function createPost($username,$image, $description, $location ,$filter){
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("INSERT INTO posts (photo, description, location, isLiked, postedDate, filters, user_id)
         VALUES (:photo, :description, :location, :isLiked, sysdate(), :filters, (select id from users where username = :username));");

        //postdate datum + uur + sec

        $statement->bindValue(":photo", $image);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":location", $location);
        $statement->bindValue(":isLiked", 0);
        //sysdate();
        $statement->bindValue(":filters", $filter);
        $statement->bindValue(":username", $username);
        $results = $statement->execute();

    }
}
?>
