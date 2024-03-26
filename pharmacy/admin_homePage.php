<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Admin authentication page </title>
        
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
            
            .home-content .overview-boxes{
             display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 10px;
            margin-bottom: 200px;
}
            

            
         .box{ 
         width: 1000px;
        height: 300px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(105% / 4 - 30px);
        background: #f4f4f4;
       padding: 20px 14px;
        border-radius: 12px;
       box-shadow: 0 20px 30px rgba(0,0,0,0.2);
       align-items: center;
       flex-wrap: wrap;
       justify-content: center;
        margin: 0 auto;
        
            } 
                    .logout-button {
        padding: 12px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        background-color: #907C68;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

        .logout-button:hover {
        background-color: #C9C0A5;
    }
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
        <?php
        include ("include/db.php");
        if(isset($_POST["logout"]))
        {
            unset($_SESSION["logged"]);
            header("location: admin.php");
        }

        if(isset($_SESSION["logged"]))
        {
        ?>
   
        <form method="post">
        <input type = "hidden" name = "logout" value = true>
        <button type="submit" class="logout-button">Logout</button>
        </form>
       
        
    </header>


    
        
    <section class="head"> 
        


        
    <div class="home-content">
      <div class="overview-boxes"> 
        <div class="box">
              <div class="right-side">
            <div class="box-topic">Add new Products</div>
               <a href="aproduct.php"><button class="button">Add</button></a>
            </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Modify The Products</div>
               <a href="Admin_Modify.php"><button class="button">Modify</button></a>
          </div>
        </div>
                  <div class="box">
          <div class="right-side">
            <div class="box-topic">View All Products</div>
            <a href="Shop.php"><button class="button">View</button></a>
          </div>
        </div>
      </div>
        
        </div>
    </section>
        
<footer>
        <div class="f-item-con">
            <div class="app-info">
                <div class="app-name">
                    <P>LUCID<span>.</span></p>
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
        
    <?php 
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("You do not have access to this page!")';
            echo '</script>';
        }
        ?>
    
       
   </body>
</html>