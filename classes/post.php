<?php
include_once(__DIR__ . "../Db.php");

class Post 
{
    protected $image;
    protected $description;
    protected $location;
    protected $postDate;

    protected $isLiked;
    protected $innappropriate;
    protected $filters;
}
