<?php
    include_once('database/connection.php');
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Sign Up</title>
        <link href="sign_up.css" rel="stylesheet">
    </head>
    <body>
        <form method = "post">
            <div class="container">
                <h1>Sign Up</h1>
                <hr>
                <div class="box">
                    <input type="text" placeholder="Name" required>
                    <input type="text" placeholder="Username" required>
                    <input type="email" placeholder="Email" required>
                    <input type="password" placeholder="Password" required>
                    <div class="clearfix">
                        <button type="submit" class="signupbtn">Sign Up</button> <!-- Este botão vai ter que estar dentro de um form para colocar os inputs na database e depois irá mandar o user para o login -->
                    </div>
                    <p class="account">Already have an account? <a href="login.php">Login</a> </p>
                </div>
            </div>
        </form>
        <footer>
            <div class="names">
                <p>© David Cordeiro</p>
                <p>Diogo Viana</p>
                <p>Gonçalo Martins</p>
            </div>
            <p>LTW 2023</p>
        </footer>  
    </body>
</html>

