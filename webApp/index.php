<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Login</title>
</head>
<body>
     
    <div class="container">
        <div class="box form-box">
            <header1>Timeless Borders</header1>
            <header>Login</header>

            <!--The code below is the form to allow users to log into their account-->
            <form action="" method="post">

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="********" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                
                <div class="links">
                    Don't have an account? <a href="NewUser.html">Create an Account</a>
                </div>

    
            </form>
        </div>
    </div>

</body>
</html>