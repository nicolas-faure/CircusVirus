<?php

require 'model/database.php';
require 'model/volunteers.php';
require 'model/users.php';
$volunteer = new volunteers();
$users = new users();
if (!empty($_GET['id'])) {
  $volunteer->id = $_GET['id'];
  $volunteer->deleteVolunteer();
}
$showVolunteers = $volunteer->getShowVolunteer();
if (!empty($_GET['id'])) {
  $users->id = $_GET['id'];
  $users->deleteUsers();
}
$showVolunteers = $volunteer->getShowVolunteer();
?>