<?php
    include 'connection.php';
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(!empty($_POST)){
        if(!empty($_POST['name']) && (strlen($_POST['name']) <= 255)){
            $stmt = $db->prepare('UPDATE USER SET name = :name WHERE user_id = :user_id');
            $stmt->execute(array(':name' => $_POST['name'], ':user_id' => $_SESSION['user_id']));
            $_SESSION['name'] = $_POST['name'];
        }

        if(!empty($_POST['username']) && (strlen($_POST['username']) <= 8)){
            $stmt = $db->prepare('UPDATE USER SET username = :username WHERE user_id = :user_id');
            $stmt->execute(array(':username' => $_POST['username'], ':user_id' => $_SESSION['user_id']));
            $_SESSION['username'] = $_POST['username'];
        }

        if(!empty($_POST['email']) && (strlen($_POST['email']) <= 255)){
            $stmt = $db->prepare('UPDATE USER SET email = :email WHERE user_id = :user_id');
            $stmt->execute(array(':email' => $_POST['email'], ':user_id' => $_SESSION['user_id']));
            $_SESSION['email'] = $_POST['email'];
        }

        if(!empty($_POST['psw']) && (strlen($_POST['psw']) <= 255)){
            $hash = password_hash($_POST['psw'], PASSWORD_DEFAULT);
            $stmt = $db->prepare('UPDATE USER SET password = :password WHERE user_id = :user_id');
            $stmt->execute(array(':password' => $hash, ':user_id' => $_SESSION['user_id']));
        }

        if(isset($_POST['gender']) && $_POST['gender'] != 'None'){
            $stmt = $db->prepare('UPDATE USER SET gender = :gender WHERE user_id = :user_id');
            $stmt->execute(array(':gender' => $_POST['gender'], ':user_id' => $_SESSION['user_id']));
            $_SESSION['gender'] = $_POST['gender'];
        }

        if($_SESSION['type'] == 'Admin'){
            if(isset($_POST['department']) && $_POST['department'] != 'not_assigned' && $_POST['department'] != 'none'){
                $stmt = $db->prepare('UPDATE USER SET department_id = :department_id WHERE user_id = :user_id');
                $stmt->execute(array(':department_id' => $_POST['department'], ':user_id' => $_SESSION['user_id']));

                $stmt2 = $db->prepare('SELECT name FROM DEPARTMENT WHERE department_id = :department_id');
                $stmt2->execute(array(':department_id' => $_POST['department']));
                $row = $stmt2->fetch();
                $_SESSION['department'] = $row['name'];
            }
            else if($_POST['department'] == 'not_assigned'){
                $stmt = $db->prepare('UPDATE USER SET department_id = NULL WHERE user_id = :user_id');
                $stmt->execute(array(':user_id' => $_SESSION['user_id']));
                $_SESSION['department'] = 'Not Assigned';
            }
        }

        header('Location: ../pages/profile_viewer.php?id='.$_SESSION['user_id']);
    }
    else{
        header('Location: ../pages/profile_edit.php?id='.$_SESSION['user_id']);
    }
?>