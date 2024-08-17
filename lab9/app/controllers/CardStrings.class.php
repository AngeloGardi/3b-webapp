<?php 
require_once dirname(__FILE__) . '/../class/db.class.php';
require_once dirname(__FILE__) . '/../models/Card.class.php';
class CardStrings {
    private $db;
    public function __construct(){
        $this->db = new DB();
    }

    public function getCardStrings(){
        $sql = "SELECT * FROM cards_strings ORDER BY id ASC";
        $result = $this->db->getData($sql);

        $cardStrings = [];
        foreach($result as $row){
            $cardString = new Card();
            $cardString->setTitle($row['title']);
            $cardString->setDescription($row['description']);
            $cardString->setSubTitle($row['sub_title']);
            $cardString->setImage($row['image']);
            array_push($cardStrings, $cardString);
        }

        return $cardStrings;
    }
}