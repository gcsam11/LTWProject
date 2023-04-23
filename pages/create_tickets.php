<?php 
    include_once('../database/checkSession.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>Create Ticket</title>
	<link rel="stylesheet" href="../css/create_tickets.css">
</head>
<body>
	<header>
		<h1>Create a new Ticket</h1>
		<hr>
	</header>
	<main>
		<form action="../database/new_ticket.php" method = "post">
			<label for="subject">Subject:</label>
			<input type="text" id="subject" name="subject" required>

			<label for="department">Department:</label>
			<select id="department" name="department">
				<option value="0">---</option>
				<option value="1">Accounting</option>
				<option value="2">Human Resources</option>
				<option value="3">Management</option>
				<option value="4">Sales</option>
				<option value="5">Marketing</option>
				<option value="6">IT Support</option>
			</select>

			<label for="priority">Priority:</label>
			<select id="priority" name="priority">
				<option value="none">---</option>
				<option value="low">Low</option>
				<option value="medium">Medium</option>
				<option value="high">High</option>
			</select>

			<label for="description">Description:</label>
			<textarea id="description" name="description" required></textarea>

			<div class="clearfix">
				<button type="submit" class="submitbtn">Submit</button>
			</div>
		</form>
	</main>
</body>
</html>