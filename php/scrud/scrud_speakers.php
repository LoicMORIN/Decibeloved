<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_speakers($position_id, $orientation, $type_speaker_id, $direction) {
    global $conn;

    $position_id = mysqli_real_escape_string($conn, htmlspecialchars($position_id));
    $orientation = mysqli_real_escape_string($conn, htmlspecialchars($orientation));
    $type_speaker_id = mysqli_real_escape_string($conn, htmlspecialchars($type_speaker_id));

    $sql = "INSERT INTO speakers (position_id, orientation, type_speaker_id) VALUES ('$position_id', '$orientation', '$type_speaker_id')";

    if (mysqli_query($conn, $sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function recherche_speakers($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM speakers WHERE $have = '$have_value' ";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_speakers($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM speakers WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_speakers($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE speakers SET $have='$want' WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
