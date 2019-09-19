<?php

require 'model/database.php';
require 'model/volunteers.php';
$regexFirstname = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$regexPhoneNumber = '#^[0][1-9][0-9]{8}$#';
$regexMail = '#^[\w._-]+@[\w.-_]+[.][a-z]+$#';
$formErrors = array();
if (!empty($_GET['id'])) {
  if (count($_POST) > 0) {
    $volunteer = new volunteers();
    $volunteer->id = $_GET['id'];
    if (!empty($_POST['lastname'])) {
      if (preg_match($regexFirstname, $_POST['lastname'])) {
        $volunteer->lastname = strip_tags($_POST['lastname']);
      } else {
        $formErrors['lastname'] = 'Veuillez renseigner un nom de famille valide';
      }
    } else {
      $formErrors['lastname'] = 'Veuillez renseigner votre nom de famille';
    }

    if (!empty($_POST['firstname'])) {
      if (preg_match($regexFirstname, $_POST['firstname'])) {
        $volunteer->firstname = strip_tags($_POST['firstname']);
      } else {
        $formErrors['firstname'] = 'Veuillez renseigner un prénom valide';
      }
    } else {
      $formErrors['firstname'] = 'Veuillez renseigner votre prénom';
    }


    if (!empty($_POST['phone'])) {
      if (preg_match($regexPhoneNumber, $_POST['phone'])) {
        $volunteer->phone = strip_tags($_POST['phone']);
      } else {
        $formErrors['phone'] = 'Veuillez renseigner un numéro de téléphone valide';
      }
    } else {
      $formErrors['phone'] = 'Veuillez renseigner votre numéro de téléphone';
    }

    if (!empty($_POST['mail'])) {
      if (preg_match($regexMail, $_POST['mail'])) {
        $volunteer->mail = strip_tags($_POST['mail']);
      } else {
        $formErrors['mail'] = 'Veuillez renseigner un mail valide';
      }
    } else {
      $formErrors['mail'] = 'Veuillez renseigner votre mail';
    }

    if (count($formErrors) == 0) {
      if ($volunteer->updateVolunteer()) {
        $formSuccess = 'Enregistrement effectué';
      } else {
        $formErrors['add'] = 'Une erreur est survenue';
      }
    }
  }
} else {
  $formErrors['id'] = 'L\'id du volontaire est introuvable';
}
?>
