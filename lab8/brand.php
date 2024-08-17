<?php 
header('Content-Type: application/json');
require_once 'application/controllers/apiloadimage.class.php';
$apiLoadImage = new ApiLoadImage();
$product = $apiLoadImage->getBrand($_GET['id']);
echo $product->getJson();