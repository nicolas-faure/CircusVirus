<?php
require 'admin/model/database.php';
require 'admin/model/equipmentsleasing.php';
require 'admin/model/users.php';
 
$equipmentsLeasing = new equipmentsLeasing();
$ShowLeasingMarquee = $equipmentsLeasing->leasingMarquee();
 ?>