<?php include ("include/db.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Admin log in </title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="cart.css">
        
        <!--<link rel="stylesheet" type="text/css" href="style.css">-->
        <style>
          input {
            width:50%;
	       height:50%;
            padding:5px;
            }
            
            input[type=text] {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
            }
            
            input[type=PASSWORD] {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
            }
            
            input[type=price] {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
            }
            
            input[type=file] {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
            }
            
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

    <?php
    if(isset ($_SESSION["logged"]))
    {
        header("location: admin_homePage.php");
    }
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `ADMIN` WHERE `Username` = '$username' AND `Password` = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION["logged"] = true;
            header("location: admin_homePage.php");
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Invalid username or password!")';
            echo '</script>';
        }
    }
    ?>
    
    
    
    

        
        <section class="head"> 
            <p> ADMIN LOG IN <span>.</span></p><br>
        

      
       <br>   
      <form method="post" action= "admin.php">
            
        <p><label>USERNAME<span>.</span> 
               <input name = "username" type = "text" size = "50" placeholder="Product name" required>
        </label></p><br>
            
            
        <p><label>PASSWORD<span>.</span> 
              
            <input type="password"  name = "password" size = "50" placeholder="Enter your password" required>
        </label></p><br>
            
            
      
        
            
        <br>
        <br>    
            
           <button class="button" type = "sumbit" >SUBMIT </button>
            
         
        </form>
        
   
    </section>
    
    
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