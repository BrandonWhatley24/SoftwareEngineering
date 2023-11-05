

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>checkout</title>
</head>
<body>
<?php
error_reporting(E_ALL); 
ini_set('display_errors', '1');
session_start();
//var_dump($_POST);
//var_dump($_SERVER);
require("../php/edu/uafs/Control/itemsDAO.php");

$cart = [];

<script>
    localStorage.setItem('cart', "<?php echo $_SESSION['cart'];?>");
</script>

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the JSON string from the hidden input field
    $cartJSON = $_POST['cartData'];
  
    // Decode the JSON string into a PHP array
    $cartArray = json_decode($cartJSON,true);
  
    if ($cartArray !== null) {
      // Now, $cartArray contains your cart data as a PHP array of objects
      // You can loop through it and process the items
      
      for($i =0; $i < count($cartArray);$i++){
        $item = new item(0,$cartArray[$i]["price"],$cartArray[$i]["name"],12,12); 
        $cart[]= $item;
      }  
    } else {
      // Handle the case where JSON couldn't be decoded
      echo "Failed to decode JSON data.";
    }
  }
  
  
    
    echo "printing out cart"; 
    for ($i = 0; $i < count($cart);$i++){
        echo $cart[$i]->getitemName();
        echo $cart[$i]->getitemPrice();
    }

?>
    <header>
    <nav class="navbar" data-bs-theme="dark">
                
                <h2 style="color: white; font-family: Times New Roman;"><a id="logoLink" href="./HomeFront.php">TB Borders</a></h2>
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

            <div class="col-8">
                        <div class="container-sm" style="padding: 5% 35% 5% 15%; ">
                        <h2 style="font-family: 'Times New Roman', Times, serif;">Payment Information</h2>
                                        
                                            <form style="padding:5%;  border-style: groove; border-color: white; border-width: thick; border-radius:3%">

                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                   
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="credit card #" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="CVC" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress2">Address 2</label>
                                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                    <label for="inputCity">City</label>
                                                    <input type="text" class="form-control" id="inputCity" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <label for="inputState">State</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <label for="inputZip">Zip</label>
                                                    <input type="text" class="form-control" id="inputZip" required>
                                                    </div>
                                                </div>
                                               
                                               
                                            </form>
                                       
                            </div>
                           

            </div>
            
            <div class="col-4">
            
                    <div class="container " style="padding: 8% 15% 5% 0%;">
                    <h2 style="font-family: 'Times New Roman', Times, serif;">Order Summary</h2>
                                <form action=""  style="padding:0% 5% 20% 5%; border-style: groove; border-color: white; border-width: thick; border-radius:3%">     
                               
                                        <table class="table " >
                                        
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col"></th>
                                                        <th scope="col">Amount</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php 
                                                $total = 0;
                                                $i = 0;
                                                //displays the checkout summary box
                                                while ($i < count($cart)) {
                                                    ?>
                                                    <tr>
                                                            <th scope="row"><?php echo $cart[$i]->getId();?></th>
                                                            <!--need to map images to our set of items-->
                                                            <td><img src="images/wf1.jpeg" alt="pic" width="40" height="40"></td>
                                                            <th scope="row"><?php echo $cart[$i]->getitemPrice()?></th>
                                                    </tr>
                                                <?php
                                                $total+= $cart[$i]->getitemPrice();
                                                $i++;
                                                } 
                                                ?>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td></td>
                                                        <th><?php echo $total?></th>                                                        </th>
                                                    </tr>
                                                    
                                                </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" style="float:right; border-radius: 30px 30px 30px 30px;">checkout</button>

                                    </form>   
                    </div>
                
            </div>
        

    </div>
           
    </main>
    
      <!-- Footer -->

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