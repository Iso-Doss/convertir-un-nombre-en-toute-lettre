<?php

include_once 'function.php';

// for ($i = 0; $i <= 100000; $i++) {
//     echo decomposition($i) . "</br>";
// }
//die();

$donnees = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

if (!isset($_POST["nombre"]) || (empty($_POST["nombre"]) && 0 !== $_POST["nombre"])) {
    $erreurs["nombre"] = "Le champ nombre est requis. Veuillez le renseigné.";
} else if (!is_numeric($_POST["nombre"])) {
    $erreurs["nombre"] = "Le champ nombre doit est un nombre (numérique). Veuillez le corrigé.";
}

if (empty($erreurs)) {

    $message = decomposition($_POST["nombre"]);
} else {

    $erreur = "Oups! Une ou plusieurs champ sont mal renseignées. Veuillez les corrigés.";
}

header("location: index.php?donnees=" . json_encode($donnees) . "&erreurs=" . json_encode($erreurs) . "&erreur=$erreur&message=$message");
