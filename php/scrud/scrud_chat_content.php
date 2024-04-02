<?php
$file_relative = '../config.php';
$file_non_relative = 'php/config.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
function create_chat_content($content, $chat_id, $autor_id) {
    global $conn;

    $content = mysqli_real_escape_string($conn, htmlspecialchars($content));
    $chat_id = mysqli_real_escape_string($conn, htmlspecialchars($chat_id));
    $autor_id = mysqli_real_escape_string($conn, htmlspecialchars($autor_id));

    $sql = "INSERT INTO chat_content (content, chat_id, user_id, autor_id) 
            VALUES ('$content', '$chat_id', '$autor_id')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function recherche_chat_content($want, $have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "SELECT $want FROM chat_content WHERE $have = '$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        $retour = mysqli_fetch_assoc($requete_ex)[$want];
        return $retour;
    } else {
        return false;
    }
}

function delete_chat_content($have, $have_value) {
    global $conn;

    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "DELETE FROM chat_content WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}

function update_chat_content($want, $have, $have_value) {
    global $conn;

    $want = mysqli_real_escape_string($conn, $want);
    $have_value = mysqli_real_escape_string($conn, $have_value);
    $requete_id = "UPDATE chat_content SET $have='$want' WHERE $have='$have_value'";
    $requete_ex = mysqli_query($conn, $requete_id);

    if ($requete_ex) {
        return true;
    } else {
        return false;
    }
}
?>
