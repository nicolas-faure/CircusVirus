<?php

require 'admin/model/database.php';
require 'admin/model/volunteers.php';
$volunteer = new volunteers();
if (!empty($_GET['id'])) {
  $volunteer->id = $_GET['id'];
}
$showVolunteers = $volunteer->getShowVolunteer();
?>