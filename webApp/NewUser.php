

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>New User</title>
</head>
<body>
    
    <div class="container">
        <div class="box form-box">
            <header>New User</header>

            <!--The code below is the form to allow users to create their account-->
            <form action="./registration.php" method="POST">

                <div class="field input">
                    <label for="Fname">First Name</label>
                    <input type="text" name="Fname" id="Fname" required>
                </div>

                <div class="field input">
                    <label for="Lname">Last Name</label>
                    <input type="text" name="Lname" id="Lname" required>
                </div>

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"  required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Create" required>
                </div>
                
                <div class="links">
                    Have an account? <a href="index.php">Login</a>
                </div>

    
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footcontainer">
            <div class="footer">Limitless Borders Inc.&copy;2023 &ensp; Powered by our AI Overlords.</div>

        </div>

    </footer>
    
</body>
</html>