<?php 
class Model {
    private $title; 
    private $creationMethod;
    private $subTitle;
    private $description;
    private $image;
    private $productName;

    public function __construct($title, $creationMethod, $subTitle, $description, $image, $productName){
        $this->title = $title;
        $this->creationMethod = $creationMethod;
        $this->subTitle = $subTitle;
        $this->description = $description;
        $this->image = $image;
        $this->productName = $productName;
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

    public function getProductName(){
        return $this->productName;
    }

    public function getJson(){
        return json_encode([
            'title' => $this->title,
            'creationMethod' => $this->creationMethod,
            'subTitle' => $this->subTitle,
            'description' => $this->description,
            'image' => $this->image,
            'productName' => $this->productName
        ]);
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

    public function setProductName($productName){
        $this->productName = $productName;
    }
}