<?php 
namespace src\classes;

class Search {
    protected $param;
        
        public function getParam()
        {
            return $this->param;
        }

        public function setParam($param)
        {
            $this->param = $param;

            return $this;
        }

        public function searchParam($search)
        {
            $db = new Db();
            $conn = $db->getInstance();
            $statement = $conn->prepare("SELECT * FROM `users` INNER JOIN posts on users.id = posts.user_id 
            WHERE `username` LIKE :search or `description` LIKE :search or `location` LIKE :search");
            $keyword = "%".$search."%";
            $statement->bindValue(":search", $keyword, \PDO::PARAM_STR);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }

        public function searchTags($tag){
            // als klikt op die tag -> resultaten met die tag
            $db = new Db();
            $conn = $db->getInstance();
        
            $statement = $conn->prepare("select * from posts where description like :tag");
            $searchTag = "%#".$tag."%";
            $statement->bindValue(":tag", $searchTag, \PDO::PARAM_STR); //get clicked tag
            $results = $statement->execute();
            $resultsTag = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $resultsTag;
        }

        /* public function getAllDescription() {
            $db = new Db();
            $conn = $db->getInstance();
        
            $statement = $conn->prepare("select description from posts");
            $results = $statement->execute();
            $resultsDescr = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $resultsDescr;
        } */

        /* public function extractTags() {
            $db = new Db();
            $conn = $db->getInstance();
        
            $statement = $conn->prepare("SELECT SUBSTRING(description, locate('#',description)-1 + length('#')) AS Tags from posts");
            $results = $statement->execute();
            $resultsTags = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $resultsTags;
        } */
}

?>