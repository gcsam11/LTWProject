<?php 
    include '../database/checkSession.php';
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
	<div class="header_div">
        <a id="backbtn" href="../pages/my_tickets.php"> <- Back</a>
        <header>
            <h1>Create Ticket</h1>
            <hr>
        </header>
    </div>
	<main>
		<form action="../database/new_ticket.php" method = "post">
			<input type="hidden" name="csrf" value="<?=$_SESSION['csrf']; ?>">
			
			<label for="subject">Subject:</label>
			<input type="text" id="subject" name="subject" required>

			<label for="department">Department:</label>
			<select id="department" name="department">
				<option value="0">---</option>
				<?php include '../database/fetchDepartments.php'; ?>
			</select>

			<label for="priority">Priority:</label>
			<select id="priority" name="priority">
				<option value="none">---</option>
				<option value="Low">Low</option>
				<option value="Medium">Medium</option>
				<option value="High">High</option>
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