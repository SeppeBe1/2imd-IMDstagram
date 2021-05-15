<?php
namespace src\classes;
spl_autoload_register();

class Comment{
    
    private $commentDate;
    private $text;
    private $userId;
    private $postId;

    public function setTotalLikes($totalLikes)
    {
        $this->isLiked = $totalLikes;

        return $this;
    }

    public function setCommentDate($commentDate)
    {
        $this->innappropriate = $commentDate;

        return $this;
    }


    public function getTotalLikes()
    {
        return $this->totalLikes;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }


    public function getText()
    {
        return $this->text;
    }

   
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

   
    public function getUserId()
    {
        return $this->userId;
    }

  
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getPostId()
    {
        return $this->postId;
    }

   
    public function setPostId($postId)
    {
        $this->postId = $postId;

        return $this;
    }

    
    public function saveC(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO comments(commentText, commentDate, post_id, user_id) VALUES (:commentText, :commentDate, :post_id, :user_id)");
        $text = $this->getText();
        $postId = $this->getPostId();
        $userId = $this->getUserId();
        $commentDate = date("Y-m-d H:i:s");

        $statement->bindValue(":commentText", $text);
        $statement->bindValue(":post_id", $postId);
        $statement->bindValue(":user_id", $userId);
        $statement->bindValue(":commentDate", $commentDate);

        $result = $statement->execute();
        return $result;
        

    }
 
    public function getAllComments($postId){
      $conn = Db::getInstance();
      //JOIN MET TABLE USERS OM USERNAME & AVATAR TE TONEN
      $statement = $conn->prepare("select *, post_id from comments inner join users on comments.user_id = users.id where post_id = :postId" );
      $statement->bindValue(":postId", $postId);
      $result = $statement->execute();
    
      $showAllcomments = $statement->fetchAll(\PDO::FETCH_ASSOC);
      return $showAllcomments;
  }

   // changes date in ... ago 
   //SOURCE FUNCTION: https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago
    public function timeAgo($timestamp){
  
        date_default_timezone_set("Europe/Brussels");         
        $time_ago        = strtotime($timestamp);
        $current_time    = time();
        $time_difference = $current_time - $time_ago;
        $seconds         = $time_difference;
        
        $minutes = round($seconds / 60); // value 60 is seconds  
        $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
        $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
        $weeks   = round($seconds / 604800); // 7*24*60*60;  
        $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
        $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
                      
        if ($seconds <= 60){
      
          return "Just Now";
      
        } else if ($minutes <= 60){
      
          if ($minutes == 1){
      
            return "one minute ago";
      
          } else {
      
            return "$minutes minutes ago";
      
          }
      
        } else if ($hours <= 24){
      
          if ($hours == 1){
      
            return "an hour ago";
      
          } else {
      
            return "$hours hrs ago";
      
          }
      
        } else if ($days <= 7){
      
          if ($days == 1){
      
            return "yesterday";
      
          } else {
      
            return "$days days ago";
      
          }
      
        } else if ($weeks <= 4.3){
      
          if ($weeks == 1){
      
            return "a week ago";
      
          } else {
      
            return "$weeks weeks ago";
      
          }
      
        } else if ($months <= 12){
      
          if ($months == 1){
      
            return "a month ago";
      
          } else {
      
            return "$months months ago";
      
          }
      
        } else {
          
          if ($years == 1){
      
            return "one year ago";
      
          } else {
      
            return "$years years ago";
      
          }
        }
    
    }
}