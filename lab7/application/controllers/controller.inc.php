<?php 
require_once 'home.class.php';
require_once 'apigetdata.class.php';

$controllers = [
    'home' => HomeController::class,
    'apigetdata' => ApiGetDataController::class,
];