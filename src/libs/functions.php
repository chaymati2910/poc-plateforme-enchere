<?php
    //Analyse validation formulaire
    function validationForm () {
  
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
                $maxSize = 1000000000000;
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
                $_POST['image_upload'] = $idName. "." . $fileExt;
                $resultat = move_uploaded_file($tmpName, $fileName);
                
                if($resultat)
                {
                    
                    // $DUMMY_ARRAY[] = $_POST;
                    $tempArray = $_SESSION['DUMMY_ARRAY'];
                    array_push($tempArray, $_POST);
                    $_SESSION['DUMMY_ARRAY'] = $tempArray;
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
    ?>


