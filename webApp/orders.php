
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="js/script.js"></script>
</head>
    <title>orders</title>
</head>
<body>

    <header>
   
        
    <?php
                require("/srv/www/htdocs/php/edu/uafs/Control/OrdersDAO.php");
               $ord = new OrdersDAO();
               $res =  $ord->getAllItemFromDatabase(); 
             echo $res[1]->getDate(); 
            ?>
            
        <nav class="navbar" data-bs-theme="dark">
                
                <h2 style="color: white; font-family: anton;"><a id="logoLink" href="/">TB Borders</a></h2>
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
                        <a class="nav-link active" aria-current="page" href="#" style="color: white;">
                            <i class="bi bi-card-list"></i>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-cart-check"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-door-open"></i>
                        </a>
                    </li>
                   
                </ul>
          </nav>
       
    </header>

    <main>

    <div id="output"></div>
        <div class="container-lg">
            <table class="table table-hover">
                <thead>
                    <!--
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Description</th>
                            <th scope="col"></th>
                        </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Always specify both the height <br>and width attributes for images</td>
                    <td><img src="images/wf1.jpeg" alt="pic" width="80" height="80"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Always specify both the height <br>and width attributes for images</td>
                    <td><img src="images/wf2.jpeg" alt="pic" width="80" height="80"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Always specify both the height <br>and width attributes for images</td>
                    <td><img src="images/wf2.jpeg" alt="pic" width="80" height="80"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Always specify both the height <br>and width attributes for images</td>
                    <td><img src="images/wf1.jpeg" alt="pic" width="80" height="80"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Always specify both the height <br>and width attributes for images</td>
                    <td><img src="images/wf3.jpeg" alt="pic" width="80" height="80"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Always specify both the height <br>and width attributes for images</td>
                    <td><img src="images/wf3.jpeg" alt="pic" width="80" height="80"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Always specify both the height <br>and width attributes for images</td>
                    <td><img src="images/wf1.jpeg" alt="pic" width="80" height="80"></td>
                </tr>
            
                </tbody>
            </table>
-->
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
