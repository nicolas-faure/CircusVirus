<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
require 'controller/addvolunteerCtrl.php';
require_once 'Include/headerAdmin.php';
?>
        <!--début du formulaire pour ajouter un membre-->
        <h2 class="text-center">Ajouter un membre de l'équipe</h2>
        <div class="container formular">
            <form method="POST" action="addVolunteer.php" id="styleForm">
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <!--                        champ pour ajouter un prénom-->
                        <label for="firstname">Prénom :</label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="text" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required placeholder="Jean">
                        <!--  envoi un message d'erreur si le prénom n'est pas valide-->
                        <?php if (isset($formErrors['firstname'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['firstname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <!--                        champ pour ajouter un nom-->
                        <label for="lastname">Nom :</label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="text" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required placeholder="Bart">
                        <!--  envoi un message d'erreur si le nom n'est pas valide-->
                        <?php if (isset($formErrors['lastname'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['lastname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <!--                        champ pour ajouter un numéro de téléphone-->
                        <label for="phone">Numero de téléphone :</label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="text" name="phone" id="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" required placeholder="0668930933">
                        <!--  envoi un message d'erreur si le numéro de téléphone n'est pas valide-->
                        <?php if (isset($formErrors['phone'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['phone'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row marginTop col-12">
                    <div class="col-5 text-right">
                        <!--                        champ pour ajouter un mail-->
                        <label for="mail">Adresse Mail :</label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="text" name="mail" id="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?> " required placeholder="dupont.jean@gmail.com">
                        <!--                        envoi un message d'erreur si le mail n'est pas valide-->
                        <?php if (isset($formErrors['mail'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['mail'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row marginTop col-12 marginBot">
                    <div class=" offset-6 col-1">
                        <button type="submit" name="button">Envoyer</button>
                    </div>
                </div>
            </form>
        </div> 
        <div>
<!--            affiche un message si l'inscription est un succés-->
            <?php if (isset($formSuccess)) { ?>
                <p><?php echo $formSuccess; ?> </p>
                <a href="index.php">retour à l'accueil</a>
            <?php } ?>
        </div>
    </body>
</html>
