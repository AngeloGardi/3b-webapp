<?php 
require_once 'app/views/views.inc.php';

$page = $_GET['page'] ?? 'home';

if(!in_array($page, array_keys($views)) || !isset($_GET['page'])) {
    print_r(array_keys($views));
    header("Location: index.php?page=home");
    die();
}

require 'app/views/'.$views[$page];