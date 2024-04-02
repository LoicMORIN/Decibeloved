<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}

function create_events($title, $description, $is_open, $is_active, $creator_id, $category_id, $space_id, $date_start, $date_end, $location, $nb_place, $banner, $artist_image) {
    global $conn;

    $title = mysqli_real_escape_string($conn, htmlspecialchars($title));
    $description = mysqli_real_escape_string($conn, htmlspecialchars($description));
    $is_open = mysqli_real_escape_string($conn, htmlspecialchars($is_open));
    $is_active = mysqli_real_escape_string($conn, htmlspecialchars($is_active));
    $creator_id = mysqli_real_escape_string($conn, htmlspecialchars($creator_id));
    $category_id = 1;
    $date_start = mysqli_real_escape_string($conn, htmlspecialchars($date_start));
    $date_end = mysqli_real_escape_string($conn, htmlspecialchars($date_end));
    $location = mysqli_real_escape_string($conn, htmlspecialchars($location));
    $nb_place = mysqli_real_escape_string($conn, htmlspecialchars($nb_place));
    $space_id = mysqli_real_escape_string($conn, htmlspecialchars($space_id));


    $nb_place = mysqli_real_escape_string($conn, htmlspecialchars($nb_place));

    $banner = $_SESSION["page1"]["banner_data"];
    $artist_image = $_SESSION["page2"]["artist_image_data"];


    $sql = "INSERT INTO events (title, description, is_open, is_active, creator_id, category_id, space_id, date_start, date_end, location, nb_place, banner, artist_image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);



    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssssssssssss", $title, $description, $is_open, $is_active, $creator_id, $category_id, $space_id, $date_start, $date_end, $location, $nb_place, $banner, $artist_image);

    if (mysqli_stmt_execute($stmt)) {
        echo "Done events";
    } else {
        die("Execute failed: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
}


function recherche_events($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM events WHERE $have = ?";
    
    $stmt = mysqli_prepare($conn, $requete_id);
    mysqli_stmt_bind_param($stmt, "s", $have_value);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $retour = mysqli_fetch_assoc($result)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_events($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM events WHERE $have=?";
    
    $stmt = mysqli_prepare($conn, $requete_id);
    mysqli_stmt_bind_param($stmt, "s", $have_value);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt) > 0;
}

function update_events($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE events SET $have=? WHERE $have=?";
    
    $stmt = mysqli_prepare($conn, $requete_id);
    mysqli_stmt_bind_param($stmt, "ss", $want, $have_value);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt) > 0;
}

?>
