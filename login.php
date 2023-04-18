<?php
    include_once('database/connection.php');
    
    $client_type = 'client';
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Login</title>
        <link href="login.css" rel="stylesheet">
    </head>
    <body>
        <form method = "get">
            <div class="container">
                <h1>Login</h1>
                <hr>
                <div class="box">
                    <input type="text" placeholder="Email or Username" required>
                    <input type="password" placeholder="Password" required>

                    <div class="mid_row">
                        <div id="remember_me">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <div id="forgot_psw">
                            <a href="forgot_psw.php">Forgot password?</a>
                        </div>
                    </div>

                    <div class="clearfix">
                        <button type="submit" class="loginbtn">Login</button>
                    </div>
                    <p class="account">Don't have an account? <a href="sign_up.php">Sign Up</a> </p>
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
