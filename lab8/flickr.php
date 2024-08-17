<?php 
// bypass 'Access-Control-Allow-Origin' header not present issue
require 'application/class/flickr.class.php';
$flickr = new Flickr();
$response = $flickr->search($_GET['query']);
echo json_encode($response);