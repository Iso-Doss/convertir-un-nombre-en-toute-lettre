<?php

include_once 'function.php';

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

    $decomposition = [];

    $nombre = $_POST["nombre"];
    while ($nombre != "") {
        $tmp = substr($nombre, -3, 3);
        $decomposition[] = $tmp;
        $nombre = implode(explode($tmp, $nombre));
    }

    $taille_decomposition = sizeof($decomposition);

    $decomposition_nombre = [];

    foreach ($decomposition as $cle => $d) {
        if (strlen((string) $d) == 1) {
            $decomposition_nombre[$cle] = uniter((string) $d) . " ";
        } else if (strlen((string) $d) == 2) {
            $decomposition_nombre[$cle] = dizaine((string) $d) . " ";
        } elseif (strlen((string) $d) == 3) {
            $decomposition_nombre[$cle] = centaine((string) $d) . " ";
        }

        if ($cle == 3) {
            $decomposition_nombre[$cle] .= "milliard ";
        } elseif ($cle == 2) {
            $decomposition_nombre[$cle] .= "million ";
        } elseif ($cle == 1) {
            $decomposition_nombre[$cle] .= "mille ";
        }
    }

    $decomposition_nombre = array_reverse($decomposition_nombre);

    $message = implode($decomposition_nombre);
} else {
    $erreur = "Oups! Une ou plusieurs champ sont mal renseignées. Veuillez les corrigés.";
}

header("location: index.php?donnees=" . json_encode($donnees) . "&erreurs=" . json_encode($erreurs) . "&erreur=$erreur&message=$message");
