<?php //include 'scriptJs/timer.js'; ?>

<?php 
//Ici on gere la modification de l'état de l'enchere
if(isset($_POST['submit_activer'])){
    $id = $_POST['indice'];
    foreach($_SESSION['DUMMY_ARRAY'] as $key => $items){
        if($items['id'] == $id){
            if($items['etat'] != 'actif'){
                $items['etat'] = 'actif';
                $_SESSION['DUMMY_ARRAY'][$key]['etat'] =  $items['etat'];
                // $_SESSION['DUMMY_ARRAY'][$key]['date_fin'] = mktime(date("H")+ $timeTO, date("i"), date("s"), date("m"), date("d"), date("Y"));
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
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="align-middle text-center" scope="col">Image</th>
                    <th class="align-middle text-center" scope="col">Decription</th>
                    <th class="align-middle text-center" scope="col">Etat</th>
                    <th class="align-middle text-center" scope="col">Prix de lancement</th>
                    <th class="align-middle text-center" scope="col">Temps restant</th>
                    <th class="align-middle text-center" scope="col">Prix du clic</th>
                    <th class="align-middle text-center" scope="col">Augmentation du prix</th>
                    <th class="align-middle text-center" scope="col">Augmentation durée</th>
                    <th class="align-middle text-center" scope="col">Activer / Desactiver</th>
                </tr>
            </thead>
            <tbody>
        <!--Boucle pour chaque items dans le tableau dans la variable session-->

            <?php foreach($_SESSION['DUMMY_ARRAY'] as $items) :?>
                <tr>
                    <td id="<?= $items['id'] ?>" class="">
                        <img src="../ressources/img/<?= $items['image_upload'] ?>" alt="" class="img-thumbnail" style="max-width: 150px; border: none;">
                    </td>
                    <td class="align-middle text-center"><?= $items['description'] ?></td>
                    <td class="align-middle text-center"><?= $items['etat'] == 'actif' ? 'Actif' : 'Inactif' ?></td>
                    <td class="align-middle text-center"><?= $items['prix_lancement'] ?> €</td>
                    <td class="align-middle text-center"><?= calculDate($items['date_fin']) ?></td>
                    <td class="align-middle text-center"><?= $items['prix_clic'] ?></td>
                    <td class="align-middle text-center"><?= $items['augmentation_prix'] ?></td>
                    <td class="align-middle text-center"><?= $items['augmentation_duree'] ?></td>
                    <td class="align-middle text-center">
                        <form method="POST" enctype="multipart/form-data" action="#<?= $items['id']?>">
                            <input name="indice" value="<?= $items['id'] ?>" style="display: none;">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary btn-manager w-50
                                <?php //si l'état de l'article est 'actif', on ajoute la class 'active' au bouton
                                $classActive = "";
                                if($items['etat'] == 'actif') {
                                    $classActive = "active";
                                } else {
                                    $classActive = "";
                                }
                                echo $classActive;
                                ?>" name="">
                                    <button id="option1" class="bg-transparent border-0 text-white font-weight-bold" name="submit_activer" 
                                    <?php
                                    $attrDisabled = "";
                                    if($items['etat'] == 'actif') {
                                        $attrDisabled = "disabled";
                                    } else {
                                        $attrDisabled = "";
                                    }
                                    echo $attrDisabled;
                                    ?>>Activer</button>
                                </label>
                                <label class="btn btn-secondary btn-manager w-50
                                <?php //si l'état de l'article est 'inactif', on ajoute la class 'active' au bouton
                                $classActive = "";
                                if($items['etat'] == 'inactif') {
                                    $classActive = "active";
                                } else {
                                    $classActive = "";
                                }
                                echo $classActive;
                                ?>" name="">
                                    <button id="option2" class="bg-transparent border-0 text-white font-weight-bold pr-4" name="submit_desactiver"
                                    <?php
                                    $attrDisabled = "";
                                    if($items['etat'] == 'inactif') {
                                        $attrDisabled = "disabled";
                                    } else {
                                        $attrDisabled = "";
                                    }
                                    echo $attrDisabled;
                                    ?>>Desactiver</button>
                                </label>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>