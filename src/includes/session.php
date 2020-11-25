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
            'image_upload' => 'image2.jpg',
            'date_fin' => 1606345200,
            'etat' => 'inactif'
        ],
        [
            'id' => 2,
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 36,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.30,
            'image_upload' => 'moran-8cMPxOqkLE8-unsplash.jpg',
            'date_fin' => 1606345800,
            'etat' => 'actif'
        ],
        [
            'id' => 3,
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 48,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.20,
            'image_upload' => 'image2.jpg',
            'date_fin' => 1606345200,
            'etat' => 'actif'
        ],
        ];
}
?>