<?php 
    include '../database/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>New FAQ</title>
	<link rel="stylesheet" href="../css/new_faq.css">
</head>
<body>
	<div class="header_div">
        <a id="backbtn" href="../pages/faq.php"> <- Back</a>
        <header>
            <h1>New FAQ</h1>
            <hr>
        </header>
    </div>
	<main>
		<form action="../database/create_faq.php" method = "post">
			<input type="hidden" name="csrf" value="<?=$_SESSION['csrf']; ?>">
			
			<label for="question">Question:</label>
			<input type="text" id="question" name="question" required>

			<label for="answer">Answer:</label>
			<textarea id="answer" name="answer" required></textarea>

			<div class="clearfix">
				<button type="submit" class="submitbtn">Submit</button>
			</div>
		</form>
	</main>
</body>
</html>