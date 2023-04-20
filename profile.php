<?php 
    include_once('database/checkSession.php');
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Profile</title>
        <link href="profile.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <a href="my_tickets.php">My Tickets</a>
                <a href="all_tickets.php">All Tickets</a>
                <a href="profile.php"><?php echo $profile ?></a>
                <div class="animation start-profile"></div>
            </nav>
        </header>

            <h2>This page's purpose is for profile changes only</h2>
            <div class="box">
                <form name="change" method="post">
                
                    <div class="labels">
                        <label for="name">Name:</label>
                        <input type="text" placeholder="<?php echo $_SESSION['name'] ?>" name="name" required><br><br>

                        <label for="username">Username:</label>
                        <input type="text" placeholder="<?php echo $_SESSION['username'] ?>" name="username" required><br><br>

                        <label for="email">Email:</label>
                        <input type="email" placeholder="<?php echo $_SESSION['email'] ?>" name="email" required><br><br>

                        <label for="psw">Password:</label>
                        <input type="password" placeholder="Password" name="psw" required><br><br>

                        <label for="gender">Choose gender:</label>

                        <select name="gender" id="gender">
                            <option value="None">---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select><br><br>
                    </div>
                    <div class="buttons">
                        <button type="submit" class="savebtn">Save</button>
                    </div>
                </form>

                <form name="logout" action="/logout.php" method="post">
                    <div class="buttons">
                        <button type="submit" class="logoutbtn">Logout</button>
                    </div>
                </form>
            </div>
    </body>
</html>