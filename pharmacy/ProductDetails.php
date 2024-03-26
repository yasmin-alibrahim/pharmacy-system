<?php include "include/db.php"; ?>
<!DOCTYPE html>

<html>

  <head>
   <title>Product Details </title>
<link href="LucidStyleSheet3.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="cart.css">
      
<style>
          
                    .product1 {
    margin-left: 35%;
    margin-bottom:15%;
	width: 400px;
	height: 540px;
	background-color: white;
	box-shadow: 10px 10px 20px grey;
	padding: 30px;
              margin-top: 15%; }
       footer{
    background-color: #907C68;
    width: 100%;
    font-family:georgia;
	padding-top:20px;
    
}
.f-item-con{
    padding: 1.5rem;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    grid-gap: 21.5rem;
}
footer .app-name{
    color: white;
    border-left: 4px;
    padding-left: 5px;
    font-size: 5rem;
    line-height: 2.25rem;
    font-weight: 700;
}
.app-info .app-name span{
color:#C9C0A5;}
.app-name .app-initial{
    color: white;
}
 .app-info p{
    color: white;
    padding-left: 34;	
}


footer .footer-title{ 
    font-size: 30px;
    line-height: 1.75rem;
    color: white;
    border-left: 4px;
    padding-left: 6rem;
    height: fit-content;
	align-items:center;
}

footer .cr-con{
    background-color:  #eaeaea;
        
    color: #232127;
    padding: 1rem 4rem;
    text-align: center;}
	
	
	.social img{
		width:50%;
		position:left;
		margin-bottom:7%;
		
	}

 footer .navfooter a{
	 font-size: 1.5rem;
	padding: 0 1.5rem;
	color: white;
}
 footer .navfooter a:hover{
 color:darkblue;}

      </style>
   
  </head>

  <script>
function validateQuantity() {
  var quantity = document.getElementById("quantity");
 
  if (parseInt(quantity.value) < parseInt(quantity.min))
   {
    alert("Invalid quantity. Updated to right value!");
    quantity.value = quantity.min;
   }
 
  else if (parseInt(quantity.value) > parseInt(quantity.max)) 
  {
    alert("Not enough stock available. Updated to max stock available!");

    quantity.value = quantity.max;
  }
}
  </script>
 
  <body>
  
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
    <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM Product WHERE Product_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $image = $row['Picture'];
      $title = $row['Product_name'];
      $price  = $row['price'];
      $description = $row['Description'];
      $stock = $row["Stock"];
    ?>
   
    <div class="product1">
      <p class="product-title"> <?php echo $title ?></p>
      <p class="product-price"><?php echo $price ?> $</p>
      <img src="<?php echo $image ?>" class="product-image">
      <h3 class="product-price"><?php echo $description ?></h3>
      <h4 class="product-price">Stock Available:<?php echo $stock ?></h4>
      <div class="spinner">
      <form action="" method="post" onsubmit="return true">
      <input type="number" id="quantity" name = "quantity" min= 1 max=<?php echo $stock ?> value= 1>
      </div>
      <br>
      <button type = "submit" class="product-button button1 product-cart" onClick = "validateQuantity()">Add to Cart</button>
      
      </form>
      
      <button class="product-button button1" onclick= "return confirm('Items will be shipped within 48 hours. Please note that there some delays are possible!');">Help</button>
    <br>
    <br>

      <?php
    
      if(isset($_POST['quantity']) && !empty($_POST['quantity']))
      {
        $product = array("id" => $id,"title" => $title, "price" => $price, "image" => $image, "quantity" => $_POST['quantity'], "stock" => $stock);

        if(!isset($_SESSION['cart']))
        {
          $_SESSION['cart'] = array();
        }
      

        $update = false;
      
        // loop through the cart
        for($i=0; $i<count( $_SESSION['cart']); $i++)
        {
          if( $_SESSION['cart'][$i]['id'] == $id)
          {
            // update the quantity
            if (  $_SESSION['cart'][$i]['quantity'] + $_POST['quantity'] <= (int)$stock)
            {
            $_SESSION['cart'][$i]['quantity'] += $_POST['quantity'];
            echo '<script language="javascript">';
            echo 'alert("Items added to cart successfully!");';
            echo '</script>';
            }
            else
            {
              echo '<script language="javascript">';
              echo 'alert("You cannot have more than '.$stock.' quantity of this item!")';
              echo '</script>';
            }
           
            $update = true;
          }
        }
        if(!$update)
        {
        $_SESSION['cart'][] = $product;
        echo '<script language="javascript">';
        echo 'alert("Items added to cart successfully!");';
        echo '</script>';
        }
      
        
      
      }
?>
    </div>
    <?php
    } else {
      echo "0 results";
    }
  }
?>


      <footer>
        <div class="f-item-con">
            <div class="app-info">
                <div class="app-name">
                    <p>LUCID<span>.</span></p>
                </div>
				<br>
				<br>
				<p>We provides you with<strong> Well organised </strong> and <strong> SEO friendly </strong> Website Designs.</p>
                <p> locatio:Prince Nayef Bin Abdulaziz Rd, Dammam </p>
            </div>
            <div class="useful-links">
                <div class="footer-title">Useful Links</div>
				<br>
				<br>
				 
                
     <nav class="navfooter">
   <a href="home.php"> Home</a>
     <a href="about.php"> About us</a>
       <a href="Shop.php"> Products</a>
        <a href="contactus.php"> Contact</a>

     </nav>

           </div>
			<div class="social">
			<img src="social.png">
			</div>
        </div>
        <div class='cr-con'>Copyright &copy; 2022 | Made by Lucid</div>
    </footer>
	
  </body>
 
</html>