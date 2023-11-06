
<?php

    if($_POST["username"] =="jDoe" && $_POST["password"]=="password1"){
        
        session_start();
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["custID"] = 3;

        header("Location: ./homepage.php"); 
    }else{
        header("Location: ./index.php"); 
    }
?>

