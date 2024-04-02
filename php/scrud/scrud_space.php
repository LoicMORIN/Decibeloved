<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}

function create_space($title, $image, $path, $length, $width) {
    global $conn;

    $title = mysqli_real_escape_string($conn, htmlspecialchars($title));
    $path = mysqli_real_escape_string($conn, htmlspecialchars($path));
    $length = mysqli_real_escape_string($conn, htmlspecialchars($length));
    $width = mysqli_real_escape_string($conn, htmlspecialchars($width));

    $image = $_SESSION['page2']["map_image_data"];

    $sql = "INSERT INTO space (title, image, path, length, width) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($conn));
    }


    mysqli_stmt_bind_param($stmt,"sssss", $title, $image, $path, $length, $width);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        echo "Done space";
        return true;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function recherche_space($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM space WHERE $have = '$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

function delete_space($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM space WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_space($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE space SET $have='$want' WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
