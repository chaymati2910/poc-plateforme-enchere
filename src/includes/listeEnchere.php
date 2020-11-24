<?php include 'libs/functions.php'; ?>
<?php //include 'scriptJs/timer.js'; ?>
<?php //header('refresh: 1'); ?>
<?php 
//Ici on gere l'ajout du prix à augmenter

    if(isset($_POST['submit'])){
        $id = $_POST['indice'];
        foreach($_SESSION['DUMMY_ARRAY'] as $key => $items){
            if($items['id'] == $id){
                $items['prix_lancement'] = $items['prix_lancement'] + $items['augmentation_prix'];
                $items['date_fin'] = $items['date_fin'] + $items['augmentation_duree'];
                $_SESSION['DUMMY_ARRAY'][$key]['prix_lancement'] =  $items['prix_lancement'];
                $_SESSION['DUMMY_ARRAY'][$key]['date_fin'] =  $items['date_fin'];
            }
        }
    }
?>
<div id="articles" class="container-fluid mt-5">
    <h2 class="text-center mb-5 font-weight-bold">ARTICLES</h2>
    <div class=" d-flex justify-content-center flex-wrap">
        <!--Boucle pour chaque items dans le tableau dans la variable session-->

        <?php foreach($_SESSION['DUMMY_ARRAY'] as $key => $items) :?>
        <?php if($items['etat'] == "actif"):?>
          <div class="card  shadow m-lg-4" style="width: 18rem;">
                <div class="duree d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold" id="<?= $items['id']?>">
                <?php calculDate($items['date_fin'])?>
                <?php 
                    // $timeAct = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    // $dataToUpdate = myTimer($items['date_fin'], $timeAct);
                    // conversion($dataToUpdate);
                ?>
                </div>
                    <img src="../ressources/img/<?= $items['image_upload'] ?>" class="card-img-top img-fluid" style="height:230px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><?= $items['description'] ?></h5>
                        <h4 class="display-6 font-weight-bold"><?= $items['prix_lancement'] ?> €</h4>
                        <p class="card-text m-0">Prix du clic : <?= $items['prix_clic'] ?> cts</p>
                        <p class="card-text mb-4">Prix de l'enchère : <?= $items['augmentation_prix'] ?> cts/clic</p>
                        <div class="text-center">
                        <form method="POST" action="#<?= $items['id']?>">
                            <input name="indice" value="<?= $items['id']?>" style="display:none;">
                            <button class="btn btn-primary p-0" name="submit">Enchérir</button>
                        </form>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
        <?php endforeach; ?>


    </div>
</div>
