<?php

$donnees = [];

$erreurs = [];

if (isset($_GET["donnees"]) && !empty($_GET["donnees"])) {
    $donnees = json_decode($_GET["donnees"], true);
}

if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {
    $erreurs = json_decode($_GET["erreurs"], true);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Convetir un nom en lettre</title>
</head>

<body>

    <div class="container">

        <form action="traitement-1.php" method="POST" class="col-md-6 offset-md-3 mt-5">
            <fieldset>
                <legend>Convetir un nom en lettre</legend>

                <?php if (isset($_GET["message"]) && !empty($_GET["message"])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_GET["message"]; ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET["erreur"]) && !empty($_GET["erreur"])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET["erreur"]; ?>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="number" name="nombre" id="nombre" class="form-control nombre" placeholder="Veuillez entrer un nombre entier." value="<?= (isset($donnees["nombre"]) && !empty($donnees["nombre"])) ? $donnees["nombre"] : "" ?>">
                    <?php if (isset($erreurs["nombre"]) && !empty($erreurs["nombre"])) { ?>
                        <p class="text-danger">
                            <?= $erreurs["nombre"]; ?>
                        </p>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-danger">Annuler</button>
                <button type="submit" class="btn btn-primary">Convertir</button>
            </fieldset>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>