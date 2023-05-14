<?php
    include '../database/checkSession.php';

    if(empty($_GET['id']) || !is_numeric($_GET['id'])){
        header('Location:../pages/my_tickets.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>Changes History</title>
	<link rel="stylesheet" href="../css/changes_list.css">
</head>
    <body>
        <div class="header_div">
            <a class="backbtn" href="../pages/ticket.php?id=<?php echo $_GET['id'];?>"> <- Back</a>
            <header>
                <h1>Changes List</h1>
                <hr>
            </header>
        </div>
        <div class="box">
            <table>
                <tr>
                    <th>User</th>
                    <th>Type</th>
                    <th>Date</th>
                </tr>
                <?php
                    $stmt = $db->prepare('SELECT * FROM TICKET_CHANGES WHERE ticket_id = :ticket_id ORDER BY date');
                    $stmt->bindParam(':ticket_id', $_GET['id']);
                    $stmt->execute();

                    while($row12 = $stmt -> fetch()){
                        $stmt2 = $db->prepare('SELECT * FROM USER WHERE user_id = :user_id');
                        $stmt2->bindParam(':user_id', $row12['user_id']);
                        $stmt2->execute();
                        $row20 = $stmt2->fetch();

                        echo '<tr>
                        <td><a id="username" href="../pages/profile_viewer.php?id='.$row20['user_id'].'">'.$row20['username'].'</a></td>
                        <td id="type">'.$row12['type'].'</td>
                        <td id="date">'.$row12['date'].'</td>
                        </tr>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>