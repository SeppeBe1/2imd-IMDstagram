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
    public function getAllPosts($limit,$following){
        $conn = Db::getInstance();

        // VARIABLE THAT DEFINES HOW MANY POSTS WE WANT TO DISPLAY, TO BEGIN

        // COLLECTING ALL THE POSTS, LIMITED BY THE AMOUNT
        $statement = $conn->prepare("SELECT *, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id where user_id = :userid ORDER BY postedDate DESC LIMIT :limit");
        
        $statement->bindValue(":userid", $following);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();
        $posts = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
        
        return $posts;
    }

    public function getAllfollowers($follower){
        $conn = Db::getInstance();
        // $statement = $conn->prepare("SELECT *, isFollowing from followers where isFollower = :userid inner join posts");
        $statement = $conn->prepare("SELECT *, posts.id FROM posts INNER JOIN followers ON posts.user_id = followers.isFollower INNER JOIN users ON followers.isFollowing = users.id where user_id = :userid ");

        $statement->bindValue(":userid", $follower);
        $statement->execute();
        $followers = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $followers;
       
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
    public function getAllReportedPosts()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT DISTINCT posts.* , users.username, users.avatar FROM posts INNER JOIN reports ON posts.id = reports.post_id INNER JOIN users ON posts.user_id= users.id group by reports.post_id  having count(*) >= 3 ");
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

    public function getSelectedFilter($id){
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT filtername FROM filters WHERE id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $selectedFilter = $statement->fetch();

        return $selectedFilter["filtername"];

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
        
        $statement = $conn->prepare("SELECT * from posts WHERE id= :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $results = $statement->fetch();

         //image path
        $imageUrl = './uploads/'. $results['photo'];
        //check if image exists
        if(file_exists($imageUrl)){ 
            //delete the image from folder
            unlink(realpath($imageUrl));
            $statement = $conn->prepare("DELETE FROM posts WHERE id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $result = $statement->fetch();
            header ("Refresh:0");
            return $result;
        }
    }

    public function deleteAllPostUser($user_id)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * from posts WHERE user_id= :user_id");
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
        $results = $statement->fetch();

        //image path
        $imageUrl = './uploads/' . $results['photo'];
        //check if image exists
        if (file_exists($imageUrl)) {
            //delete the image from folder
            unlink(realpath($imageUrl));
            $statement = $conn->prepare("DELETE FROM posts WHERE user_id= :user_id");
            $statement->bindValue(":user_id", $user_id);
            $statement->execute();
            $result = $statement->fetch();
            header("Refresh:0");
            return $result;
        }
    }

    public function deleteAllReports($id){
        $conn = Db::getInstance();

        $statement = $conn->prepare("DELETE FROM reports WHERE post_id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
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
    }

    public function makeHiddenPost($post_id)
    {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("SELECT count(*) FROM reports WHERE post_id = :post_id");
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
        $result = $statement->fetchColumn();
        if ($result >= 3) {
            return false;
        } else {
            return true;
        }
    }
    public function editPost($id){
        
    }

        // Source of function: https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago
        public function humanTiming($post_id){

            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT postedDate FROM posts WHERE id = :post_id");
            $statement->bindValue(":post_id", $post_id);
            $statement->execute();
    
            date_default_timezone_set('Europe/Brussels');

            $timeCurrent = $statement->fetchAll(\PDO::FETCH_ASSOC)[0]["postedDate"];

            $time54 = strtotime(($timeCurrent));
            $time = (int)$time54;

            
            $time = time() - $time;
            $time = ($time<1)? 1 : $time;
            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );
    
            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }
        }
}