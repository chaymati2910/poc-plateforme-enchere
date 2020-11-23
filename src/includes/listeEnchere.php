<?php include 'libs/functions.php'; ?>
<?php 
//Ici on gere l'ajout du prix à augmenter
    if(isset($_POST['submit'])){
        $id = $_POST['indice'];
        $_SESSION['DUMMY_ARRAY'][$id]['prix_lancement'] = $_SESSION['DUMMY_ARRAY'][$id]['prix_lancement'] + $_SESSION['DUMMY_ARRAY'][$id]['augmentation_prix'];
    }
?>
<div id="articles" class="container-fluid mt-5">
    <h2 class="text-center mb-5 font-weight-bold">ARTICLES</h2>
    <div class=" d-flex justify-content-center flex-wrap">
        
        <?php foreach($_SESSION['DUMMY_ARRAY'] as $key => $items) :?>
          <div class="card  shadow m-lg-4" style="width: 23rem;">
                <div class="duree d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold">
                        <?= $items['duree'] ?></div>
                    <img src="../ressources/img/<?= $items['image_upload'] ?>.jpg" class="card-img-top" style="width:460px;height:330px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><?= $items['description'] ?></h5>
                        <h4 class="display-6 font-weight-bold"><?= $items['prix_lancement'] ?> €</h4>
                        <p class="card-text m-0">Prix du clic : <?= $items['prix_clic'] ?> cts/clic</p>
                        
                        <p class="card-text mb-4">Prix de l\'enchère : <?= $items['augmentation_prix'] ?> cts/clic</p>
                        <div class="text-center">
                        <form method="POST">
                            <input name="indice" value="<?= $key?>" style="display:none;">
                            <button class="btn btn-primary p-0" name="submit">Enchérir</button>
                        </form>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>