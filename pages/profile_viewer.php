<?php 
    include_once('../database/checkSession.php');
    
    include '../database/compareID.php';
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Profile</title>
        <link href="../css/profile_viewer.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <a href="../pages/my_tickets.php">My Tickets</a>
                <a href="../pages/all_tickets.php">All Tickets</a>
                <a href="../pages/profile_viewer.php"><?php echo $profile ?></a>
                <div class="animation start-profile"></div>
            </nav>
        </header>
            <div class="box">
                
                <?php if($isUser){
                    echo '<p id="edit"><a href="profile_edit.php?id=' . $_SESSION['user_id'] . '">Edit</a></p>';

                    echo '<form name="change" method="post">
                    <div class="labels">
                        <label for="username">Username: <strong>' . $_SESSION['username'] . '</strong></label>
                        <br><br>

                        <label for="name">Name: <strong>' . $_SESSION['name'] . '</strong></label>
                        <br><br>

                        <label for="email">Email: <strong>' . $_SESSION['email'] . '</strong></label>
                        <br><br>

                        <label for="gender">Gender: <strong>' . $_SESSION['gender'] . '</strong></label>
                        <br><br>

                        <label for="type">Type: <strong>' . $_SESSION['type'] . '</strong></label>
                        <br><br>

                        <label for="department">Department: <strong>' . $_SESSION['department'] . '</strong></label>
                        <br><br>
                    </div>
                </form>

            
                    <form name="logout" action="../pages/logout.php" method="post">
                        <div class="buttons">
                            <button type="submit" class="logoutbtn">Logout</button>
                        </div>
                    </form>';
                } 
                else{
                    include '../database/fetchUser.php';

                    echo '<br><form name="change" method="post">
                    <div class="labels">
                        <label for="username">Username: <strong>' . $row['username'] . '</strong></label>
                        <br><br>

                        <label for="name">Name: <strong>' . $row['name'] . '</strong></label>
                        <br><br>

                        <label for="email">Email: <strong>' . $row['email'] . '</strong></label>
                        <br><br>

                        <label for="gender">Gender: <strong>' . $row['gender'] . '</strong></label>
                        <br><br>';

                    if($_SESSION['type'] == 'Admin'){
                        switch($row['type']){
                            case 'Client':
                                echo '<div class="divtype"><label for="type">Type: <strong>' . $row['type'] . '</strong></label><br>';
                                echo '<a href="../database/typeChanger.php?id=' . $_GET['id'] . '&type=Agent"> Promote </a></div>';
                                echo '<br>';
                                break;

                            case 'Agent':
                                echo '<div class="divtype"><label for="type">Type: <strong>' . $row['type'] . '</strong></label><br>';
                                echo '<a href="../database/typeChanger.php?id=' . $_GET['id'] . '&type=Admin"> Promote </a> <a href="../database/typeChanger.php?id=' . $_GET['id'] . '&type=Client"> Demote </a></div>';
                                echo '<br>';
                                break;

                            case 'Admin':
                                echo '<div class="divtype"><label for="type">Type: <strong>' . $row['type'] . '</strong></label><br>';
                                echo '<a href="../database/typeChanger.php?id=' . $_GET['id'] . '&type=Agent"> Demote </a></div>';
                                echo '<br>';    
                                break;
                            default:
                                break;
                        }
                    }    
                    else{
                        echo '<label for="type">Type: <strong>' . $row['type'] . '</strong></label> 
                        <br><br>';
                    }

                    echo '<label for="department">Department: <strong>' . $department . '</strong></label>
                        <br><br>
                    </div>
                </form>';
                }
                ?>
            </div>
    </body>
</html>