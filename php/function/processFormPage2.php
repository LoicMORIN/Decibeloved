<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["page2"]['space_name'] = $_POST["space_name"];
    $_SESSION["page2"]['nb_place'] = $_POST["nb_place"];
    $_SESSION["page2"]['lenght'] = $_POST["lenght"];
    $_SESSION["page2"]['width'] = $_POST["width"];

    
    if (isset($_FILES["map_image"]) && $_FILES["map_image"]["error"] == UPLOAD_ERR_OK) {

        $mapdata = file_get_contents($_FILES["map_image"]["tmp_name"]);

        $_SESSION["page2"]['map_image_data'] = $mapdata;

    } else {
        echo "Error uploading image.";
    }

    if (isset($_FILES["artist_image"]) && $_FILES["artist_image"]["error"] == UPLOAD_ERR_OK) {

        $artistdata = file_get_contents($_FILES["artist_image"]["tmp_name"]);

        $_SESSION["page2"]['artist_image_data'] = $artistdata;

    } else {
        echo "Error uploading image.";
    }

    header("Location: ../../creation_event_3.php");
    exit();
}

?>