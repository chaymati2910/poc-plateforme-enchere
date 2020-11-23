<?php
    //Analyse validation formulaire
    var_dump($_SESSION);
    

    function validationForm () {
        global $DUMMY_ARRAY;
        $inputsRequired = ["description", "prix_lancement", "duree", "prix_clic", "augmentation_duree", "augmentation_prix"];
        foreach($inputsRequired as $input){
            if($_POST["$input"] == ""){
                $validationForms = false;
            }else{
                $validationForms = true;
                
            }
        };
        
        if($validationForms === false){
            echo '
                <div class="col-6 d-flex justify-content-center>    
            <div class="alert alert-danger">Veuillez remplir tous les champs demandés!</div></div>';
            
        }else{

            //Contrôle de l'image
            $fileName = $_FILES['image_upload']['name'];
            if($fileName !== ""){
                $maxSize = 100000;
                $validExt = array('.jpg', '.jpeg', '.gif', '.png');
    
                if($_FILES['image_upload']['error'] > 0)
                {
                    echo '<div class="alert alert-danger">Erreur survenue lors du transfert de l\'image</div>';
                    die;
                }
    
                $fileSize = $_FILES['image_upload']['size'];
                if($fileSize > $maxSize) //Taille de l'image doit être < à 50000
                {
                    echo '<div class="alert alert-danger"> Le fichier est trop lourd !!</div>';
                    die;
                }
                $fileName = $_FILES['image_upload']['name'];
                $fileExt = strtolower(substr(strrchr($fileName, '.'), 1));
                if(!in_array("." . $fileExt, $validExt)){
                    echo '<div class="alert alert-danger">Le fichier n\'est pas une image !!</div>';
                    die;
                }
    
                $tmpName = $_FILES['image_upload']['tmp_name'];
                $idName = md5(uniqid(rand(), true));
                $fileName = "../ressources/img/" . $idName . "." . $fileExt;
                $resultat = move_uploaded_file($tmpName, $fileName);
                
                if($resultat)
                {
                    
                    // $DUMMY_ARRAY[] = $_POST;
                    print_r($_SESSION['DUMMY_ARRAY']);
                    array_push($_SESSION['DUMMY_ARRAY'], $_POST);
                  
                    echo '<div class="col-12 d-flex justify-content-center">
                            <div class="alert alert-success">Le produit a bien été ajouté !
                            </div>
                            </div>';
                            
                }
            }else{
                //Dire ici que l'on prend l'image no image
            }
            
        }
        };   
        
        function listeEnchere(){


            // foreach($DUMMY_ARRAY as $item){
            //     echo '
            //     <div class="card  shadow m-lg-4" style="width: 23rem;">
            //     <div class="duree d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold">
            //             00 : 00 : 00</div>
            //         <img src="../ressources/img/moran-8cMPxOqkLE8-unsplash.jpg" class="card-img-top" alt="...">
            //         <div class="card-body">
            //             <h5 class="card-title font-weight-bold"></h5>
            //             <h4 class="display-6 font-weight-bold">3 €</h4>
            //             <p class="card-text m-0">Prix du clic : 50 cts/clic</p>
            //             <p class="card-text mb-4">Prix de l\'enchère : 1 cts/clic</p>
            //             <div class="text-center">
            //                 <button class="btn btn-primary p-0">Enchérir</button>
            //             </div>
            //         </div>
            //     </div>
            //     ';
            // }
            
        }
    ?>


