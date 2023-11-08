<?php 
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
$username = $_SESSION["username"];
$images = $_SESSION["images"]; 

if($username == null){
  
     // Unset specific session data
     unset($_SESSION['username']);
    
     // Redirect to the login page
     header("Location: ./logout.php"); 
} 
?>
<?php
 require("../php/edu/uafs/Control/itemsDAO.php");
 $itemDAO = new ItemDAO();
 $myItem = $itemDAO->getItemByID($_GET["item"]); 
 $images = $_SESSION["images"];


$cart = []; 
if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];

  
} else {
  
    $_SESSION["cart"] = $cart; 
}



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>homepage</title>

 		<!-- Google font -->
 		<link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
 		<!-- Bootstrap -->
 	

 		<!-- Slick -->
 		

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="./css/style2.css"/>
         <link type="text/css" rel="stylesheet" href="./css/Style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	
<body>

<header>
    
    <nav class="navbar" data-bs-theme="dark">
                
                <h2 style="color: white; font-family: Times New Roman;"><a id="logoLink" href="./HomeFront.php">Timeless Borders</a></h2>
                <form class="form-inline my-2 my-lg-0" style="margin-left: 5%;">
                    <div class="container ">
                        <div class="row">
                                <div class="col-9">
                                    <input id="searchBar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                </div>
                                <div class="col" >
                                        <button id="searchBtn" class="btn btn-primary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                </div>
                            
                        </div>
                    </div>
                </form>
                <ul class="nav" >
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./orders.php" style="color: white;">
                            <i class="bi bi-card-list"></i>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./checkout.php">
                            <i class="bi bi-cart-check"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">
                            <i class="bi bi-door-open"></i>
                        </a>
                    </li>
                   
                </ul>
          </nav>
         
    </header>
            <main>

                        <div class="container-fluid" style="margin-top: 5%;">
                                <div class="row">

                                    <div class="col-6">
                                                <div class="container-sm" style="padding: 5% 0% 5% 15%; ">
                                                    <img src="<?php echo $images[$myItem->getId().""]?>" width=400 height=400 alt="image">
                                                </div>
                                    </div>
                                    
                                    <div class="col-6">

                                    <h3 style=" font-family: Times New Roman;"><?php echo $myItem->getitemName()?></h3>
                                    <p style="font-family: Times New Roman;">A high-quality wood frame is a testament to both craftsmanship and timeless elegance. <br> 
                                        Crafted from carefully selected hardwoods, such as oak, walnut, or maple, these frames <br>showcase the natural beauty of the wood's grain,
                                        providing a warm and inviting aesthetic. <br>Their durability and sturdiness ensure that your cherished artwork or photographs are not only<br> 
                                         beautifully showcased but also 
                                        protected for generations to come. Whether it's the rich tones of <br>mahogany  or the subtle elegance of cherry, 
                                        a quality wood frame adds a touch of sophistication <br>and a 
                                        lasting touch of nature to any piece of art or cherished memory.</p>
                                    

                                            <div class="container " style="padding: 8% 15% 5% 0%; ">
                                                <form  action="./cart.php" method="POST">
                                            <div class="row">
                                                        <div class="form-group col-md-2">
                                                        <label for="inputZip">Length:</label>
                                                        <input type="number" class="form-control" id="inputZip" name="length" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                        <label for="inputZip">Width:</label>
                                                        <input type="number" class="form-control" id="inputZip" name="width" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                        <label for="inputZip">Qty:</label>
                                                        <input type="number" class="form-control" id="inputZip" name="qty" required>
                                                        </div>
                                                        <input type="hidden" name="itemID" value="<?php echo $myItem->getID()?>">
                                                </div>
                                                <div style="margin-top: 5%;">
                                                    <button type="submit" class="btn btn-primary mb-2">ADD TO CART</button>
                                                   
                                                </div>

                                                </form>
                                                <a href="./homepage.php">
                                                        <button class="btn btn-primary mb-2">CANCEL</button>
                                                    </a>
                                            </div>
                                        
                                    </div>

                            </div>
                        </div>
            </main>

             <footer class="footer">
                        <div class="footcontainer">
                            <div class="footer">Limitless Borders Inc.&copy;2023 &ensp; Powered by our AI Overlords.</div>

                        </div>

                </footer>
    
    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
