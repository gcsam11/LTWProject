<?php
    include '../database/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>System</title>
	<link rel="stylesheet" href="../css/system.css">
</head>
    <body>
        <div class="header_div">
            <a class="backbtn" href="../pages/profile_viewer.php"> <- Back</a>
            <header>
                <h1>System</h1>
                <hr>
            </header>
        </div>
        <div class="content">
            <input type="button" id="editDep" value="Edit Departments"/>
            <script>
                document.getElementById("editDep")
                    .addEventListener('click', () => {
                        window.location.replace("../pages/editDepartment.php");
                    });
            </script>
            <input type="button" id="userlist" value="User List"/>
            <script>
                document.getElementById("userlist")
                    .addEventListener('click', () => {
                        window.location.replace("../pages/userlist.php");
                    });
            </script>
        </div>
    </body>
</html>
