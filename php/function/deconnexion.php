<?php

require 'session.php';
$file_relative = '../scrud/scrud_users.php';
$file_non_relative = 'php/scrud/scrud_users.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}

if (isset($_GET['fonction']) && $_GET['fonction'] ==  'deco'){
    destroy_session();
    header("Location: ../../page_connexion.php");
    exit;
} elseif (isset($_GET['fonction']) && $_GET['fonction'] ==  'sup'){
    delete_users("id",get_user_id());
    header("Location: ../../page_inscription.php");
    exit; 
}

?>
