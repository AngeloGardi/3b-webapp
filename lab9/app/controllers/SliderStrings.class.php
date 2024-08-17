<?php 
require_once dirname(__FILE__) . '/../class/db.class.php';
require_once dirname(__FILE__) . '/../models/Slider.class.php';
class SliderStrings {
    private $db;
    public function __construct(){
        $this->db = new DB();
    }

    public function getSliderStrings(){
        $sql = "SELECT * FROM slider_strings";
        $result = $this->db->getData($sql)[0];
        $sliderString = new Slider();
        $sliderString->setTitle($result['title']);
        $sliderString->setSubTitle($result['sub_title']);
        $sliderString->setDescription($result['description']);
        return $sliderString;
    }
}