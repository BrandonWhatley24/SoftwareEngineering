<?php
 session_start();
 header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
 header("Pragma: no-cache");
 header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
 $username = $_SESSION["username"];
 
 if($username != null){
   
      // Unset specific session data
      unset($_SESSION['username']);
     
      // Redirect to the login page
      header("Location: ./logout.php"); 
 } 
?>

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
            <form action="./auth.php" method="POST">

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"  required>
                </div>

                <div class="field">
                    <button type="submit" class="btn" name="submit">Login</button>
                </div>
                
                <div class="links">
                    Don't have an account? <a href="./NewUser.php">Create an Account</a>
                </div>

    
            </form>
        </div>
    </div>

</body>
</html>