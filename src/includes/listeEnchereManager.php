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
                    <td class="">
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
                            <input name="indice" id="<?= $items['id'] ?>" value="<?= $items['id'] ?>" style="display: none;">
                            <button class="btn btn-primary p-0 mb-2 mt-0" name="submit_activer">Activer</button>
                            <button class="btn btn-primary p-0 mt-0" name="submit_desactiver">Desactiver</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>