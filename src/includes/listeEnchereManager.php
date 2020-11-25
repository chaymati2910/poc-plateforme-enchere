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


<div class="d-flex justify-content-center">
        <h2 class="mb-5 text-uppercase font-weight-bold">Enchère Ajoutée</h2>
    </div>
<div class="d-flex justify-content-center">



<div  class=" col-9 border border-success pt-3 pb-3 mb-5 bg-light text-dark">
        <!--Boucle pour chaque items dans le tableau dans la variable session-->

                    <?php foreach($_SESSION['DUMMY_ARRAY'] as $items) :?>
                    


                    
                            <!-- id="<?= $items['id']?>"> -->
                            <!-- <?= $items['etat'] == 'actif' ? 'Actif' : 'Inactif'?>  -->
                        

                <div class="row d-flex justify-content-center p-2">

                    <div class=" col d-flex  mb-3 ">  
                            <img src="../ressources/img/<?= $items['image_upload'] ?>" style="height:80px; width:120px" alt="...">

                                <!--bouton d'activation ou de desactivation-->
                                        
                    </div>

                     <div class=" col-7 row mt-3">
                            <div class=" column col  " ><?= $items['description'] ?></div>
                            <div class="row col "><?= $items['prix_lancement'] ?> €</div>
                            <div class="row col "><?= $items['prix_clic'] ?> cts</div>
                            <div class="row col "> <?= $items['augmentation_prix'] ?> cts/clic</div> 
                    </div>

                    <div  class="ml-5 mt-3">
                                <form method="POST" enctype="multipart/form-data">
                                    <input name="indice" value="<?= $items['id']?>" style="display:none;">
                                    <button class="btn btn btn-warning p-0 " name="submit_activer">Activer</button>
                                    <button class="btn btn-warning p-0" name="submit_desactiver">Desactiver</button>
                                </form>

                                <div><p>Temps:&nbsp&nbsp<?= $items['duree'] ?>H</p></div>
                            </div>    
                    
                    </div>
                    <?php endforeach; ?>
                </div>
</div>

   


