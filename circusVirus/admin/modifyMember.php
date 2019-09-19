<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
require 'controller/modifyMemberCtrl.php';
require_once 'Include/headerAdmin.php';
?>
        <h2>Vous pouvez içi modifier les informations des membres</h2>
        <?php
        if (!empty($_GET['id'])) {
            if (count($_POST) == 0 || count($formErrors) > 0) {
                if (isset($formErrors['add'])) {
                    echo $formErrors['add'];
                }
                ?>
                <form method="POST" action="modifyMember.php?id=<?= $_GET['id'] ?>" id="styleForm">
                    <div class="container">

                        <div class="row col-12 marginTop">
                            <div class="col-5 text-right">
                                <label for="lastname">Nom</label>
                                <sup>*</sup>
                            </div>
                            <div class="col-7 text-left">
                                <input type="text" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required placeholder="Dupont">
                                <?php if (isset($formErrors['lastname'])) { ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['lastname'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row col-12 marginTop">
                            <div class="col-5 text-right">
                                <label for="firstname">Prénom</label>
                                <sup>*</sup>
                            </div>
                            <div class="col-7 text-left">
                                <input type="text" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required placeholder="Jean">
                                <?php if (isset($formErrors['firstname'])) { ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['firstname'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="row col-12 marginTop">
                            <div class="col-5 text-right">
                                <label for="phone">Numero de téléphone</label>
                                <sup>*</sup>
                            </div>
                            <div class="col-7 text-left">
                                <input type="text" name="phone" id="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" required placeholder="0668930933">
                                <?php if (isset($formErrors['phone'])) { ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['phone'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="row marginTop col-12">
                            <div class="col-5 text-right">
                                <label for="mail">Adresse Mail</label>
                                <sup>*</sup>
                            </div>
                            <div class="col-7 text-left">
                                <input type="text" name="mail" id="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" required placeholder="dupont.jean@gmail.com">
                                <?php if (isset($formErrors['mail'])) { ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['mail'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row marginTop col-12 marginBot">
                            <div class="offset-6 col-1">
                                <button type="submit" name="button">Envoyer</button>
                            </div>
                        </div>

                    </div>
                    
                </form>
            <?php } else { ?>
                <div class="">
                    <?php if (isset($formSuccess)) { ?>
                        <p><?php echo $formSuccess; ?> </p>            
                    <?php } ?>
                </div>
                <?php
            }
        } else {
            echo $formErrors['id'];
        }
        ?>
    </body>
</html>
