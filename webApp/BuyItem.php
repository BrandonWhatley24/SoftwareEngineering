<!------------------------------------------
Team:       SE Team 2
Homework:   SE Project 3
Due Date:   November 3rd, 2023
Class:      CS 4003 - Software Engineering
------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="HomeFrontFunctions.js"></script>
    <link rel="stylesheet" href="./css/HomeFrontStyle.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Buy Item Page</title>
</head>
<body>
    <Header>
      
        <div class="header">
            <nav class="navbar navbar-expand-lg">
              &nbsp;&nbsp;
            <div class="container-fluid header">
              <img src="images/iconhc.png" class="img-fluid logo" alt="Responsive image">
                <h3 class="navbar-brand titleFont" style="color: white;">Timeless Borders</h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!--class navbar-nav formats the Home -->
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <div class="font">
                      <a class="nav-link" href="HomeFront.php" style="color: white;">Home<span class="sr-only">(current)</span></a>
                    </div>
                    </li>
                  <!-- Commented out About us, Services, & searchbar from the navbar
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">About Us</a>
                  </li>
                  Form tag for the search bar
                  <form action="scripts/file.php" method="POST">
                    <div class="searchBar">
                      <input type="text" name="searchBar" id="searchBar" placeholder="Search.." width=20>
                    </div>
                  </form>
                  End of form tag for search bar
                  -->
                </ul>
              </div>
              <!--Form tag for the Profile bar-->
              <form action="scripts/file.php" method="POST">
              <div>
                <div class="collapse navbar-collapse headerFont" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <img src="images/profileIcon.jpg" width="50" height="40">
                    <li class="nav-item h">
                        <div class="dropdown">
                            <button class="dropbtn">Profile</button>
                            <div class="dropdown-content">
                              <a href="./orders.php">Order History</a>
                              <a href="./login.html">Logout</a>
                            </div>
                          </div>
                    </li>
                    <img src="images/cart.jpg" width="50" height="40" href="#">
                    <li class="nav-item h">
                      <a class="nav-link headerFont" href="checkout.html" style="color:white;">Checkout</a>
                    </li>
                    <li class="nav-item h">
                      <a class="nav-link headerFont" href="login.html" style="color:white;">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
            </form>
            </div>
              </nav>
              <div class="subHeader">
                <div class="row">
                  <div class="col-md-2">
                    <h4 style="color:white;">Customer Address</h4>
                  </div>
                  <!-- Commented out the categories of frame types 
                  <div class="col-md-1" style="margin-left: 40%;">
                    <a class="nav-link headerFont" href="category1.html" style="color: white; font-size: 20;">Standard Frames</a>
                  </div>
                  <div class="col-md-1">
                    <a class="nav-link headerFont" href="category2.html" style="color: white; font-size: 20;">Gallery Frames</a>
                  </div>
                  <div class="col-md-1">
                    <a class="nav-link headerFont" href="category3.html" style="color: white; font-size: 20;">Decorative Frames</a>
                  </div>
                  <div class="col-md-1">
                    <a class="nav-link headerFont" href="category4.html" style="color: white; font-size: 20;">Floating Frames</a>
                  </div>
                  -->
                </div>
              </div>
          </div>
    </Header>
    <body onload="getBuyPageHTML(); calculateTotal()">
        <!--Start of form action-->
        <!--<form action="scripts/file.php" method="POST">-->
        
          <div id="itemInformation"></div>
        <!-- </form> -->
    </body>
    <footer>
        <div class="footer">
            <div class="footcontainer">
                <div class="footer" style="margin-top:10px;">Limitless Borders Inc.&copy;2023 &ensp; Powered by our AI Overlords.</div>
            </div>
        </div>    
    </footer>
</body>
</html>