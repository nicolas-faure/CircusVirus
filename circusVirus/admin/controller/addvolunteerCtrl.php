<?php

require 'model/database.php';
require 'model/volunteers.php';
//regex pour vérifier le prénom
$regexFirstname = '%([\wáâàãçéêíóôõúüÁÂÀÃÇÉÊÍÓÔÕÚÜ]+\-?\'?[a-zA-Z]+)%';
//regex pour vérifier le nom
$regexPhoneNumber = '#^[0][1-9][0-9]{8}$#';
//regex pour vérifier le prénom
$regexMail = '%^ *(([\.\-\+\w]{2,}[a-z0-9])@([\.\-\w]+[a-z0-9])\.([a-z]{2,3})) *(; *(([\.\-\+\w]{2,}[a-z0-9])@([\.\-\w]+[a-z0-9])\.([a-z]{2,3})) *)* *$%';
//créé un array pour les érreurs
$formErrors = array();
if (count($_POST) > 0) {
    $memberAdd = new volunteers();
//vérifie le champ prénom avec la regex
    if (!empty($_POST['firstname'])) {
        if (preg_match($regexFirstname, $_POST['firstname'])) {
            $memberAdd->firstname = strip_tags($_POST['firstname']);
        } else {
            $formErrors['firstname'] = 'Veuillez renseigner un prénom valide';
        }
    } else {
        $formErrors['firstname'] = 'Veuillez renseigner votre prénom';
    }
//  vérifie le champ nom avec la regex
    if (!empty($_POST['lastname'])) {
        if (preg_match($regexFirstname, $_POST['lastname'])) {
            $memberAdd->lastname = strip_tags($_POST['lastname']);
        } else {
            $formErrors['lastname'] = 'Veuillez renseigner un nom de famille valide';
        }
    } else {
        $formErrors['lastname'] = 'Veuillez renseigner votre nom de famille';
    }
    //  vérifie le champ téléphone avec la regex
    if (!empty($_POST['phone'])) {
        if (preg_match($regexPhoneNumber, $_POST['phone'])) {
            $memberAdd->phone = strip_tags($_POST['phone']);
        } else {
            $formErrors['phone'] = 'Veuillez renseigner un numéro de téléphone valide';
        }
    } else {
        $formErrors['phone'] = 'Veuillez renseigner votre numéro de téléphone';
    }
//  vérifie le champ mail avec la regex
    if (!empty($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
            $memberAdd->mail = strip_tags($_POST['mail']);
        } else {
            $formErrors['mail'] = 'Veuillez renseigner un mail valide';
        }
    } else {
        $formErrors['mail'] = 'Veuillez renseigner votre mail';
    }
//  si aucune erreur ajoute les information rentré dans la table volunteers
    if (count($formErrors) == 0) {
        if ($memberAdd->addVolunteer()) {
            $formSuccess = 'Enregistrement effectué';
        } else {
            $formErrors['add'] = 'Une erreur est survenue';
        }
    }
}