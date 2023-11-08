<?php
  session_start();

  $cart = $_SESSION["cart"]; 
  $k = $_POST["qty"];

  $i = 0;
  while($i < $k){
    $cart[] = $_POST["itemID"]; 
    $i++;
  }
  $_SESSION["cart"] = $cart; 
  header("Location: ./homepage.php");
  exit(); // Important to include this to stop further script execution
  

?>
