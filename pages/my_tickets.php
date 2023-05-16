<?php 
    include '../database/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Honour&display=swap" rel="stylesheet">
	<title>My Tickets</title>
	<link rel="stylesheet" href="../css/my_tickets.css">
</head>
<body>
    <header>
		<nav>
			<a href="../pages/my_tickets.php">My Tickets</a>
			<a href="../pages/all_tickets.php">All Tickets</a>
			<a href="../pages/profile_viewer.php"><?php echo $profile ?></a>
			<div class="animation start-my_tickets"></div>
		</nav>
    </header>
	<main>
	<form action="../database/filter.php" method="post">
		<section id="grid">
			<div class="box">
				<div class="box_content">
				<input type="hidden" name="csrf" value="<?=$_SESSION['csrf']; ?>">
				<input type="hidden" name="site" value="my_tickets">

					<label for="department-filter">Department:</label>
			    	<select id="department" name="department">
						<option value="none">---</option>

						<?php include '../database/fetchDepartments.php'; ?>
						
			    	</select>

			    	<label for="date-filter">Date:</label>
			    	<select id="date-filter" name="date">
						<option value="none">---</option>	
						<option value="newest">Newest</option>
						<option value="oldest">Oldest</option>
					</select>	

			    	<label for="agent-filter">Assigned Agent:</label>
			    	<select id="agent-filter" name="agent">
				    	<option value="none">---</option>

						<?php 
						$isTicket = false;
						include '../database/fetchAgents.php'; 
						?>

			    	</select>

			    	<label for="status-filter">Status:</label>
			    	<select id="status-filter" name="status">
                    	<option value="none">---</option>
				    	<option value="Assigned">Assigned</option>
				    	<option value="Open">Open</option>
				    	<option value="Closed">Closed</option>
			    	</select>

			    	<label for="priority-filter">Priority:</label>
			    	<select id="priority-filter" name="priority">
				    	<option value="none">---</option>
                    	<option value="Low">Low</option>
				    	<option value="Medium">Medium</option>
				    	<option value="High">High</option>
			    	</select>

					<label for="hashtag-filter">Hashtag:</label>
					<textarea autocomplete="on" class="hashtag-filter-textarea" name="hashtag" placeholder=""></textarea>

                	<div class="clearfix">
				    	<button type="submit" class="filterbtn">Filter</button>
			    	</div>
				</div>
			</div>
	</form>

			<div class="box2">
				<section class="right_box_content">
						<div id="tickets">
							
						<?php
						if($_SESSION['filter']){
							$site = 'my_tickets';
							include '../database/get_filter_content.php';
							$_SESSION['filter'] = false;
						}
						else{
							include '../database/get_my_tickets.php';
						}
						?>

						</div>
						<div class="right_box_btn">
							<input type="button" id="addbtn" value="+"/>
							<script src="../javascript/my_tickets.js"></script>
						</div>
						<footer>Still have doubts? Check our <a href="../pages/faq.php">FAQ's</a>!</footer>
				</section>
			</div>
		</section>
	</main>
</body>
</html>
