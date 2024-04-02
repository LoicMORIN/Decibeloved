<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_documents($event_id, $title, $path) {
    global $conn;

    $event_id = mysqli_real_escape_string($conn, htmlspecialchars($event_id));
    $title = mysqli_real_escape_string($conn, htmlspecialchars($title));
    $path = mysqli_real_escape_string($conn, htmlspecialchars($path));

    $sql = "INSERT INTO documents (event_id, title, path) VALUES ('$event_id', '$title', '$path')";

    if (mysqli_query($conn, $sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function recherche_documents($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM documents WHERE $have = '$have_value' ";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_documents($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM documents WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_documents($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE documents SET $have='$want' WHERE $have=$have_value";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
