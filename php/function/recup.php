<?php
    include 'config.php';
    require 'SCRUD/scrud_events.php';
    require 'session.php';
    start_session();
    $imageData = recherche_events('artist_image', 'id',1);
    $imageData = recherche_events('artist_image', 'id',1);
    $imageCaption=recherche_events('title','is_active',1);
    $imageDate=recherche_events('date_start');
    if ($imageData) {
        $image = imagecreatefromstring($imageData);
        if ($image !== false) {
            header("Content-type: image/jpeg");
            imagejpeg($image, null, 80);
        }
    }
   else{
        echo "image non trouvé";
   }
  
?>