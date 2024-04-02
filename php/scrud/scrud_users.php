<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_users($email, $password, $first_name, $last_name) {
    global $conn;
    
    $email = mysqli_real_escape_string($conn, htmlspecialchars($email));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($password));
    $first_name = mysqli_real_escape_string($conn, htmlspecialchars($first_name));
    $last_name = mysqli_real_escape_string($conn, htmlspecialchars($last_name));

    $sql = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$email', '$password', '$first_name', '$last_name')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
}
    
}

function recherche_users($want, $have, $have_value) {
    global $conn;

    $requete_id = "SELECT $want FROM users WHERE $have = '$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);
    
    if ($requete_ex) {
        $result = mysqli_fetch_assoc($requete_ex);
        $retour = $result[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_users($have, $have_value) {
    global $conn;

    $requete_id = "DELETE FROM users WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);
    
    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_users($want_value, $want, $have, $have_value) {
    global $conn;

    $sql = "UPDATE users SET $want = '$want_value' WHERE $have = '$have_value'";
    $requete_ex = $conn->query($sql);

    return $requete_ex;
}
?>
