<?php 
    require 'scrud_chat_content.php';
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $content=$_POST['message'];
        $chat_id=$_POST['chat_id'];
        $autor_id=$_SESSION['user_id'];

        create_chat_content($content,$chat_id,$autor_id,$conn);

        header('location: chat.php');
        exit;
    }
    ?>