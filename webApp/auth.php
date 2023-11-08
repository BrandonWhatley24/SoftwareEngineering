
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    require("../php/edu/uafs/Control/customer.php");
    $custDAO = new CustomerDAO();



    if($custDAO->loginAuth($username, $password)!= null){
        
        session_start();
       $_SESSION["username"] = $username;

       //map images
       $images = array();
        $images["1"] = "./images/redFrame.jpg";
        $images["2"] = "./images/blackFrame.avif";
        $images["3"] = "./images/goldFrame.jpg";
        $images["4"] = "./images/whiteFrame.avif";
        $images["5"] = "./images/pinkFrame.avif";
        $images["6"] = "./images/lightBrownFrame.avif";

        $_SESSION["images"] = $images;


        header("Location: ./homepage.php"); 
    }else{
        header("Location: ./index.php"); 
    }

    
?>

