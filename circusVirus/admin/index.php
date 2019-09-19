<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
require_once 'Include/headerAdmin.php';
?>

        <h2>Bienvenue sur la partie administrative de Circus Virus</h2>

    </body>
</html>