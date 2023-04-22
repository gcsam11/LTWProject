<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Sign Up</title>
        <link href="../css/sign_up.css" rel="stylesheet">
    </head>
    <body>
        <form action = '../database/signUpCheck.php' method = "post">
            <div class="container">
                <h1>Sign Up</h1>
                <hr>
                <div class="box">
                    <input type="text" placeholder="Name" name="name" required>
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Password" name="pass" required>
                    <div class="clearfix">
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                    <p class="account">Already have an account? <a href="../pages/login.php">Login</a> </p>
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

