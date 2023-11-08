<?php
   
    $username=$_POST["username"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $fname = $_POST["Fname"];
    $lname = $_POST["Lname"];
    
    require("../php/edu/uafs/Control/customer.php");
    
     
    $customerDAO = new CustomerDAO();
    
    if($customerDAO->isNewCustomer($email,$username)){
        $customerDAO->addCustomer($fname,$lname,$username,$password,$email);
        echo "hes a new customer";
    }
    header("Location: ./index.php"); 

?>
