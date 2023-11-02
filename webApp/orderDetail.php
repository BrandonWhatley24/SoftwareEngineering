<?php 
    session_start(); 
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
   
        <?php
          
         $OrderID = $_GET["searchID"];
       
         
       
         require("../php/edu/uafs/Control/OrdersDAO.php"); 
         

         $ord = new OrdersDAO();
        
         $currentOrder = $ord->getOrderByID($OrderID);
        
         $found = false; 
        if ($currentOrder == null) {
            $found = false;
        }else{
            $found = true;
              
        }
        
        ?>
   
            
        <nav class="navbar" data-bs-theme="dark">
                
                <h2 style="color: white; font-family: Times New Roman;"><a id="logoLink" href="/">TB Borders</a></h2>
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
                        <a class="nav-link" href="#">
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
            <?php
            
                     $res = null; 
                    if ($found) {
                        
                           $customOrderDetailDAO = null;
                           $customOrderDetail = null;
                            
                           $orderDetailDAO = null;
                           $orderDetail = null; 
                           
                           if(strtolower($currentOrder->getIsCustomOrder()) == "yes"){
                            
                               require("../php/edu/uafs/Control/CustomOrderDetailsDAO.php");
                              
                               $customOrderDetailDAO = new CustomOrderDetailsDAO();
                               
                               $customOrderDetail = $customOrderDetailDAO->getAllOrderDetailsByOrderId($OrderID);
                              
                               $res = $customOrderDetail;
                                
                           }else{
                            
                               require("../php/edu/uafs/Control/NonCustomOrderDetailsDAO.php");
                               
                               $orderDetailDAO = new NonCustomOrderDetailsDAO();
                               $orderDetail = $orderDetailDAO->getNonCustomOrdersBasedOnOrderID($OrderID);
                                $res = $orderDetail;
                               
                           }
                            ?>
                <thead>
                  
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ItemID:</th>
                            <th scope="col">Order Description:</th>
                            <th scope="col">orderID:</th>
                           
                        </tr>
                </thead>
                
                 
                           <?php       
                    $i = 0;
                     
                       while($i < sizeof($res)){
                        
                    ?>
                    <tbody>
                    <?php
                    if(strtolower($currentOrder->getIsCustomOrder()) == "yes"){
                        
                        ?>
                        <td><?php echo $res[$i]->getCustOrderDetailID()?></td>
                    <?php }else{?>
                        <td><?php echo $res[$i]->getOrderDetailID()?></td>
                        <?php } ?>
                        <td><?php echo $res[$i]->getItemID()?></td>
                        <td><?php echo $res[$i]->getOrderDescription()?></td>
                        <td><?php echo $res[$i]->getOrderID()?></td>
                        
                    </tbody>
                    <?php
                        $i++; 
                        }
                    }else{
                        ?>
                           <title>Bootstrap 5 404 Error Page</title>
                           <div class="d-flex align-items-center justify-content-center vh-100">
                            <div class="text-center">
                                <h1 class="display-1 fw-bold">No Result!</h1>
                                <p class="fs-3"> <span class="text-danger">Opps!</span> Order not found.</p>
                                <p class="lead">
                                    The order you’re looking for doesn’t exist.
                                </p>
                                <a href="orders.php" class="btn btn-primary">Go back</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
               
            </table>

            </div>

          
    </main>

   
<!-- Footer -->
<footer class="bg-dark text-center text-white " >
                <!-- Grid container -->
                <div class="container p-1" >
                    <!-- Section: Social media -->
                    <section class="mb-1" >

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="bi bi-twitter"></i>
                    </a>

                    <!-- facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="bi bi-facebook"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="bi bi-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="bi bi-linkedin"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="bi bi-github"></i></a>
                    </section>

                <!-- Copyright -->
                <div class="text-center " style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2020 Copyright:
                    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
                <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>