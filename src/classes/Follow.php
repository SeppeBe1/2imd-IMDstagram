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
}


?>