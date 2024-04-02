<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_content($label, $number, $section_id) {
    global $conn;

    $label = mysqli_real_escape_string($conn, htmlspecialchars($label));
    $number = mysqli_real_escape_string($conn, htmlspecialchars($number));
    $section_id = mysqli_real_escape_string($conn, htmlspecialchars($section_id));

    $sql = "INSERT INTO content (label, number, section_id) VALUES ('$label', '$number', '$section_id')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function recherche_content($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM content WHERE $have = '$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_content($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM content WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_content($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE content SET $have='$want' WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
