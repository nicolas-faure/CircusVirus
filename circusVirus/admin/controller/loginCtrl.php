<?php
require 'model/database.php';
require 'model/users.php';
$formErrors = array();
if (count($_POST) > 0) {
    $user = new users();
    if (!empty($_POST['username'])) {
        if  ($_POST['username']) {
            $user->username = htmlspecialchars($_POST['username']);
        } else {
            $formErrors['username'] = 'Ce nom d\'utilisateur est incorrect';
        }
    } else {
        $formErrors['username'] = 'Le nom d\'utilisateur est obligatoire';
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $formErrors['password'] = 'Le mot de passe est obligatoire';
    }

    if (count($formErrors) == 0) {
        //Après mes vérifications habituelles, je lance ma méthode checkUser afin de vérifier si l'utilisateur existe bien.
        $check = $user->checkUser();
        if ($check->number == 1) {
//Si l'utilisateur existe je récupère le hash de son mot de passe pour le comparé au mot de passe tapé
            $hash = $user->getHashByUsername();
            //On utilise la fonction password_verify pour vérifier que les mots de passe correspondent
            if (password_verify($_POST['password'], $hash->password) && $hash->id_usersTypes == 1 ) {
                /**
                 * Si les mots de passe correspondent, on crée une session et les variables de session qui contiendront
                 * tous les éléments que l'on souhaite conserver tout au long de la connexion
                 * Il faut appeler session_start sur toutes les pages pour que l'on ai accès aux
                 * variables de session. C'est ce qui constitue la connexion en elle-même.
                 */
                session_start();
                $_SESSION['username'] = $user->username;
                $_SESSION['usersType'] =$user->id_usersTypes == 1;
            } else {
                $formErrors['username'] = 'Le nom d\'utilisateur est invalide';
                $formErrors['password'] = 'Le mot de passe est invalide';
                $formErrors['usersType'] = 'Vous n\'avez pas les droits pour acceder à cette partie du site';
            }
        } else {
            $formErrors['username'] = 'Le nom d\'utilisateur est invalide';
            $formErrors['password'] = 'Le mot de passe est invalide';
            $formErrors['usersType'] = 'Vous n\'avez pas les droits pour acceder à cette partie du site';
        }
    }
}