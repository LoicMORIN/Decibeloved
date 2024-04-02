<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_position($longitude, $latitude, $height, $type_position_id, $space_id) {
    global $conn;

    $longitude = mysqli_real_escape_string($conn, htmlspecialchars($longitude));
    $latitude = mysqli_real_escape_string($conn, htmlspecialchars($latitude));
    $height = mysqli_real_escape_string($conn, htmlspecialchars($height));
    $type_position_id = mysqli_real_escape_string($conn, htmlspecialchars($type_position_id));
    $space_id = mysqli_real_escape_string($conn, htmlspecialchars($space_id));

    $sql = "INSERT INTO position (longitude, latitude, height, type_position_id, space_id) 
            VALUES ('$longitude', '$latitude', '$height', '$type_position_id', '$space_id')";

    if (mysqli_query($conn, $sql)) {
        return true;
        echo "Done position";
    } else {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

function recherche_positions($want, $have, $have_value, $type_position_id = null) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    
    $requete_id = "SELECT $want FROM position WHERE $have = '$have_value'";

    if ($type_position_id !== null) {
        $type_position_id = mysqli_real_escape_string($conn, $type_position_id);
        $requete_id .= " AND type_position_id = '$type_position_id'";
    }

    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $positions = array();

        while ($row = mysqli_fetch_assoc($requete_ex)) {
            $positions[] = $row[$want];
        }

        return $positions;
    } else {
        return false;
    }
}

function delete_position($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM position WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_position($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE position SET $have='$want' WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function getPositions($typeId, $spaceId) {
    global $conn;

    $typeId = mysqli_real_escape_string($conn, $typeId);
    $spaceId = mysqli_real_escape_string($conn, $spaceId);

    $query = "SELECT longitude, latitude FROM position WHERE type_position_id = '$typeId' AND space_id = '$spaceId'";
    $result = mysqli_query($conn, $query);

    $positions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $positions[] = $row;
    }

    return $positions;
}

?>
