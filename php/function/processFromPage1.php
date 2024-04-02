
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["page1"]['title'] = $_POST["title"];
    $_SESSION["page1"]['description'] = $_POST["description"];
    $_SESSION["page1"]['date_start'] = $_POST["date_start"];
    $_SESSION["page1"]['date_end'] = $_POST["date_end"];
    $_SESSION["page1"]['location'] = $_POST["location"];
    $_SESSION["page1"]['is_open'] = isset($_POST["is_open"]) ? 1 : 0;
    $_SESSION["page1"]['is_active'] = isset($_POST["is_active"]) ? 1 : 0;

    if (isset($_FILES["banner"]) && $_FILES["banner"]["error"] == UPLOAD_ERR_OK) {

        $imageData = file_get_contents($_FILES["banner"]["tmp_name"]);

        $_SESSION["page1"]["banner_data"] = $imageData;

    } else {
        echo "Error uploading image.";
    }
    
    header("Location: ../../creation_event_2.php");
    exit();
}
?>