<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_feedbacks($note, $comment, $user_id, $event_id) {
    global $conn;

    $note = mysqli_real_escape_string($conn, htmlspecialchars($note));
    $comment = mysqli_real_escape_string($conn, htmlspecialchars($comment));
    $user_id = mysqli_real_escape_string($conn, htmlspecialchars($user_id));
    $event_id = mysqli_real_escape_string($conn, htmlspecialchars($event_id));

    $sql = "INSERT INTO feedbacks (note, comment, user_id, event_id) 
            VALUES ('$note', '$comment', '$user_id', '$event_id')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function recherche_feedbacks($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM feedbacks WHERE $have = '$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_feedbacks($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM feedbacks WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_feedbacks($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE feedbacks SET $have='$want' WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
