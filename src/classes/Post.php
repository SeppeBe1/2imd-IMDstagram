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
    public function getAllPosts($limit){
        $conn = Db::getInstance();

        // VARIABLE THAT DEFINES HOW MANY POSTS WE WANT TO DISPLAY, TO BEGIN

        // COLLECTING ALL THE POSTS, LIMITED BY THE AMOUNT
        $statement = $conn->prepare("SELECT *, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY postedDate DESC LIMIT 0,$limit ");
        $statement->execute();
        $posts = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
        return $posts;
    }

    public function getTotalPosts(){
        $conn = Db::getInstance();
        // $postperpage = 1;

        // COUNT THE AMOUNT OF POSTS
        $statement1 = $conn->prepare("select count(*) as totalamountposts FROM posts");
        $statement1->execute();
        $fetch_posts_total = $statement1->fetch(\PDO::FETCH_ASSOC);
        $totalamountposts = $fetch_posts_total['totalamountposts'];
        // var_dump($totalamountposts);
        return $totalamountposts; 
    }

    // public function loadMore(){
    //     $conn = Db::getInstance();

    //     // Checking how many rows you have
    //     $postperpage = 2;

    //     $statement = $conn->prepare("select count(*) as totalamountposts FROM posts");
    //     $statement->execute();
    //     $fetch_posts_total = $statement->fetch(\PDO::FETCH_ASSOC);
    //     $totalamountposts = $fetch_posts_total['totalamountposts'];
    //     var_dump($totalamountposts);

    //     // --> Kan ik bovenstaande code gewoon niet plaatsen bij getAllPosts?

    //     // Selecting first 5 posts
    //     $statement2 = $conn->prepare("SELECT *, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY postedDate DESC LIMIT 0,$postperpage ");
    //     $result = $statement2->execute();
    //     $firstPosts = $statement2->fetchAll(\PDO::FETCH_ASSOC);
    //     var_dump($firstPosts);

    //     // while($post = $firstPosts){
    //     //     $id = $post['id'];
            
    //     // }


    //     // $firstPosts = $statement2->fetch(\PDO::FETCH_ASSOC);
    //     // return $firstPosts;
    //     // var_dump($firstPosts); 

    // }

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
}