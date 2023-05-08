<?php
    include '../database/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>User List</title>
	<link rel="stylesheet" href="../css/userlist.css">
</head>
    <body>
        <div class="header_div">
            <a class="backbtn" href="../pages/system.php"> <- Back</a>
            <header>
                <h1>Users</h1>
                <hr>
            </header>
        </div>
        <div class="box">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Gender</th>
                </tr>
                <?php
                    $stmt = $db->prepare('SELECT * FROM USER');
                    $stmt->execute();

                    while($row = $stmt->fetch()){

                        include '../database/getUserDepartment.php';

                        echo '<tr>
                        <td "><a id="username" href="../pages/profile_viewer.php?id='.$row['user_id'].'">'.$row['username'].'</a></td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$department.'</td>
                        <td>'.$row['type'].'</td>
                        <td>'.$row['gender'].'</td>
                        <td><a id="delete" href="../database/deleteUser.php?id='.$row['user_id'].'">Delete</a></td>
                        </tr>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>