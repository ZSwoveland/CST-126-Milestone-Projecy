<?php

include_once('connect.php');
if(!isset($_GET['id'])){
    header('Location:index.html');
    die();
}

delete('catergories', $_GET['id']);
header('Location:category_list.php');
die();
?>