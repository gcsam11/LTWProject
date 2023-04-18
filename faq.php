<?php
    include_once('database/checkSession.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Honour&display=swap" rel="stylesheet">
	<title>FAQ's</title>
	<link rel="stylesheet" href="faq.css">
</head>
<body>
    <header>
		<nav>
			<a href="my_tickets.php">My Tickets</a>
			<a href="all_tickets.php">All Tickets</a>
			<a href="profile.php"><?php echo $profile ?></a>
			<div class="animation start-my_tickets"></div>
		</nav>
    </header>

    <div class="faqs">
        <h2>Frequently Asked Questions</h2>

        <div class="faqcode">
            <!-- php code for faq table here (separate 2 loops for titles and answers) -->
        </div>
    </div>
</body>
</html>
