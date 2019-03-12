<?php
//var_dump($_POST);
foreach ($_POST as $key=>$post){
    $_POST[$key] = htmlentities(strip_tags(trim($post)));//protection contre les attaques js
}
//var_dump($_POST);
include 'envoie_mail.php';
?>