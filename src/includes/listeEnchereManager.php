<?php //include 'scriptJs/timer.js'; ?>
<?php //header('refresh: 1'); <?php
//     $prefix = (PHP_SHLIB_SUFFIX === 'dll') ? 'php_' : '';
//     dl($prefix . 'ev.' . PHP_SHLIB_SUFFIX);
// print_r(get_loaded_extensions());
?>
<?php 

//Ici on gere la modification de l'état de l'enchere
// $query_age = (isset($_POST['submit_activer']) ? $_POST['submit_activer'] : null);
// var_dump($query_age);

if(isset($_POST['submit_activer'])){
    $id = $_POST['indice'];
    foreach($_SESSION['DUMMY_ARRAY'] as $key => $items){
        if($items['id'] == $id){
            if($items['etat'] != 'actif'){
                $items['etat'] = 'actif';
                $_SESSION['DUMMY_ARRAY'][$key]['etat'] =  $items['etat'];
                $_SESSION['DUMMY_ARRAY'][$key]['date_fin'] = mktime(date("H")+ $timeTO, date("i"), date("s"), date("m"), date("d"), date("Y"));
            }
        }
    }
}
if(isset($_POST['submit_desactiver'])){
    $id = $_POST['indice'];
    foreach($_SESSION['DUMMY_ARRAY'] as $key => $items){
        if($items['id'] == $id){
            if($items['etat'] != 'inactif'){
                $items['etat'] = 'inactif';
                $_SESSION['DUMMY_ARRAY'][$key]['etat'] =  $items['etat'];
            }
        }
    }
}
?>
<div id="articles" class="container-fluid mt-5">
    <h2 class="text-center mb-5 font-weight-bold">ARTICLES AJOUTES</h2>
    <div class=" d-flex justify-content-center flex-wrap">
        <!--Boucle pour chaque items dans le tableau dans la variable session-->

        <?php foreach($_SESSION['DUMMY_ARRAY'] as $items) :?>
        <div class="card  shadow m-lg-4" style="width: 18rem;">
            <div class="duree d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold"
                id="<?= $items['id']?>">
                <?php calculDate($items['date_fin'])?>
            </div>
            <img src="../ressources/img/<?= $items['image_upload'] ?>" class="card-img-top img-fluid"
                style="height:230px;" alt="...">
            <div class="card-body">

                <h5 class="card-title font-weight-bold"><?= $items['description'] ?></h5>
                <h4 class="display-6 font-weight-bold"><?= $items['prix_lancement'] ?> €</h4>
                <p class="card-text m-0">Prix du clic : <?= $items['prix_clic'] ?> cts</p>
                <p class="card-text mb-4">Prix de l'enchère : <?= $items['augmentation_prix'] ?> cts/clic</p>
                <div class="text-center mb-4">

                    <form method="POST" enctype="multipart/form-data">
                        <input name="indice" value="<?= $items['id']?>" style="display:none;">
                        <button class="btn btn-primary p-0 mb-4" name="submit_activer">Activer</button>
                        <button class="btn btn-primary p-0" name="submit_desactiver">Desactiver</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


    </div>
</div>