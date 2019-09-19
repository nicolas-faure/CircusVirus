<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
require 'controller/listMemberCtrl.php';
require_once 'Include/headerAdmin.php';
?>

        <h2>Listes des membres de l'association :</h2>
        <table class="table table-striped text-center">
            <thead>
                <tr class="admin">
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showVolunteers as $showVolunteer) { ?>
                    <tr class="admin">
                        <td><?= $showVolunteer->lastname ?></td>
                        <td><?= $showVolunteer->firstname ?></td>
                        <td><?= $showVolunteer->phone ?></td>
                        <td><?= $showVolunteer->mail ?></td>
                        <td><a href="modifyMember.php?id=<?php echo $showVolunteer->id ?>">-></a></td>
                        <td><a href="listMember.php?id=<?php echo $showVolunteer->id ?>" onclick="return confirm('supprimer le membre ?')">x</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
