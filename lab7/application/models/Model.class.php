<?php 
class Model {
    private $title; 
    private $creationMethod;
    private $subTitle;
    private $description;
    private $image;

    public function __construct($title, $creationMethod, $subTitle, $description, $image){
        $this->title = $title;
        $this->creationMethod = $creationMethod;
        $this->subTitle = $subTitle;
        $this->description = $description;
        $this->image = $image;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getCreationMethod(){
        return $this->creationMethod;
    }

    public function getSubTitle(){
        return $this->subTitle;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setCreationMethod($creationMethod){
        $this->creationMethod = $creationMethod;
    }

    public function setSubTitle($subTitle){
        $this->subTitle = $subTitle;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setImage($image){
        $this->image = $image;
    }
}