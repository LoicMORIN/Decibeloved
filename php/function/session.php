<?php
function start_session() {
    $timestamp = time()-180; 
    if ((session_status() == PHP_SESSION_NONE)){
        session_start();
    } elseif ($_SESSION['time'] > $timestamp) {
        $_SESSION['time'] = time();
    } else {
        destroy_session();
    }if (isset( $_SESSION['time'])!=1) {
        $_SESSION['time'] = time();
    }
}

function destroy_session() {
    session_unset();
    session_destroy();
}

function is_logged_in() {
    start_session();
    return isset($_SESSION['user_id']);
}

function connect_session($user_email) {
    start_session();
    if(is_logged_in()==FALSE){
    $_SESSION['user_id'] = recherche_users("id", "email", $user_email);
    $_SESSION['role_id'] = recherche_users("role_id", "email", $user_email);
    } 
}

function get_user_id() {
    start_session();
    return is_logged_in() ? $_SESSION['user_id'] : null;
}

function get_role_id() {
    start_session();
    return is_logged_in() ? $_SESSION['role_id'] : null;
}

?>

