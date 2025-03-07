<?php
require_once('connexion.php');

$nom = (!empty($_POST['nom'])) ? filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : die("Votre nom n'a pas été rempli");
$email = (!empty($_POST['email'])) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : die("Votre email n'a pas été rempli");
$telephone = (!empty($_POST['telephone'])) ? filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT) : null;


    if(!empty($nom) && !empty($email) && !empty($telephone)){
        $requete = $pdo->prepare('INSERT INTO étudiants(nom,Email,tph)
        VALUES (:nom, :Email, :tph)');

        $requete->bindvalue(':nom', $nom);
        $requete->bindvalue(':Email', $email);
        $requete->bindvalue(':tph', $telephone);

        $result = $requete->execute();

        if(!$result){
            echo "Un problème est survenu, l'enregistrement n'a pas été effectué!";
        }else{
            header('location: affichage.php');
        };
    }  
    ?>