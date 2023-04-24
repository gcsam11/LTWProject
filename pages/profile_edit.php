<?php 
    include_once('../database/checkSession.php');
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Profile: Edit</title>
        <link href="../css/profile_edit.css" rel="stylesheet">
    </head>
    <body>
        <h1>Only the non-empty fields will be saved</h1>
            <div class="box">
                <form name="change" action=<?php echo '../database/profile_changer.php?id='. $_SESSION['user_id']; ?> method="post">
                
                    <div class="labels">
                        <label for="name">Name:</label>
                        <input type="text" placeholder="<?php echo $_SESSION['name'] ?>" name="name"><br><br>

                        <label for="username">Username:</label>
                        <input type="text" placeholder="<?php echo $_SESSION['username'] ?>" name="username"><br><br>

                        <label for="email">Email:</label>
                        <input type="email" placeholder="<?php echo $_SESSION['email'] ?>" name="email"><br><br>

                        <label for="psw">Password:</label>
                        <input type="password" placeholder="Password" name="psw"><br><br>

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

                <div class="buttons">
                    <a href="profile_viewer.php" class="cancelbtn">Cancel</a>
                </div>
            </div>
    </body>
</html>