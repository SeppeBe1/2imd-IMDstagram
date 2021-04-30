<?php 
namespace src\classes;
spl_autoload_register();

class Like
{
    private $userID;
    private $postID;
    
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

    public function countLikes() { //tellen van likes
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT count(post_id) as count FROM likes WHERE post_id = :post_id");
        $post_id = $this->getPostID();
        $statement->bindValue(":post_id", $post_id);
        $result = $statement->execute();

        $likes = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $likes;
    }

    public function isLiked() { //welke post heeft de user geliked 
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM likes WHERE user_id = :user_id AND post_id= :post_id");
        $user_id = $this->getUserID();
        $post_id = $this->getPostID();
        $statement->bindValue(":post_id", $post_id);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();

        $isLikedResults = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $isLikedResults;
    }

    public function showLikes() {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM likes WHERE post_id= :post_id");
        $post_id = $this->getPostID();
        $statement->bindValue(":post_id", $post_id);
        $results = $statement->execute();

        $resultShowlikes = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $resultShowlikes;
    }

    public function addLike() {
        $conn = Db::getInstance();

        $statement = $conn->prepare("INSERT INTO likes (user_id, post_id) VALUES (:user_id, :post_id)");
        $user_id = $this->getUserID();
        $post_id = $this->getPostID();
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":post_id", $post_id);
        $results = $statement->execute();

        return $results;
    }

    public function removeLike() {
        $conn = Db::getInstance();

        $statement = $conn->prepare("DELETE FROM likes WHERE user_id = :user_id AND post_id = :post_id");
        $user_id = $this->getUserID();
        $post_id = $this->getPostID();
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":post_id", $post_id);
        $results = $statement->execute();

        return $results;
    }
}
