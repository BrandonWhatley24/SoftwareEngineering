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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   
</head>
    <title>orders</title>
</head>
<body>

    <header>
   
        
    
            
        <nav class="navbar" data-bs-theme="dark">
                
                <h2 style="color: white; font-family: anton;"><a id="logoLink" href="./homepage.php">TB Borders</a></h2>
                
                <!--seach bar for orders. This will rederict to An order details page -->
                <form class="form-inline my-2 my-lg-0" style="margin-left: 5%;" action="./orderDetail.php" method="GET">
                    <div class="container ">
                        <div class="row">
                                <div class="col-9">
                                    <input name="searchID" id="searchBar" class="form-control mr-sm-2" required type="text" placeholder="Search by ID" aria-label="Search">
                                </div>
                                <div class="col">
                                    <button type="submit" id="searchBtn" class="btn btn-primary">
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

    
        <div class="container-lg">
            <table class="table table-hover">
           
                <thead>
                  
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                           
                        </tr>
                </thead>
                
                    <?php
                    // display all orders for the current customer.
                      require("../php/edu/uafs/Control/OrdersDAO.php");
                      $ord = new OrdersDAO();
                      $res =  $ord->getAllItemFromDatabase(); 
                    $i = 0;
                       while($i < sizeof($res)){
                    ?>
                    <tbody>
                        <td><?php echo $res[$i]->getOrderID()?></td>
                        <td><?php echo $res[$i]->getDate()?></td>
                        <td><?php echo $res[$i]->getStatus()?></td>
                        <td>$<?php echo $res[$i]->getAmount()?></td>
                        
                    </tbody>
                    <?php
                        $i++; 
                        }
                    ?>
               
            </table>

            </div>
            

    </main>

   
    <footer class="footer">
        <div class="footcontainer">
            <div class="footer">Limitless Borders Inc.&copy;2023 &ensp; Powered by our AI Overlords.</div>

        </div>

    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>