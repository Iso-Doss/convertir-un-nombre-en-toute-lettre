<?php

function uniter(string $nombre): string
{

    $nombre_lettre = "";

    switch ($nombre) {
        case 0:
            $nombre_lettre = "zéro";
            break;
        case 1:
            $nombre_lettre = "un";
            break;
        case 2:
            $nombre_lettre = "deux";
            break;
        case 3:
            $nombre_lettre = "trois";
            break;
        case 4:
            $nombre_lettre = "quatre";
            break;
        case 5:
            $nombre_lettre = "cinq";
            break;
        case 6:
            $nombre_lettre = "six";
            break;
        case 7:
            $nombre_lettre = "sept";
            break;
        case 8:
            $nombre_lettre = "huit";
            break;
        case 9:
            $nombre_lettre = "neuf";
            break;
    }

    return $nombre_lettre;
}

function dizaine(string $nombre): string
{

    $nombre_lettre = "";

    if ((int) $nombre > 0) {

        $dizaine = substr($nombre, 0, 1);

        $uniter = substr($nombre, -1);

        switch ($dizaine) {

            case 0:
                $nombre_lettre = "" . uniter($uniter);
                break;
            case 1:
                $nombre_lettre = dizaine_dix($uniter);
                break;
            case 2:
                if ($uniter == 0) {
                    $nombre_lettre = "vingt";
                } else {
                    $nombre_lettre = "vingt-" . uniter($uniter);
                }

                break;
            case 3:
                if ($uniter == 0) {
                    $nombre_lettre = "trente";
                } else {
                    $nombre_lettre = "trente-" . uniter($uniter);
                }
                break;
            case 4:
                if ($uniter == 0) {
                    $nombre_lettre = "quarante";
                } else {
                    $nombre_lettre = "quarante-" . uniter($uniter);
                }
                break;
            case 5:
                if ($uniter == 0) {
                    $nombre_lettre = "cinquante";
                } else {
                    $nombre_lettre = "cinquante-" . uniter($uniter);
                }
                break;
            case 6:
                if ($uniter == 0) {
                    $nombre_lettre = "soixante";
                } else {
                    $nombre_lettre = "soixante-" . uniter($uniter);
                }
                break;
            case 7:
                if ($uniter == 0) {
                    $nombre_lettre = "soixante";
                } else {
                    $nombre_lettre = "soixante-" . dizaine_dix($uniter);
                }
                break;
            case 8:
                if ($uniter == 0) {
                    $nombre_lettre = "quatre-vingt";
                } else {
                    $nombre_lettre = "quatre-vingt-" . uniter($uniter);
                }
                break;
            case 9:
                if ($uniter == 0) {
                    $nombre_lettre = "quatre-vingt-dix";
                } else {
                    $nombre_lettre = "quatre-vingt-" . dizaine_dix($uniter);
                }
                break;
        }
    }

    return $nombre_lettre;
}

function dizaine_dix($nombre)
{
    $nombre_lettre = "";
    if ($nombre >= 7 && $nombre <= 9) {
        $nombre_lettre = "dix-" . uniter($nombre);
    } else if ($nombre == 0) {
        $nombre_lettre = "dix";
    } else if ($nombre == 1) {
        $nombre_lettre = "onze";
    } else if ($nombre == 2) {
        $nombre_lettre = "douze";
    } else if ($nombre == 3) {
        $nombre_lettre = "treize";
    } else if ($nombre == 4) {
        $nombre_lettre = "quartoze";
    } else if ($nombre == 5) {
        $nombre_lettre = "quinze";
    } else if ($nombre == 6) {
        $nombre_lettre = "seize";
    }
    return $nombre_lettre;
}

function centaine(string $nombre): string
{

    $centaine_lettre = "";

    if ((int) $nombre > 0) {

        $centaine = substr($nombre, 0, 1);

        $dizaine = substr($nombre, 1, 2);

        switch ($centaine) {
            case 0:
                $centaine_lettre = "";
                break;
            case 1:
                $centaine_lettre = "cent-";
                break;
            case 2:
                $centaine_lettre = "deux-cent-";
                break;
            case 3:
                $centaine_lettre = "trois-cent-";
                break;
            case 4:
                $centaine_lettre = "quatre-cent-";
                break;
            case 5:
                $centaine_lettre = "cinq-cent-";
                break;
            case 6:
                $centaine_lettre = "six-cent-";
                break;
            case 7:
                $centaine_lettre = "sept-cent-";
                break;
            case 8:
                $centaine_lettre = "huit-cent-";
                break;
            case 9:
                $centaine_lettre = "neuf-cent-";
                break;
        }
    }

    return $centaine_lettre . dizaine($dizaine);
}

function digit(int $nombre): string
{

    $digit = "";

    $nombre_length = strlen((string)$nombre);

    if ($nombre_length < 3) {

        $digit = str_repeat("0", 3 - $nombre_length);
    }

    return $digit . $nombre;
}

function decomposition(int $nombre): string
{

    $message = "";

    $milliards = digit(0);
    $millions = digit(0);
    $milliers = digit(0);
    $uniters = digit(0);

    if ((int) ($nombre / 1000000000) > 0) {
        $milliards = digit((int) ($nombre / 1000000000));
    }

    $nombre = $nombre - ($milliards * 1000000000);

    if ((int) ($nombre / 1000000) > 0) {
        $millions = digit((int) ($nombre / 1000000));
    }

    $nombre = $nombre - ($millions * 1000000);

    if ((int) ($nombre / 1000) > 0) {
        $milliers = digit((int) ($nombre / 1000));
    }

    $nombre = $nombre - ($milliers * 1000);

    $uniters = digit($nombre);

    if ($milliards > 0) {

        $message .= " " . centaine($milliards) . " milliards";
    }

    if ($millions > 0) {
        $message .= " " . centaine($millions) . " millions";
    }

    if ($milliers > 0) {
        $message .= " " . centaine($milliers) . " milles";
    }

    if ($uniters > 0) {
        $message .= " " . centaine($uniters);
    }

    return $message;
}
