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
		<form action="">
			<label for="subject">Subject:</label>
			<input type="text" id="subject" name="subject" required>

			<label for="department">Department:</label>
			<select id="department" name="department" required>
				<option value="accounting">Accounting</option>
				<option value="hr">Human Resources</option>
				<option value="management">Management</option>
				<option value="sales">Sales</option>
				<option value="marketing">Marketing</option>
				<option value="it_support">IT Support</option>
			</select>

			<label for="category">Category:</label>
			<input type="text" id="category" list="categories" multiple>
			<datalist id="categories">
				<option value="Hardware">
				<option value="Software">
				<option value="Network">
			</datalist>

			<label for="priority">Priority:</label>
			<select id="priority" name="priority" required>
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