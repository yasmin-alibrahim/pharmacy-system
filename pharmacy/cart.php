<?php include "include/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset ="utf-9">
<title> Lucid website </title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">        
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="cart.css">

    <style>
    
        .cart{
            padding-bottom: 300px;

        
    </style>
</head>
<body>
<!-- header section-->
<header>
    
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo"> LUCID<span>.</span></a>

        <nav class="navbar">
        <a href="home.php"> Home</a>
        <a href="about.php"> About us</a>
        <a href="Shop.php"> Products</a>
        <a href="contactus.php"> Contact</a>
        </nav>


        <div class="icons">
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <a href="admin.php" class="fas fa-user"></a>
        </div>
        
    </header>


<script>
            function updateSubTotalProduct(event) {
                const quantity = document.getElementById(event.target.id).value;
                const price = document.getElementsByName(event.target.id)[0].dataset.price;
                const total = quantity * price;
                document.getElementsByName(event.target.id)[0].innerHTML = total;

                updateSubTotal();
                updateTax();
                updateTotal();
        }

        function updateSubTotal() {
                const all_prices = document.querySelectorAll('.price');
                let total = 0;
                all_prices.forEach(function(price)
                {
                    total += parseInt(price.innerHTML);
                });
              
                document.getElementById("sub_total").innerHTML = total;
        }

        function updateTax() {
                
                const sub_total = parseInt(document.getElementById("sub_total").innerHTML);
                const tax = sub_total * 0.15;
                document.getElementById("tax").innerHTML = tax.toFixed(2);
        }

        function updateTotal() {
                
                const sub_total = parseInt(document.getElementById("sub_total").innerHTML);
                const tax = parseFloat(document.getElementById("tax").innerHTML);
                document.getElementById("total_amount").innerHTML = tax + sub_total;
        }
        </script>


<section class="head cart"> 
    <p> Shopping cart<span>.</span></p>

    <!--cart-->
    <div class="small">
    <table>
    <tr>
    <th> Product</th>
    <th>Quantity</th>
    <th> Subtotal</th>
    </tr>
   
    <?php 

    if (isset($_POST['delete']))
    {
        unset($_SESSION['cart']);
       
    }

    if (isset($_POST["delete_product"]))
    {
        $id = $_POST["delete_product"];
        for($i = 0; $i < count($_SESSION['cart']); $i++) 
        {
            // check if the current item's id matches the item to be removed
            if($_SESSION['cart'][$i]['id'] == $id) 
            {
                // remove the item from the cart array
                unset($_SESSION['cart'][$i]);
                // re-index the array
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }

    if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
    {
    $cart = $_SESSION['cart'];
   
    foreach($cart as $product)
    {
    ?>
    <tr>
        <td>
            <div class="cart-info">
            <img src= "<?php echo  $product["image"] ?>">
            <div>
            <p> <?php echo $product["title"] ?></p>
            <small>Price:<?php echo $product["price"] ?>$</small>
            <br>
            <form action="" method="post" onsubmit="return true">

                <input type ="hidden" value = <?php echo $product["id"]?>  name = "delete_product">
                <button class="red-link" type = "submit">Remove</button>
            </form>
            </div>
            </div>
        </td>
        
        <td><input class = "quantity" type="number" min = 1 max = <?php echo $product["stock"] ?> value="<?php echo $product["quantity"] ?>" id = <?php echo $product["id"] ?> onChange = updateSubTotalProduct(event)></td>
        <td> <label class ="price" data-price = <?php echo $product["price"] ?> name = <?php echo $product["id"] ?>><?php echo $product["price"] * $product["quantity"] ?></label>$</td>
   </tr>
   
  
    <?php
    }
    ?>


   <div class="total">   
   <table>
   <tr>
    <hr style="border-bottom: 10px double #C9C0A5">
     <td> Subtotal</td>
	 <td><?php 
      $sub_total = 0;
     foreach($cart as $product)
     {
        $sub_total += $product["price"] * $product["quantity"];
     }
     $tax = 0.15 * $sub_total;
     ?><label id = "sub_total"><?php echo $sub_total ?></label>$</td>
	 </tr>
	 <tr>
	 
	   <td>Tax</td>
	   <td><label id = "tax"><?php echo $tax ?></label>$</td>
	   
	   </tr>
	   <tr>
	   <td>Total</td>
	   <td><label id = "total_amount"><?php echo $tax + $sub_total ?> </label>$</td>
       
	   </tr>
       
	   </table>

      </div>
     
 
    <div class="checkout">
	   
        <button class="button" id = "buy_button" type = "submit" onclick="location.href='thank.php'"> Buy </button>
        <br>
        <br>
       
   
   
   <form action="" method="post" onsubmit="return true">
   <input type="hidden" id="delete" name = "delete" value= "delete">
     <button type = "submit" class="button">Delete all</button>
   </form>
       </div>
 



<?php
    }


?>
        


<script>
    $(document).ready(function() {
  $('#buy_button').click(function() 
  {
    var quantityValues = {};
        $('.quantity').each(function() {
            quantityValues[$(this).attr('id')] = $(this).val();
        });
        $.ajax({
            type: 'POST',
            url: 'update_session.php',
            data: {quantity: quantityValues},
            success: function(response) {
               console.log("DONE");
            }
        });
  });
});

$(document).ajaxStop(function(){
    window.location.reload();
});
</script>
       


   </body>
   </html>


