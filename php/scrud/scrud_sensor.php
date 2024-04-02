<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_sensor($serial_number, $position_id) {
    global $conn;

    $serial_number = mysqli_real_escape_string($conn, htmlspecialchars($serial_number));
    $position_id = mysqli_real_escape_string($conn, htmlspecialchars($position_id));

    $sql = "INSERT INTO sensor (serial_number, position_id) VALUES ('$serial_number', '$position_id')";

    if (mysqli_query($conn, $sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function recherche_sensor($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM sensor WHERE $have = '$have_value' ";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_sensor($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM sensor WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_sensor($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE sensor SET $have='$want' WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
