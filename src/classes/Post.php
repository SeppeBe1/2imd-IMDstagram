<?php

class Post  {
    protected $image;
    protected $description;
    protected $location;
    protected $postDate;

    protected $isLiked;
    protected $innappropriate;
    protected $filters;

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;

        return $this;
    }

    public function setIsLiked($isLiked)
    {
        $this->isLiked = $isLiked;

        return $this;
    }

    public function setInnappropriate($innappropriate)
    {
        $this->innappropriate = $innappropriate;

        return $this;
    }

    public function setfilters($filters)
    {
        $this->filters = $filters;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getPostDate()
    {
        return $this->postDate;
    }

    public function getIsLiked()
    {
        return $this->isLiked;
    }

    public function getInnappropriate()
    {
        return $this->innappropriate;
    }

    public function getFilters()
    {
        return $this->filters;
    }

}
?>