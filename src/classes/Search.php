<?php 
namespace src\classes;

class Search {
    protected $param;
    protected $tag;
        
        public function getParam()
        {
            return $this->param;
        }

        public function setParam($param)
        {
            $this->param = $param;

            return $this;
        }

        public function getTag()
        {
            return $this->tag;
        }

        public function setTag($tag)
        {
            $this->tag = $tag;

            return $this;
        }

        public function searchParam($search)
        {
            $db = new Db();
            $conn = $db->getInstance();
            $statement = $conn->prepare("SELECT *, users.id AS userid FROM `users` INNER JOIN posts ON users.id = posts.user_id 
            WHERE `username` LIKE :search OR `description` LIKE :search OR `location` LIKE :search");
            $keyword = "%".$this->getParam()."%";
            $statement->bindValue(":search", $keyword, \PDO::PARAM_STR);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            
            return $results;
        }

        public function searchTags($tag){
            $db = new Db();
            $conn = $db->getInstance();
        
            $statement = $conn->prepare("SELECT * FROM posts WHERE description LIKE :tag");
            $searchTag = "%#".$this->getTag()."%";
            $statement->bindValue(":tag", $searchTag, \PDO::PARAM_STR); //get clicked tag
            $results = $statement->execute();
            $resultsTag = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $resultsTag;
        }
}

?>