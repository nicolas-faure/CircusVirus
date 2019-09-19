<?php
require 'controller/loginCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet"/>
        <link rel="stylesheet" href="/assets/css/script.css"/>
    </head>
    <body class="admin">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <h1><a href="index.php">Circus Virus</a></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Les volontaires
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="addVolunteer.php">Ajouter des membres</a>
                            <a class="dropdown-item" href="listMember.php">Liste des membres</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modifyRight.php">Modifier les droits</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Les locations :
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="addLeasing.php">Ajouter une location</a>
                            <a class="dropdown-item" href="listLeasing.php">liste des locations</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="controller/logoutCtrl.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>
        <h2>Connexion :</h2>
        <div class="container formular">
            <form method="POST" action="login.php" id="styleForm">
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right <?= isset($_POST['username']) ? (isset($formErrors['username']) ? 'has-danger' : 'has-success') : '' ?>">
                        <label for="username">Nom d'utilisateur :</label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="text" name="username" id="username" class="form-control <?= isset($_POST['username']) ? (isset($formErrors['username']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['username']) ? 'value="' . $_POST['username'] . '"' : '' ?> placeholder="gaston" />
                        <?php if (isset($_POST['username']) && isset($formErrors['username'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['username'] ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right <?= isset($_POST['password']) ? (isset($formErrors['password']) ? 'has-danger' : 'has-success') : '' ?>">
                        <label for="password">Mot de passe :</label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="password" name="password" id="password" class="form-control <?= isset($_POST['password']) ? (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['password']) ? 'value="' . $_POST['password'] . '"' : '' ?> placeholder="********" />
                        <?php if (isset($_POST['password']) && isset($formErrors['password'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                        <?php } ?>
                    </div>
                </div>
                <input type="submit" value="Connexion" class="btn btn-success" href='index' />
            </form>
        </div>
        <?php if (isset($_SESSION['username'])) { ?>
            <p>Vous êtes connecté avec le nom d'utilisateur : <?= $_SESSION['username'] ?></p> 
        <?php } ?>
    </body>
</html>
