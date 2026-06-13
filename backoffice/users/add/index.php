<?php


echo '<pre>';
var_dump($_POST);  

echo '<hr>';

$_SESSION["email"] = ["mantenedor" => 'usuario'];

if($_POST['email'] != ""){

var_dump($_SESSION);

}

echo '<pre>';
?>