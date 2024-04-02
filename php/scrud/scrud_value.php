<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_values($date, $frequency, $noise_level, $sensor_id) {
    global $conn;

    $date = mysqli_real_escape_string($conn, htmlspecialchars($date));
    $frequency = mysqli_real_escape_string($conn, htmlspecialchars($frequency));
    $noise_level = mysqli_real_escape_string($conn, htmlspecialchars($noise_level));
    $sensor_id = mysqli_real_escape_string($conn, htmlspecialchars($sensor_id));

    $sql = "INSERT INTO `value` (date, frequency, noise_level, sensor_id) VALUES ('$date', '$frequency', '$noise_level', '$sensor_id')";

    if (mysqli_query($conn, $sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function recherche_values($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM `value` WHERE $have = '$have_value' ";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_values($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM `value` WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_values($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE `value` SET $have='$want' WHERE $have=$have_value";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
