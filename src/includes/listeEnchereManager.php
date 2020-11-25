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
    <div class=" d-flex justify-content-center flex-wrap">
        <!--Boucle pour chaque items dans le tableau dans la variable session-->


 <div class=" container-fluid table-responsive-lg">
    <table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">Etat</th>
      <th scope="col">Description</th>
      <th scope="col-2">Image upload</th>
      <th scope="col">Prix de départ</th>
      <th scope="col">Prix du clic</th>
      <th scope="col">Prix de l'enchère/clic</th>
      <th scope="col">Durée</th>
      <th scope="col">Activation</th>
    </tr>
  </thead>
  
  <tbody>
  <?php foreach($_SESSION['DUMMY_ARRAY'] as $items) :?>
    <tr  id="<?= $items['id']?>">
      <td scope="col"><?= $items['etat'] == 'actif' ? 'Actif' : 'Inactif'?></td>
      <td scope="col"><?= $items['description'] ?></td>
      <td scope="col"><?= "../ressources/img/". $items['image_upload'] ?></td>
      <td scope="col"><?= $items['prix_lancement'] ?> €</td>
      <td scope="col"><?= $items['prix_clic'] ?> cts</td>
      <td scope="col"><?= $items['augmentation_prix'] ?> cts/clic</td>
      <td scope="col"><?= $items['duree'] ?>h</td>
      <td scope="col"><form method="POST" action="#<?= $items['id']?>"  enctype="multipart/form-data" class="d-flex">
                        <input name="indice" value="<?= $items['id']?>" style="display:none;">
                        <button class="btn btn-primary p-0 mr-1" name="submit_activer" style="width:100px;">ON</button>
                        <button class="btn btn-primary p-0 ml-1" name="submit_desactiver" style="width:100px;">OFF</button>
                    </form></td>
    </tr>
    <?php endforeach; ?>
    <tfoot>
    <th scope="col">Etat</th>
      <th scope="col">Description</th>
      <th scope="col-2">Image upload</th>
      <th scope="col">Prix de départ</th>
      <th scope="col">Prix du clic</th>
      <th scope="col">Prix de l'enchère/clic</th>
      <th scope="col">Durée</th>
      <th scope="col">Activation</th>
    </tr>
    
    </tfoot>

    
  </tbody>
</table>
</div>
