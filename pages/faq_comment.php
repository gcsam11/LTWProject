<?php
    include '../database/checkSession.php';

    if(!is_numeric($_GET['id'])){
        header('Location:../pages/my_tickets.php');
    }

    $ticketid = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>FAQ Answer</title>
	<link rel="stylesheet" href="../css/faqanswer.css">
</head>
    <body>
        <div class="header_div">
            <a class="backbtn" href="../pages/ticket.php?id=<?= $ticketid ?>"> <- Back</a>
            <header>
                <h1>FAQ's</h1>
                <hr>
            </header>
        </div>
        <div class="box">
            <form action="../database/insertFAQComment.php?id=<?=$ticketid?>" method="post">
                <select name="faq">
                    <?php
                        include '../database/fetchFAQComments.php';
                    ?>
                </select>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>