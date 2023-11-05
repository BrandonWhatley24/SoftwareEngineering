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
  <!--<script src="scripts/bootstrap.js"></script> -->
  <script src="./HomeFrontFunctions.js"></script>
  <link rel="stylesheet" href="./css/HomeFrontStyle.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <title>Timeless Borders Main Page</title>
</head>

<body>


  
  <Header>
    <!-- The header section is the navbar.-->
    <div class="header">
      <nav class="navbar navbar-expand-lg">
        &nbsp;&nbsp;
        <div class="container-fluid header">
          <img src="images/iconhc.png" class="img-fluid logo" alt="Responsive image">
          <h3 class="navbar-brand titleFont" style="color: white;">Timeless Borders</h3>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse headerFont" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item h">
                <a class="nav-link headerFont" href="HomeFront.php" style="color: white;">Home</a>
              </li>
            
            </ul>
          </div>
          <!--Form tag for the Profile bar-->
          <form action="scripts/file.php" method="POST">
              <div class="collapse navbar-collapse headerFont" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <img src="./images/profileIcon.jpg" width="50" height="40">
                  <li class="nav-item h">
                    <div class="dropdown">
                      <button class="dropbtn">Profile</button>
                      <div class="dropdown-content">
                        <a href="./orders.php">Order History</a>
                        <a href="./logout.php">Logout</a>
                      </div>
                    </div>
                  </li>
                  <img src="images/cart.jpg" width="50" height="40" href="#">
                  <li class="nav-item h">
                    <a class="nav-link headerFont" href="./checkout.php" style="color:white;">Checkout</a>
                  </li>
                  <li class="nav-item h">
                    <a class="nav-link headerFont" href="./login.php" style="color:white;">Logout</a>
                  </li>
                </ul>
              </div>
          </form>
        </div>
      </nav>
      <div class="subHeader">
        <div class="row">
          <div class="col-md-2">
            <h4 style="color: white;">Customer Address</h4>
          </div>
      
        </div>
      </div>
    </div>
    <!-- NAVBAR END -->

    <div>
      &nbsp;
    </div>
  </Header>

  <body onload="HomeFrontPageStartUp()">
      <div class="bodyContainer">
       
        <div class="saleContainer">
          <div class="bodyHeader">
            <!-- Will display the frame type here -->
            <div class="col-md-3" style="margin-left:40%; margin-top:-50px;">
              <h3>Frame Type</h3>
            </div>
          </div>
          <!-- Start of the dynmaic table-->
          <!--The table is populated in the pageStartup function-->
          <div id="itemsTable"></div>
        </div>
        <!--End of Sale container-->
      </div>
    <!--End of Form tag for items on sale-->
  </body>
  <!--The footer section includes the footer with info about the company and our socials etc.-->
  <footer>
    <div class="footer">
      <div class="footcontainer">
       
        <div class="footer">Limitless Borders Inc.&copy;2023 &ensp; Powered by our AI Overlords.</div>
      </div>
    </div>
  </footer>
  <!-- End of footer section-->
</body>

</html>
