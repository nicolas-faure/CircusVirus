<?php

require 'model/database.php';
require 'model/equipmentsleasing.php';
require 'model/equipmentsType.php';
require 'model/equipmentsPictures.php';
require 'model/users.php';
$equipmentsLeasing = new equipmentsLeasing();
$equipmentTypes = new equipmentTypes();
$users = new users();
$equipmentsPictures = new equipmentsPictures();
$showEquipmentsTypes = $equipmentTypes->getShowEquipmentsTypes();
$showUsers = $users ->getShowUsers();
$formErrors = array();

if (isset($_POST['validEquipmentLeasing'])){
    if (!empty($_POST['equipmentName'])){
        $equipmentsLeasing->name = ($_POST['equipmentName']);
    } else {
        $formErrors['equipmentName'] = 'Veuillez renseigner un nom valide';
    }
    if (!empty($_POST['description'])){
       $equipmentsLeasing->description = ($_POST['description']);
    } else {
        $formErrors['description'] = 'Veuillez renseigner une description valide';
    }
    if (!empty($_POST['price'])){
        $equipmentsLeasing->price = ($_POST['price']);
    }else {
        $formErrors['price'] = 'Veuillez renseinger un prix valide';
    }
    if (!empty($_POST['id_equipmentsTypes'])){
        $equipmentsLeasing->id_equipmentsTypes = intval($_POST['id_equipmentsTypes']);
    }else {
        $formErrors['id_equipmentsTypes']= 'Veuillez renseigner un type d\'équipement valide';
    }
    if (!empty($_POST['id_creator'])){
        $equipmentsLeasing->id_creator = intval($_POST['id_creator']);
    }else {
        $formErrors['id_creator']= 'Veuillez renseigner un nom valide';
    }
    
    if (count($formErrors) ==0){
        if($equipmentsLeasing->addEquipments()){
            $formSuccess = 'L\'équipement à bien été ajouter';
        }else {
            $formErrors['validEquipmentLeasing'] = 'L\'équipement n\'a pu être ajouter';
        }
    }
}
if (!empty($_POST['showEquipmentLeasing'])){
        $equipmentsPictures->id_equipmentsLeasing = intval($_POST['showEquipmentLeasing']);
    }else {
        $formErrors['id_equipmentsLeasing'] = 'Veuillez selectionner un équipement';
    }
    if (!empty($_FILES['addEquipmentsPictures']) && $_FILES['addEquipmentsPictures']['error'] == 0) {
        // On stock dans $fileInfos les informations concernant le chemin du fichier.
        $fileInfos = pathinfo($_FILES['addEquipmentsPictures']['name']);
        // On crée un tableau contenant les extensions autorisées.
        $fileExtension = ['jpg','png'];
        // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
        if (in_array($fileInfos['extension'], $fileExtension)) {
            //On définit le chemin vers lequel uploader le fichier
            $path = '../assets/img/';
            //On crée une date pour différencier les fichiers
            $date = date('Y-m-d_H-i-s');
            //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
            $fileNewName = 'equipement_' . $date;
            //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
            $fileFullPath = $path . $fileNewName . '.' . $fileInfos['extension'];
            //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
            if (move_uploaded_file($_FILES['addEquipmentsPictures']['tmp_name'], $fileFullPath)) {
                //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
                chmod($fileFullPath, 0777);
//                remettre sur 664
            } else {
                $formErrors['valideAddPicturesEquipments'] = 'Votre fichier ne s\'est pas téléversé correctement';
            }
        } else {
            $formErrors['valideAddPicturesEquipments'] = 'Votre fichier n\'est pas du format attendu';
        }
    } else {
        $formErrors['valideAddPicturesEquipments'] = 'Veuillez selectionner un fichier';
    }
    if (count($formErrors) == 0) {
            if ($equipmentsPictures->addEquipmentsPictures()) {
                $formSuccess = 'Enregistrement effectué';
            } else {
                $formErrors['valideAddPicturesEquipments'] = 'Une erreur est survenue';
            }
        
} else {
    $formErrors['valideAddPicturesEquipments'] = 'L\'ID de l\'équipement est introuvable';
}
?>