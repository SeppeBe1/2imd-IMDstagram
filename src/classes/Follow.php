<?php
namespace src\classes;
class Follow{
    private $isFollower;
    private $isFollowing;
    private $status;
    
    

    /**
     * Get the value of isFollower
     */ 
    public function getIsFollower()
    {
        return $this->isFollower;
    }

    /**
     * Set the value of isFollower
     *
     * @return  self
     */ 
    public function setIsFollower($isFollower)
    {
        $this->isFollower = $isFollower;

        return $this;
    }

    /**
     * Get the value of isFollowing
     */ 
    public function getIsFollowing()
    {
        return $this->isFollowing;
    }

    /**
     * Set the value of isFollowing
     *
     * @return  self
     */ 
    public function setIsFollowing($isFollowing)
    {
        $this->isFollowing = $isFollowing;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function follow(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO followers (isFollower, isFollowing , status) VALUES (:follower, :following, :status)");
        $isFollower = $this->getIsFollower();
        $isFollowing = $this->getIsFollowing();
        $status = $this->getStatus();

        $statement->bindValue(":follower", $isFollower);
        $statement->bindValue(":following", $isFollowing);
        $statement->bindValue(":status", $status);

        $result = $statement->execute();
        return $result;
        

    }

    public function unfollow(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("delete from followers where isFollowing = :following AND isFollower = :follower");
        $isFollower = $this->getIsFollower();
        $isFollowing = $this->getIsFollowing();

        $statement->bindValue(":follower", $isFollower);
        $statement->bindValue(":following", $isFollowing);

        $result = $statement->execute();
        return $result;
        

    }

    public function getallFollowing (){
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT *, isFollowing from followers inner join users on followers.isFollowing = users.id where isFollower = :follower AND status = 'following'");
        $isFollower = $this->getIsFollower();
        $statement->bindValue(":follower", $isFollower);
        $result = $statement->execute();
        $following = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $following;
    }

    public function getallFollowers (){
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT *, isFollower from followers  inner join users on followers.isFollower = users.id where isFollowing = :following AND status = 'following'");
        $isFollowing = $this->getIsFollowing();
        $statement->bindValue(":following", $isFollowing);
        $result = $statement->execute();
        $following = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $following;
    }

    public function getallRequests (){
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT *, isFollower from followers  inner join users on followers.isFollower = users.id where isFollowing = :following AND status = 'pending'");
        $isFollowing = $this->getIsFollowing();
        $statement->bindValue(":following", $isFollowing);
        $result = $statement->execute();
        $following = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $following;
    }

    public function isFollowing() { //which profile is user following 
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM followers WHERE isFollower = :user_id AND isFollowing = :following AND status = 'following' ");
        $user_id = $this->getIsFollower();
        $following = $this->getIsFollowing();
        $statement->bindValue(":following", $following);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();

        $isFollowing = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $isFollowing;
    }

    public function isRequested() { //which profile is user following 
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM followers WHERE isFollower = :user_id AND isFollowing = :following AND status = 'pending' ");
        $user_id = $this->getIsFollower();
        $following = $this->getIsFollowing();
        $statement->bindValue(":following", $following);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();

        $isRequested = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $isRequested;
    }

    public function updateStatus(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("UPDATE followers SET status = :status where isFollowing = :user_id AND isFollower = :follower AND status = 'pending')");
        $user_id = $this->getIsFollower();
        $isFollower = $this->getIsFollowing();
        $status = $this->getStatus();
        $statement->bindValue(":user_id", $isFollower);
        $statement->bindValue(":follower", $user_id);
        $statement->bindValue(":status", $status);
        
        $result = $statement->execute();
        
        return $result;
    }

    public function deleteRequest(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("DELETE * from followers where isFollowing = :user_id AND isFollower = :follower AND status = 'pending')");
        $user_id = $this->getIsFollower();
        $isFollower = $this->getIsFollowing();
        $statement->bindValue(":user_id", $isFollower);
        $statement->bindValue(":follower", $user_id);
        $result = $statement->execute();
        
        return $result;
    }
}


?>