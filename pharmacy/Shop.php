<?php include "include/db.php"; ?>
<!DOCTYPE html>

<html>

  <head>
   <title>Lucid - Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link href="LucidStyleSheet2.css" rel="stylesheet">
   <link rel="stylesheet" href="admin.css">
   <link rel="stylesheet" href="cart.css">
      <style>
          footer{
                background-color: #907C68;
                width: 100%;
                font-family:georgia;
                padding-top:40px;
    
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
            footer ul{ 
                padding-left:80px;
                color: green;
                font-size: 10;
                line-height: 1;
                margin-top: .5rm;
            }
            footer ul li{ 
                margin: .25rem 0;
                cursor: pointer;
                color: white;
                width: fit-content;
            }
            footer ul li:hover{
                color: #E6D4C4;
            }

            footer .cr-con{
                background-color:#eaeaea;

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


	<section class="items">

	<?php
	$sql = "SELECT * FROM Product";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["Product_id"];
			$image = $row['Picture'];
			$title = $row['Product_name'];
			$price  = $row['price'];
		?>
			<div class="item">
			<a href="ProductDetails.php?id=<?php echo $id?>">
			  <img src = "<?php echo $image ?>">
			</a>
			<h4><?php echo $title ?> </h4>
			<h4><?php echo $price ?> $ </h4>
			<button onclick="location.href='ProductDetails.php?id=<?php echo $id?>'"> Add to Cart</button>
		  </div>
		<?php
		}
		
	} else {
		echo "0 results";
	}
    ?>

	</section>
	
	</div>
      
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