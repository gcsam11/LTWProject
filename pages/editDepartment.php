<?php 
    include '../database/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>Edit Departments</title>
	<link rel="stylesheet" href="../css/editDepartment.css">
</head>
    <body>
        <div class="header_div">
            <a class="backbtn" href="../pages/system.php"> <- Back</a>
            <header>
                <h1>Edit Departments</h1>
                <hr>
            </header>
        </div>

        <div class="box">
            <div class="currentDeps">
                <?php include '../database/fetchDepartments.php' ?>
            </div>

            <div class="addDep">
                <form action="../database/newDepartment.php" method="post">
                    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']; ?>">

                    <input type="text" name="department" placeholder="Department Name" required>
                    <button type="submit" id="addDepbtn">Add</button>
                </form> 
            </div>

            <div class="removeDep">
                <form action="../database/removeDepartment.php" method="post">
                    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']; ?>">
                    
                    <select id="department" name="department">
                        <option value="none">---</option>
                        <?php include '../database/fetchDepartments.php' ?>
                    </select>
                    <button type="submit" id="removeDepbtn">Remove</button>
                </form> 
            </div>
        </div>
    </body>
</html>