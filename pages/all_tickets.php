<?php 
    include_once('../database/checkSession.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>All Tickets</title>
	<link rel="stylesheet" href="../css/all_tickets.css">
</head>
<body>
    <header>
		<nav>
			<a href="my_tickets.php">My Tickets</a>
			<a href="all_tickets.php">All Tickets</a>
			<a href="profile.php"><?php echo $profile ?></a>
			<div class="animation start-all_tickets"></div>
		</nav>
    </header>
	<main>
		<section id="grid">
			<div class="box">
				<div class="box_content">
					<label for="department-filter">Department:</label>
			    	<select id="department" name="department" required>
						<option value="none">---</option>
						<?php include '../database/fetchDepartments.php' ?>
			    	</select>

			    	<label for="date-filter">Date:</label>
			    	<input type="date" id="date-filter">

			    	<label for="agent-filter">Assigned Agent:</label>
			    	<select id="agent-filter">
				    	<option value="none">---</option>
						<?php include '../database/fetchAgents.php' ?>

			    	</select>

			    	<label for="status-filter">Status:</label>
			    	<select id="status-filter">
                    	<option value="none">---</option>
				    	<option value="assigned">Assigned</option>
				    	<option value="open">Open</option>
				    	<option value="closed">Closed</option>
			    	</select>

			    	<label for="priority-filter">Priority:</label>
			    	<select id="priority-filter">
				    	<option value="none">---</option>
                    	<option value="low">Low</option>
				    	<option value="medium">Medium</option>
				    	<option value="high">High</option>
			    	</select>

			    	<label for="category-filter">Category:</label>
					<textarea id="category-filter" name="category-filter"></textarea>

                	<div class="clearfix">
				    	<button type="submit" class="filterbtn">Filter</button>
			    	</div>
				</div>
			</div>

			<div class="box2">
				<section class="right_box_content">
						<div id="tickets">
							<?php 
								include '../database/get_tickets.php';
							?>
						</div>
						<footer>Still have doubts? Check our <a href="../pages/faq.php">FAQ's</a>!</footer>
				</section>
			</div>
		</section>
	</main>
</body>
</html>
