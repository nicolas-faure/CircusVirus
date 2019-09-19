<?php
require_once 'admin/Include/header.php';
require 'admin/controller/contactCtrl.php';
?>
<h2>Liste des contacts :</h2>
<div class="row col-12 divContactPage">
<table class="table table-striped text-center">
            <thead>
                <tr >
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showVolunteers as $showVolunteer) { ?>
                    <tr>
                        <td><?= $showVolunteer->lastname ?></td>
                        <td><?= $showVolunteer->firstname ?></td>
                        <td><?= $showVolunteer->phone ?></td>
                        <td><?= $showVolunteer->mail ?></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
</div>
</body>
</html>


