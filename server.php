<?php
session_start();

$mail = "";
$errors = array();

/** Connexion bdd */
$db = mysqli_connect('localhost', 'root', '', 'garde_la_formation');

/** Inscription */
if (isset($_POST['reg_user'])) {
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $name = mysqli_real_escape_string($db, $_POST['lastName']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $mail = mysqli_real_escape_string($db, $_POST['email']);
    $passwd = mysqli_real_escape_string($db, $_POST['psw']);
    $passwd_rep = mysqli_real_escape_string($db, $_POST['psw-repeat']);


    if (empty($mail)) {
        array_push($errors, "Mail requis");
    }
    if (empty($passwd)) {
        array_push($errors, "Mot de passe requis");
    }
    if ($passwd !== $passwd_rep) {
        array_push($errors, "Mot de passe non similaires");
    }

    /** Vérification dans bdd pour éviter doublon */
    $user_check_query = "SELECT * FROM users WHERE mail='$mail' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $users = mysqli_fetch_assoc($result);


    if ($users['username'] === $mail) {
        array_push($errors, "Mail déjà utilisé");
    }


    if (count($errors) === 0){
        $passwd =md5($passwd);

        $query = "INSERT INTO users (prenom, nom, phone ,address, age, mail, passwd) VALUES ('$firstName', '$name', '$phone', '$address', '$age', '$mail', '$passwd')";
        mysqli_query($db, $query);
        $_SESSION['prenom'] = $firstName;
        $_SESSION['succes'] = "Connexion réussi";
        header('location: login.php');
    } else {
        foreach($errors as $val) {
            var_dump($val);
        }
        exit();
    }
}

/** Login */
if (isset($_POST['login_user'])){

    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $passwd = mysqli_real_escape_string($db, $_POST['passwd']);

    if (empty($mail)){
        array_push($errors, "Entrez votre mail.");
    }
    if (empty($passwd)){
        array_push($errors, "Entrez votre mot de passe.");
    }

    if(count($errors) == 0) {
        $passwd = md5($passwd);
        $query = "SELECT * FROM users WHERE mail='$mail' AND passwd='$passwd'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)==1){
            $_SESSION['prenom'] = mysqli_fetch_array($results)["prenom"];
            $_SESSION['succes'] = "Vous êtes bien connecté";
            header('location: index.php');
        }else{
            array_push($errors, "Mauvaise combinaison d'itentifiants saisie");
        }
    }
}