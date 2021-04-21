<?php 
namespace src\classes;
spl_autoload_register();

class Like
{
    protected $userID;
    protected $postID;
    
    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }
    
    public function getPostID()
    {
        return $this->postID;
    }

    public function setPostID($postID)
    {
        $this->postID = $postID;

        return $this;
    }

    public function countLikes($post_id) { //tellen van likes
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("select count(post_id) as count from likes where post_id = :post_id");
        $post_id = $this->getPostID();
        $statement->bindValue(":post_id", $post_id);
        $result = $statement->execute();

        $likes = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $likes;
    }

    public function isLiked($user_id, $post_id) { //welke post heeft de user geliked 
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("select * from likes where user_id = :user_id and post_id= :post_id");
        $user_id = $this->getUserID();
        $post_id = $this->getPostID();
        $statement->bindValue(":post_id", $post_id);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();

        $isLikedResults = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $isLikedResults;
    }

    public function showLikes($post_id) {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("select * from likes where post_id= :post_id");
        $post_id = $this->getPostID();
        $statement->bindValue(":post_id", $post_id);
        $results = $statement->execute();

        $resultShowlikes = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $resultShowlikes;
    }

    public function addLike($user_id, $post_id) {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("insert into likes (user_id, post_id) values (:user_id, :post_id)");
        $user_id = $this->getUserID();
        $post_id = $this->getPostID();
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":post_id", $post_id);
        $results = $statement->execute();

        return $results;
    }

    public function removeLike($user_id, $post_id) {
        $db = new Db();
        $conn = $db->getInstance();

        $statement = $conn->prepare("delete from likes where user_id = :user_id and post_id = :post_id");
        $user_id = $this->getUserID();
        $post_id = $this->getPostID();
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":post_id", $post_id);
        $results = $statement->execute();

        return $results;
    }
}
