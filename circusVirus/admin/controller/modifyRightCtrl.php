<?php

require 'model/database.php';
require 'model/volunteers.php';
require 'model/users.php';
require 'model/usersType.php';

$users = new users();
$volunteers = new volunteers();
$usersTypes = new usersTypes();
$showVolunteers = $volunteers->getShowVolunteer();
$showUserstypes = $usersTypes->getShowUsersTypes();
$formErrors = array();
if (isset($_POST['validModifyRight'])) {
  if (!empty($_POST['id_volunteers'])) {
    $users->id_volunteers = intval($_POST['id_volunteers']);
  } else {
    $formErrors['id_volunteers'] = 'Veuillez renseigner le membre de l\'équipe';
  }
  if (!empty($_POST['password'])) {
        //Je hash le mot de passe pour le sécurisé, je ne connais pas le mot de passe des utilisateurs de mon application
        $users->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    } else {
        $formErrors['password'] = 'Le mot de passe est obligatoire';
    }
    if (!empty($_POST['username'])) {
//        if (preg_match($_POST['username'])) {
            $users->username = htmlspecialchars($_POST['username']);
            /**
             * Je vérifie si l'utilisateur existe dans la base de données
             */
//            $check = $users->checkUser();
//            if ($check->number > 0) {
//                $formErrors['username'] = 'Le nom d\'utilisateur est déja pris';
//            }
            } else {
        $formErrors['username'] = 'Le nom d\'utilisateur  est obligatoire';
    }
      if (!empty($_POST['id_usersTypes'])) {
//          if($_POST['id_usersTypes'] == "2"){
//              $users->id_usersTypes = 2;
//          }
    $users->id_usersTypes = intval($_POST['id_usersTypes']);
  } else {
    $formErrors['id_usersTypes'] = 'Veuillez renseigner le statut';
  }    
    
    if(count($formErrors) == 0){
        if($users->addUsers()){
                    $formSuccess = 'Votre compte a bien été créé';
                } else {
                    $formErrors['add'] = 'Votre compte n\'a pas pu être créé';
                }
        }
    }
?>