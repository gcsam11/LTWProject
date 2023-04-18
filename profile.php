<?php 
    include_once('database/checkSession.php');

    if((isset($_SESSION['username']) && !empty($_SESSION['username'])) || (isset($_SESSION['name']) && !empty($_SESSION['name'])) || (isset($_SESSION['email']) && !empty($_SESSION['email']))){
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
    }

    else{
        $username = 'Username';
        $name = 'Name';
        $email = 'Email';
    }
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
            
            <form name="change" method="post">

                <div class="labels">
                    <label for="name">Name:</label>
                    <input type="text" placeholder="<?php echo $name ?>" name="name" required><br><br>

                    <label for="username">Username:</label>
                    <input type="text" placeholder="<?php echo $username ?>" name="username" required><br><br>

                    <label for="email">Email:</label>
                    <input type="text" placeholder="<?php echo $email ?>" name="email" required><br><br>

                    <label for="psw">Password:</label>
                    <input type="password" placeholder="Password" name="psw" required><br><br>

                    <label for="gender">Choose gender:</label>

                    <select name="gender" id="gender">
                        <option value="none">None</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
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
    </body>
</html>