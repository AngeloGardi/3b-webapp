<?php 
class Slider{
    private $title;
    private $subTitle;
    private $description;

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

    public function setTitle($title){
        $this->title = $title;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setSubTitle($subTitle){
        $this->subTitle = $subTitle;
    }
}