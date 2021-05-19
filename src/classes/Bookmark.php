<?php 


    namespace src\classes;
    spl_autoload_register();

    class Bookmark
    {

        private $userId;
        private $postId;



        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }

        /**
         * Get the value of postId
         */ 
        public function getPostId()
        {
                return $this->postId;
        }

        /**
         * Set the value of postId
         *
         * @return  self
         */ 
        public function setPostId($postId)
        {
                $this->postId = $postId;

                return $this;
        }

        public function isBookmarked() {
            $conn = Db::getInstance();
    
            $statement = $conn->prepare("SELECT * FROM bookmarks WHERE user_id = :user_id AND post_id= :post_id");
            $user_id = $this->getUserId();
            $post_id = $this->getPostId();
            $statement->bindValue(":post_id", $post_id);
            $statement->bindValue(":user_id", $user_id);
            $statement->execute();
    
            $bookmarkedResult = $statement->fetch(\PDO::FETCH_ASSOC);
            
            return $bookmarkedResult;
        }

        public function addBookmark(){
            $conn = Db::getInstance();

            $statement = $conn->prepare("INSERT INTO bookmarks (user_id, post_id) VALUES (:user_id, :post_id)");
            $user_id = $this->getUserId();
            $post_id = $this->getPostId();
            $statement->bindValue(":user_id", $user_id);
            $statement->bindValue(":post_id", $post_id);
            $result = $statement->execute();
    
            return $result;
        }

        public function removeBookmark(){
            $conn = Db::getInstance();

            $statement = $conn->prepare("DELETE FROM bookmarks WHERE user_id = :user_id AND post_id = :post_id");
            $user_id = $this->getUserId();
            $post_id = $this->getPostId();
            $statement->bindValue(":user_id", $user_id);
            $statement->bindValue(":post_id", $post_id);
            $result = $statement->execute();
    
            return $result;
        }
    }


?>