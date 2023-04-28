<?php 
    include 'connection.php';
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location:../index.php');
    }


    $userid=$_SESSION['user_id'];
    include 'fetchUser.php';
    
    if($row['user_id'] != $_SESSION['user_id']){$_SESSION['user_id'] = $row['user_id'];}
    if($row['username'] != $_SESSION['username']){$_SESSION['username'] = $row['username'];}
    if($row['name'] != $_SESSION['name']){$_SESSION['name'] = $row['name'];}
    if($row['email'] != $_SESSION['email']){$_SESSION['email'] = $row['email'];}
    if($row['gender'] != $_SESSION['gender']){$_SESSION['gender'] = $row['gender'];}
    if($row['type'] != $_SESSION['type']){$_SESSION['type'] = $row['type'];}
    if($department != $_SESSION['department']){$_SESSION['department'] = $department;}
    $profile = $_SESSION['username'];
?>
