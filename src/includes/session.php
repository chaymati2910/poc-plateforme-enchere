<?php
// Start the session
session_start();
date_default_timezone_set("Indian/Reunion");
if(!isset($_SESSION['DUMMY_ARRAY'])){
    $_SESSION['DUMMY_ARRAY'] = [
        [
            'id' => 1,
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 48,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.50,
            'image_upload' => 'None.png',
            'date_fin' => 1606345200,
            'etat' => 'inactif',
            'gain' => 0
        ],
        [
            'id' => 2,
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 36,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.30,
            'image_upload' => 'None.png',
            'date_fin' => 1606345800,
            'etat' => 'actif',
            'gain' => 0
        ],
        [
            'id' => 3,
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 48,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.20,
            'image_upload' => 'None.png',
            'date_fin' => 1606345200,
            'etat' => 'actif',
            'gain' => 0
        ],
        ];
}
?>