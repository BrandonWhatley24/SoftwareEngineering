

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>My Cart</h1>

<script>
  class Item {
    constructor(name, price) {
      this.name = name;
      this.price = price;
    }
  }

  let item1 = new Item("Red Frame", 23);
  let item2 = new Item("Black Frame", 33);
  let myCart = [item1, item2];

  // Convert myCart to a JSON string
  const cartJSON = JSON.stringify(myCart);
</script>

<form action="./checkout.php" method="POST">
  <!-- Add a hidden input field to store the JSON string -->
  <input type="hidden" name="cartData" id="cartDataField" value="">
  <button type="submit">Checkout</button>
</form>

<script>
  // Set the hidden input field value with the JSON string
  document.getElementById("cartDataField").value = cartJSON;
</script>

</body>
</html>