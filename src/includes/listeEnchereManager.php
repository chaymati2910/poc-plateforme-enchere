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
                    <th class="pl-5" scope="col">Image</th>
                    <th scope="col">Decription</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Prix</th>
                    <th class="text-center" scope="col">Activer / Desactiver</th>
                </tr>
            </thead>
            <tbody>
        <!--Boucle pour chaque items dans le tableau dans la variable session-->

            <?php foreach($_SESSION['DUMMY_ARRAY'] as $items) :?>
                <tr>
                    <td class="w-25">
                        <img src="../ressources/img/<?= $items['image_upload'] ?>" alt="" class="img-thumbnail" style="max-width: 200px; border: none;">
                    </td>
                    <td class="align-middle"><?= $items['description'] ?></td>
                    <td class="align-middle"><?= $items['etat'] == 'actif' ? 'Actif' : 'Inactif' ?></td>
                    <td class="align-middle"><?= $items['prix_lancement'] ?> €</td>
                    <td class="w-25 align-middle">
                        <form method="POST" enctype="multipart/form-data">
                            <input name="indice" value="<?= $items['id'] ?>" style="display: none;">
                            <button class="btn btn-primary p-0" name="submit_activer">Activer</button>
                            <button class="btn btn-primary p-0" name="submit_desactiver">Desactiver</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>