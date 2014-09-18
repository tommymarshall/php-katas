<?php

class Movie {

    protected $rating;

    protected $title;

    protected $watched = false;

    public function __construct($title) {
        $this->title = $title;
    }

    public function watch()
    {
        $this->watched = true;
    }

    public function setRating($rating)
    {
        if ($rating > 5) throw new InvalidArgumentException;

        $this->rating = $rating;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function isWatched()
    {
        return $this->watched;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isAvailableOnCinemas()
    {
        return true;
    }

    public function hasSoundtrack()
    {
        return true;
    }
}
