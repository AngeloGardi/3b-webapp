<?php 
require_once dirname(__FILE__) . '/../class/db.class.php';
require_once dirname(__FILE__) . '/../models/Model.class.php';

class ApiGetDataController {
    private $db;

    function __construct() {
        $this->db = new DB();
    }
    
    public function getData(){
        $result = $this->db->getData('SELECT title, subtitle, description, creation_method, image, product_name FROM models');
        $data = [];
        foreach ($result as $row){
             array_push($data, new Model($row['title'], $row['creation_method'], $row['subtitle'], $row['description'], $row['image'], $row['product_name']));
        }

        return $data;
    }
}