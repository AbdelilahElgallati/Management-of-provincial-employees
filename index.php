<?php
    session_start();
    if(count($_SESSION)>0)
        header("Location: ./page_principale.php");
    else{
        header("Location: ./login.php");
    }
?>