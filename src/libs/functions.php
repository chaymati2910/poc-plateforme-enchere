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
                
                $validExt = array('.jpg', '.jpeg', '.gif', '.png');
                //On verifie dans la variable $_FILES s'il n'y a pas d'erreur interne
                if($_FILES['image_upload']['error'] > 0)
                {
                    echo '<div class="alert alert-danger">Erreur survenue lors du transfert de l\'image</div>';
                    die;
                }
                $maxSize = 1000000000000;
                $fileSize = $_FILES['image_upload']['size'];
                if($fileSize > $maxSize) //Taille de l'image doit être < à $maxSize
                {
                    echo '<div class="alert alert-danger"> Le fichier est trop lourd !!</div>';
                    die;
                }
                $fileName = $_FILES['image_upload']['name']; //On récupere le nom de l'image et on recherche sone xtension puis on compare dans les extensions valides
                $fileExt = strtolower(substr(strrchr($fileName, '.'), 1));
                if(!in_array("." . $fileExt, $validExt)){
                    echo '<div class="alert alert-danger">Le fichier n\'est pas une image !!</div>';
                    die;
                }
    
                $tmpName = $_FILES['image_upload']['tmp_name']; //On attribue ici un unique id au nom de l'image puis on donne le nom pour la recherche dans le tableau
                
                //Attribuer un id à l'image
                $idName = md5(uniqid(rand(), true)); 
                $fileName = "../ressources/img/" . $idName . "." . $fileExt;
                $_POST['image_upload'] = $idName . "." . $fileExt;

                //Attribuer un id à l'itemgit 
                $idEnchere = md5(uniqid(rand(), true)); 
                $_POST['id'] = $idEnchere;
                
                //Attribution de l'etat actif ou inactif
                $_POST['etat'] = 'inactif';

                //Gestion de la date de fin => on prend la date actuelle lors de l'ajout puis on ajoute le nombre d'heures que l'utilisateur souhaite
                $timeTO = (int)$_POST['duree'];
                date_default_timezone_set("Indian/Reunion");
                $_POST['date_fin'] = mktime(date("H")+ $timeTO, date("i"), date("s"), date("m"), date("d"), date("Y"));

                //Enregistrement de l'image
                $resultat = move_uploaded_file($tmpName, $fileName);
                //Si le fichier a bien été déplacé alors on ajoute toutes les données dans le tableau
                if($resultat)
                {
                    // On prend les donnees dans un tableau temporaire puis on met dans le tableau dans la session
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

        function calculDate($date){
            date_default_timezone_set("Indian/Reunion");//On reprend le meme fuseau horaire
            $timeFin = $date; //On recupere la date de fin enregistrée
            $timeAct = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")); //On prend la date actuelle
            $timeRemaining = $timeFin - $timeAct; //On fait la difference
            //verification si termine
            if($timeRemaining <= 0){ //Si c'est à 0 alors l'enchere est terminée
                echo "TERMINE";
            }else{
                //conversion du temps restant
                $min_rest = $timeRemaining / 60;
                $heure_rest = $min_rest / 60;
                $jours_rest = $heure_rest / 24;
                $sec_rest = floor($timeRemaining % 60);
                $min_rest = floor($min_rest % 60);
                $heure_rest = floor($heure_rest % 24);
                $jours_rest = floor($jours_rest);

                echo $jours_rest . "j " . $heure_rest . "h " . $min_rest . "min " . $sec_rest . "s ";
            }
            
        }
        function conversion($seconds){
            if($seconds <= 0){ //Si c'est à 0 alors l'enchere est terminée
                echo "TERMINE";
            }else{
                //conversion du temps restant
                $min_rest = $seconds / 60;
                $heure_rest = $min_rest / 60;
                $jours_rest = $heure_rest / 24;
                $sec_rest = floor($seconds % 60);
                $min_rest = floor($min_rest % 60);
                $heure_rest = floor($heure_rest % 24);
                $jours_rest = floor($jours_rest);

                echo $jours_rest . "j " . $heure_rest . "h " . $min_rest . "min " . $sec_rest . "s ";
            }
        }
    ?>


