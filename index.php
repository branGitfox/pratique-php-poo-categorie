<?php  
require './model/Database.php';

$page = $_SERVER['REQUEST_URI'];
ob_start();
if($page === '/'){
    require './view/home.php';
}elseif($page === '/new'){
    require './view/new.php';
}

$content = ob_get_clean();

require './view/template/index.php';
