<?php 
 require("../php/edu/uafs/Control/itemsDAO.php");
 $allItems = new ItemDAO();
 $allItems = $allItems->getAllItems();  


session_start();
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
    <div class="section">
			<!-- container -->
			<div class="container">
					
					<!-- STORE -->
					<div id="store" class="col-md-9" style="margin-left: 15%;">
					

						<!-- store products -->
						<div class="row">
							<!-- product -->

                            <?php
                                for ($i = 0; $i < count($allItems); $i++){
                                    $item = $allItems[$i];
                            ?>

                                <!-- /product -->

							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
									
										<img src="./images/redFrame.jpg" alt="white T"  >
									
									</div>
									<div class="product-body">
									
										<h3 class="product-name"><?php echo $item->getitemName()?></h3>
										
										<h3 class="product-name">Length :<?php echo $item->getitemLength() . "  Width: ". $item->getitemWidth()?></h3>
									
										<h4 class="product-price">Price: <?php echo $item->getitemPrice()?></h4>
									
										
									</div>
									<div class="add-to-cart">
										<form action="cart.php" method="get">
											<input type="hidden" name="item" value="<?php echo $item->getId()?>">
											
											<button  type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart" ></i> add to cart</button>
										</form>
									</div>
								</div>
							</div>
                                
                               <?php 
                                }

                            ?>
							

                            </div>
                            </div>
		

       
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
