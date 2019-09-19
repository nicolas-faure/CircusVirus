<?php

require 'model/database.php';
require 'model/equipmentsleasing.php';
require 'model/users.php';
$equipmentsLeasing = new equipmentsLeasing();
if (!empty($_GET['id'])) {
  $equipmentsLeasing->id = $_GET['id'];
}
$showEquipmentLeasing = $equipmentsLeasing->getShowEquipment();
if (!empty($_GET['id'])) {
  $equipmentsLeasing->id = $_GET['id'];
  $equipmentsLeasing->deleteEquipments();
}
$showEquipmentLeasing = $equipmentsLeasing->getShowEquipment();
?>