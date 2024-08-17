<?php 
require_once 'controllers/controller.inc.php';
require_once 'views/views.inc.php';

$pageURI = $_SERVER['REQUEST_URI'];
$page = explode('index.php/', $pageURI)[1] ?? false;
$mainURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

if(!in_array($page, array_keys($views))){
    print_r(array_keys($views));
    header("Location: $mainURL/index.php/home");
    die();
}

require 'views/'.$views[$page];