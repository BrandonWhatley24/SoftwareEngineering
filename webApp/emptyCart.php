<?php
    session_start();
   $myCart =$_SESSION["cart"];
    $myCart = array();
    $_SESSION["cart"] = $myCart;
    header("Location: ./homepage.php"); 
?>