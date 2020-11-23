<?php
// Start the session
session_start();
if(!isset($_SESSION['DUMMY_ARRAY'])){
    $_SESSION['DUMMY_ARRAY'] = [
        [
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 48,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.30,
            'date_lancement' => 'XX',
            'image_upload' => 'image2'
        ],
        [
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 48,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.30,
            'image_upload' => 'moran-8cMPxOqkLE8-unsplash'
        ],
        [
            'description' => 'Iphone X',
            'prix_lancement' => 1,
            'duree' => 48,
            'prix_clic' => 0.50,
            'augmentation_duree' => 30,
            'augmentation_prix' => 0.30,
            'image_upload' => 'image2'
        ],
        ];
}

?>