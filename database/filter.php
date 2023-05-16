<?php
    include 'connection.php';
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    $results = array();
    file_put_contents('../json/filter_content.json', json_encode($results));
    $_SESSION['filter'] = true;

    $query = 'SELECT * FROM TICKET';

    if(!empty($_POST['hashtag']) && (strlen($_POST['hashtag']) <= 255)){
        $query = $query . " WHERE HASHTAG = '" . $_POST['hashtag'] . "'";
    }

    if($_POST['department'] != 'none'){
        if(!empty($_POST['hashtag'])){
            $query = $query . " AND DEPARTMENT_ID = '" . $_POST['department'] . "'";
        }
        else{
            $query = $query . " WHERE DEPARTMENT_ID = '" . $_POST['department'] . "'";
        }
    }
    if($_POST['agent'] != 'none'){
        if(!empty($_POST['hashtag']) || $_POST['department'] != 'none'){
            $query = $query . " AND ASSIGNED_AGENT = '" . $_POST['agent'] . "'";
        }
        else{
            $query = $query . " WHERE ASSIGNED_AGENT = '" . $_POST['agent'] . "'";
        }
    }
    if($_POST['status'] != 'none'){
        if(!empty($_POST['hashtag']) || $_POST['department'] != 'none'){
            $query = $query . " AND STATUS = '" . $_POST['status'] . "'";
        }
        else{
            $query = $query . " WHERE STATUS = '" . $_POST['status'] . "'";
        }
    }
    if($_POST['priority'] != 'none'){
        if(!empty($_POST['hashtag']) || $_POST['department'] != 'none' || $_POST['status'] != 'none'){
            $query = $query . " AND PRIORITY = '" . $_POST['priority'] . "'";
        }
        else{
            $query = $query . " WHERE PRIORITY = '" . $_POST['priority'] . "'";
        }
    }
    if($_POST['site'] == 'my_tickets'){
        if(!empty($_POST['hashtag']) || $_POST['department'] != 'none' || $_POST['status'] != 'none' || $_POST['priority'] != 'none' || $_POST['agent'] != 'none'){
            $query = $query . " AND USER_ID = '" . $_SESSION['user_id'] . "'";
        }
        else{
            $query = $query . " WHERE USER_ID = '" . $_SESSION['user_id'] . "'";
        }
    }
    if($_POST['date'] != 'none'){
        if($_POST['date'] == 'newest'){
            $query = $query . " ORDER BY date DESC";
        }
        else{
            $query = $query . " ORDER BY date";
        }
    }

    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();

    if(!empty($results)){
        file_put_contents('../json/filter_content.json', json_encode($results));
    }
    else{
        $_SESSION['filter'] = false;
    }

    if($_POST['site'] == 'all_tickets'){
        header('Location:../pages/all_tickets.php');
    }
    else if($_POST['site'] == 'my_tickets'){
        header('Location:../pages/my_tickets.php');
    }
?>