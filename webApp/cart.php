<?php
  session_start();

  $cart = $_SESSION["cart"]; 

  $cart[] = $_GET["item"]; 

  $_SESSION["cart"] = $cart; 
  header("Location: homepage.php");
  exit(); // Important to include this to stop further script execution
  

?>
