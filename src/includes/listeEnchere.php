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
          <div class="card  shadow m-lg-4" style="width: 18rem;">
                <div class="duree d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold" id="test">
                </div>
                    <img src="../ressources/img/<?= $items['image_upload'] ?>" class="card-img-top img-fluid" style="height:230px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><?= $items['description'] ?></h5>
                        <h4 class="display-6 font-weight-bold"><?= $items['prix_lancement'] ?> €</h4>
                        <p class="card-text m-0">Prix du clic : <?= $items['prix_clic'] ?> cts</p>
                        <p class="card-text mb-4">Enchère : +<?= $items['augmentation_prix'] ?> cts/clic</p>
                        <div class="text-center">
                        <form method="POST" action="#<?= $key?>">
                            <input name="indice" value="<?= $key?>" style="display:none;">
                            <button class="btn btn-primary p-0" name="submit">Enchérir</button>
                        </form>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
var sec = 10;
var duree = document.getElementsByClassName('duree');

function humanReadable() {
    var pad = function(x) {
      return (x < 10) ? "0" + x : x;
    }
    for (let i = 0; i < duree.length; i++) {
        duree[i].innerHTML = pad(parseInt(sec / 3600)) + ':' + pad(parseInt(sec / 60 % 60)) + ':' + pad(parseInt(sec % 60));
    }
    while (sec > 0) {
        sec--;
        break;
    }
    if (sec == 0) {
        duree.innerHTML = 'Terminé';
    }
    console.log(sec)
}

setInterval('humanReadable()', 1000);
</script>