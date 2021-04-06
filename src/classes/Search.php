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
            $statement = $conn->prepare("SELECT * FROM `users` INNER JOIN posts on users.id = posts.user_id WHERE `username` LIKE :search or `description` LIKE :search");
            $keyword = "%".$search."%";
            $statement->bindValue(":search", $keyword, \PDO::PARAM_STR);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            
            return $results;
        }

        public function searchTags(){
            // als klikt op die tag -> resultaten met die tag
            // select * from posts where description like %:tag%
            $db = new Db();
            $conn = $db->getInstance();
        
            $statement = $conn->prepare("select * from posts where description like %:tag%");
            $statement->bindValue(":tag", $this->param); //get clicked tag
            $results = $statement->execute();
            $paramSearch = $statement->fetchAll();
        }

}

?>