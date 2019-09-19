<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
require 'controller/modifyRightCtrl.php';
require_once 'Include/headerAdmin.php';
?>
        
        <h2>Modifier les droits des utilisateurs :</h2>
        
        <div class="container formular">
            <form method="POST" action="modifyRight.php" id="styleForm">
                        <div class="row col-12 marginTop">
                                <div class="col-5 text-right">
                                        <label for="member">Membre de l'association</label>
                                </div>
                        <div class="col-7 text-left">
                                <select name="id_volunteers" id="volunteer">
                                <?php
                                    foreach ($showVolunteers as $showVolunteer) {
                                ?><option value="<?= $showVolunteer->id ?>"> <?= $showVolunteer->firstname . ' ' . $showVolunteer->lastname ?></option> <?php
                                } ?>
                                </select>
                        </div>
                        </div>
                
                        <div class="row col-12 marginTop">
                                <div class="col-5 text-right">
                                        <label for="username">Nom d'utilisateur :</label>
                                </div>
                                <div class="col-7 text-left">
                                        <input type="text" name="username" id="username" class="form-control <?= isset($_POST['username']) ? (isset($formErrors['username']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['username']) ? 'value="' . $_POST['username'] . '"' : '' ?> placeholder="Thunder" />
                                                <?php if (isset($_POST['username']) && isset($formErrors['username'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['username'] ?></div>
                                                <?php } ?>
                                </div>
                        </div>
                        <div class="row col-12 marginTop">
                                <div class="col-5 text-right">
                                        <label for="password">Mot de passe</label>
                                </div>
                                <div class="col-7 text-left">
                                        <input type="password" name="password" id="password" class="form-control <?= isset($_POST['password']) ? (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['password']) ? 'value="' . $_POST['password'] . '"' : '' ?> placeholder="********" />
                                                <?php if (isset($_POST['password']) && isset($formErrors['password'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                                                <?php } ?>
                                </div>
                        </div>
                        <div class="row col-12 marginTop">
                                <div class="col-5 text-right">
                                        <label for="id_usersTypes">Position</label>
                                </div>
                        <div class="col-7 text-left">
                                <select name="id_usersTypes" id="id_usersTypes">
                                <?php
                                    foreach ($showUserstypes as $showUserstype) {
                                ?><option value="<?= $showUserstype->id ?>"> <?= $showUserstype->type ?></option> <?php
                                } ?>
                                </select>
                        </div>
                        </div>
                        <input type="submit" name="validModifyRight" value="Valider" class="btn btn-success" />
                </form>
                <div>
                     <div>
        <?php if (isset($formSuccess)) { ?>
          <p><?php echo $formSuccess; ?> </p>
        <?php } ?>
      </div>  
                </div>
        </div>

    </body>
</html>
