<?php
    $isUser = false;
    if(empty($_GET['id'])){
        $isUser = true;
    }
    else{
        if(is_numeric($_GET['id']) && ($_GET['id'] == $_SESSION['user_id'])){
            $isUser = true;
        }
    }
?>