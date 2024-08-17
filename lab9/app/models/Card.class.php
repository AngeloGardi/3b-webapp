<?php 
class Card {
    private $title;
    private $description;
    private $subTitle;
    private $image;

    public function __construct(){
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getSubTitle(){
        return $this->subTitle;
    }

    public function getImage(){
        return $this->image;
    }


    public function setTitle($title){
        $this->title = $title;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setSubTitle($subTitle){
        $this->subTitle = $subTitle;
    }

    public function setImage($image){
        $this->image = $image;
    }
}