<?php
session_start();

$username = "";
$errors = array();

$db = mysqli_connect('localhost','root','','garde_la_formation');

if isset(($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $passwd = mysqli_real_escape_string($db, $_POST['passwd']);

    if (empty($username)) { array_push($errors, "Nom utilisateur requis");}
    if (empty($passwd)) { array_push($errors, "Mot de passe requis");}

    

}
