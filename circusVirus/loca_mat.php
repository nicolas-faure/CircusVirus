<?php
require_once 'admin/Include/header.php';
require 'admin/controller/loca_matCtrl.php'
?>
<div class="container row col-12 divLocaPage">
    <div class="row col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="carousel_right">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 imgChap" src="assets/img/equipement_2019-06-21_10-05-30.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/img/equipement_2019-06-21_10-05-39.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/img/equipement_2019-06-26_10-37-01.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précedent</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </div>
    <div class="description_chap row col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ShowLeasingEquipment as $ShowLeasingEquipment) { ?>
                        <tr>
                            <td><?= $ShowLeasingEquipment->description ?></td>
                            <td><?= $ShowLeasingEquipment->price ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <div class="description_chap row col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <button type="button" name="button">Louez de l'équipement</button>
        </div>
    </div>

</div>
</body>
</html>
