<?php 
require_once dirname(__FILE__). '/../class/db.class.php';
require_once dirname(__FILE__). '/../models/Product.class.php';
require_once dirname(__FILE__). '/../models/Model.class.php';
class ApiLoadImage {
    public function getProducts(){
        $db = new DB();
        $sql = "SELECT id, product_name FROM models";
        $result = $db->getData($sql);
        $products = [];
        foreach($result as $row){
            array_push($products, new Product($row['id'], $row['product_name']));
        }
        return $products;
    }

    public function getBrand($id){
        $db = new DB();
        $sql = "SELECT * FROM models WHERE id = :id";
        $params = [
            ['name' => ':id', 'value' => $id, 'type' => PDO::PARAM_INT]
        ];
        $result = $db->getData($sql, $params)[0];
        $model = new Model($result['title'], $result['creation_method'], $result['subtitle'], $result['description'], $result['image'], $result['product_name']);
        return $model;
    }
}