<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
require 'controller/modifyLeasingCtrl.php';
require_once 'Include/headerAdmin.php';
?>

<h2>Modifier les information des équipements :</h2>
        <div class="container formular">
            <form method="POST" action="modifyLeasing.php?id=<?= $_GET['id'] ?>" id="styleForm">
<?php
if (!empty($_GET['id'])) {
    if (count($_POST) == 0 || count($formErrors) > 0) {
        if (isset($formErrors['valideUpdateEquipmentsLeasing'])) {
            echo $formErrors['valideUpdateEquipmentsLeasing'];
        }
        ?>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <label for="equipmentName">Nom de l'équipement à ajouter :</label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="text" name="equipmentName" id="equipmentName" class="form-control <?= isset($_POST['equipmentName']) ? (isset($formErrors['equipmentName']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['equipmentName']) ? '' . $_POST['equipmentName'] . '"' : '' ?> value="" />
                        <?php if (isset($_POST['equipmentName']) && isset($formErrors['equipmentName'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['equipmentName'] ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <label for="description">Description de l'équipement à ajouter :</label>
                    </div>
                    <div class="col-7 text-left">
                        <textarea name="description" rows="10" cols="30" id="description" class="form-control <?= isset($_POST['description']) ? (isset($formErrors['description']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['description']) ? 'value="' . $_POST['description'] . '"' : '' ?> placeholder="Description de l'équipement"></textarea>
                        <?php if (isset($_POST['description']) && isset($formErrors['description'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['description'] ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <label for="name">Prix : </label>
                    </div>
                    <div class="col-7 text-left">
                        <input type="text" name="price" id="price" class="form-control <?= isset($_POST['price']) ? (isset($formErrors['price']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['price']) ? 'value="' . $_POST['price'] . '"' : '' ?> placeholder="équipement" />
                        <?php if (isset($_POST['price']) && isset($formErrors['price'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['price'] ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <label for="id_equipmentsTypes">Type de l'équipement :</label>
                    </div>
                    <div class="col-7 text-left">
                        <select name="id_equipmentsTypes" id="id_equipmentsTypes">
                            <?php
                            foreach ($showEquipmentsTypes as $showEquipmentsTypes) {
                                ?><option value="<?= $showEquipmentsTypes->id ?>"> <?= $showEquipmentsTypes->type ?></option> <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row col-12 marginTop">
                    <div class="col-5 text-right">
                        <label for="id_creator">Nom de la personne ajoutant l'équipement :</label>
                    </div>
                    <div class="col-7 text-left">
                        <select name="id_creator" id="id_creator">
                            <?php
                            foreach ($showUsers as $showUsers) {
                                ?><option value="<?= $showUsers->id ?>"> <?= $showUsers->username ?></option> <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="submit" name="updateEquipments" value="Valider" class="btn btn-success" />
            </form>
        </div>
    <?php } else { ?>
        <div >
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