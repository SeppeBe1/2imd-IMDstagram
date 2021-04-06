<?php
//include_once(__DIR__ . "/helpers/autoloader.php");
namespace src\classes;

class Comment{
    protected $totalLikes;
    protected $commentDate;
    protected $text;

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

    public function setText($text)
    {
        $this->filters = $text;

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


}

?>