<?php include "include/db.php";
?>

<html>
    
<head>

 <title> Lucid website </title>

    <link rel = "stylesheet" type = "text/css" href = "home.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
 <link rel="stylesheet" href="admin.css">
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

            
 .past-purchases {
  width: 80%;
  margin: 0 auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #dddddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #dddddd;
}

            
 
        </style>
</head> 
    
    
    
    
    <body class="home-container"> 
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
        
        
        
    <div class="home-hero">
      <span class="home-text">
        <span class="home-text1">Vision</span>
      </span>
      <h1 class="home-text2">Magnificent things are very simple</h1>
             </div>        
     <br><br> <br><br> <br><br> <br><br>
    <div class="home-banner">
      <div class="home-gallery">
        <div class="gallery-card1-gallery-card gallery-card1-root-class-name">
          <img
            alt="image"
            src="gall1.jpg"
            class="gallery-card1-image"
          />
          <h2 class="gallery-card1-text"><span>Category</span></h2>
          <span class="gallery-card1-text1"><span>Information</span></span>
        </div>
        <div class="gallery-card1-gallery-card gallery-card1-root-class-name3">
          <img
            alt="image"
            src="gall3.jpg"
            class="gallery-card1-image"
          />
          <h2 class="gallery-card1-text"><span>Category</span></h2>
          <span class="gallery-card1-text1"><span>Information</span></span>
        </div>
        <div class="gallery-card1-gallery-card gallery-card1-root-class-name4">
          <img
            alt="image"
            src="g2.jpg"
            class="gallery-card1-image"
          />
          <h2 class="gallery-card1-text"><span>Category</span></h2>
          <span class="gallery-card1-text1"><span>Information</span></span>
        </div>
      </div>
    </div>         
    <br><br> <br><br> <br><br> <br><br>
   
    <div class="past-purchases">
  <h2>Past Purchases</h2>
  <table>
    <tr>
      <th>Item Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
   
    <?php
        echo("<tr>");
        if(isset($_COOKIE["past_purchase"])) {
        $past_purchase = json_decode($_COOKIE["past_purchase"], true);
      
        foreach($past_purchase as $purchase)
       {
         
          $title = $purchase["title"];
          $quantity = $purchase["quantity"];
          $price = $purchase["price"];
       
     
          echo("<td> $title</td>");
          echo("<td> $quantity</td>");
          echo("<td> $price$</td>");
          echo("</tr>");
      }
    }
    ?>
    
  </table>
</div>

      
         
     
         
    <br><br> <br><br> <br><br> <br><br>
         
        
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

    