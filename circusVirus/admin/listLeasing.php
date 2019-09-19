<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
require_once 'Include/headerAdmin.php';
require 'controller/listLeasingCtrl.php';

?>
<h2>Listes des équipements louable :</h2>
<table class="table table-striped text-center">
            <thead>
                <tr class="admin">
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Type de l'équipement</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showEquipmentLeasing as $showEquipmentLeasing) { ?>
                    <tr class="admin">
                        <td><?= $showEquipmentLeasing->name ?></td>
                        <td><?= $showEquipmentLeasing->description ?></td>
                        <td><?= $showEquipmentLeasing->price ?></td>
                        <td><?= $showEquipmentLeasing->id_equipmentsTypes ?></td>
                        <td><a href="modifyLeasing.php?id=<?php echo $showEquipmentLeasing->id ?>">-></a></td>
                        <td><a href="listLeasing.php?id=<?php echo $showEquipmentLeasing->id ?>">x</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </body>
</html>