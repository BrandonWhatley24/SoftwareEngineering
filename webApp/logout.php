<?php
  
    // Prevent caching
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    
    // Start the session
    session_start();
    
    // Unset specific session data
    unset($_SESSION['userName']);
    
    // Redirect to the login page
    header("Location: ./Login.php"); 
    exit;

    
?>
