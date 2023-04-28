<?php
    $isUser = false;
    if(empty($_GET['id'])){
        $isUser = true;
    }
    else{
        if($_GET['id'] == $_SESSION['user_id']){
            $isUser = true;
        }
    }
?>