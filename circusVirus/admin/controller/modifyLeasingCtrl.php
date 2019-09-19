<?php

require 'model/database.php';
require 'model/equipmentsleasing.php';
require 'model/equipmentsType.php';
require 'model/users.php';
$equipmentTypes = new equipmentTypes();
$users = new users();
$showEquipmentsTypes = $equipmentTypes->getShowEquipmentsTypes();
$showUsers = $users->getShowUsers();
$formErrors = array();
$equipmentsLeasing = new equipmentsLeasing();



if (!empty($_GET['id'])) {
  $equipmentsLeasing->id = intval($_GET['id']);
  $equipmentsLeasing->getInfoEquipements();
  if (count($_POST) > 0) {
        if (!empty($_POST['equipmentName'])) {
            if ($_POST['equipmentName']) {
                $equipmentsLeasing->name = $_POST['equipmentName'];
            } else {
                $formErrors['equipmentName'] = 'Veuillez renseigner un nom valide';
            }
        } else {
            $formErrors['equipmentName'] = 'Veuillez renseigner un nom ';
        }
        if (!empty($_POST['description'])) {
            if ($_POST['description']) {
                $equipmentsLeasing->description = $_POST['description'];
            } else {
                $formErrors['description'] = 'Veuillez renseigner une description valide';
            }
        } else {
            $formErrors['description'] = 'Veuillez renseigner une description valide';
        }
        if (!empty($_POST['price'])) {
            if ($_POST['price']) {
                $equipmentsLeasing->price = $_POST['price'];
            } else {
                $formErrors['price'] = 'Veuillez renseigner un prix valide';
            }
        } else {
            $formErrors['price'] = 'Veuillez renseigner un prix';
        }

        if (!empty($_POST['id_equipmentsTypes'])) {
            if ($_POST['id_equipmentsTypes']) {
                $equipmentsLeasing->id_equipmentsTypes = $_POST['id_equipmentsTypes'];
            } else {
                $formErrors['id_equipmentsTypes'] = 'Veuillez renseigner un type d\'équipement valide';
            }
        } else {
            $formErrors['id_equipmentsTypes'] = 'Veuillez renseigner un type d\'équipement';
        }

        if (!empty($_POST['id_creator'])) {
            if ($_POST['id_creator']) {
                $equipmentsLeasing->id_creator = $_POST['id_creator'];
            } else {
                $formErrors['id_creator'] = 'Veuillez renseigner un nom valide';
            }
        } else {
            $formErrors['id_creator'] = 'Veuillez renseigner votre nom';
        }
        if (count($formErrors) == 0) {
            if ($equipmentsLeasing->updateEquipments()) {
                $formSuccess = 'Enregistrement effectué';
            } else {
                $formErrors['valideUpdateEquipmentsLeasing'] = 'Une erreur est survenue';
            }
        }
    }
} else {
    $formErrors['id'] = 'L\'ID de l\'équipement est introuvable';
}