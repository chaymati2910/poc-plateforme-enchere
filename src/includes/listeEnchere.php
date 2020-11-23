<?php include '/libs/functions.php'?>


<div id="articles" class="container-fluid mt-5">
    <h2 class="text-center mb-5 font-weight-bold">ARTICLES</h2>
    <div class=" d-flex justify-content-center flex-wrap">
        
        <?php foreach($_SESSION['DUMMY_ARRAY'] as $items) :?>
          <div class="card  shadow m-lg-4" style="width: 23rem;">
                <div class="duree d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold">
                        <?= $items['duree'] ?></div>
                    <img src="../ressources/img/<?= $items['image'] ?>.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><?= $items['description'] ?></h5>
                        <h4 class="display-6 font-weight-bold"><?= $items['prix_lancement'] ?> €</h4>
                        <p class="card-text m-0">Prix du clic : <?= $items['prix_clic'] ?> cts/clic</p>
                        <p class="card-text mb-4">Prix de l\'enchère : <?= $items['augmentation_prix'] ?> cts/clic</p>
                        <div class="text-center">
                            <button class="btn btn-primary p-0">Enchérir</button>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>