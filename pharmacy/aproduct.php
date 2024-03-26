<?php  include ("include/db.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Add Products </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="rahaf.css">
        <link rel="stylesheet" href="cart.css">
        

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
            
            input[type=number] {
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

    <script>
    function validateForm(event) {
        var inputs = document.getElementsByTagName("input");
        var valid = true;
        for (var i = 0; i < inputs.length; i++) 
        {
            if (inputs[i].value == "")
            {
            inputs[i].focus(); 
            valid = false;
            }
        }
        var priceField = document.getElementById("price");
        var stockField = document.getElementById("stock");
        if(parseInt(priceField.value) <= 0)
        {
            priceField.focus(); 
            valid = false; 
        }

        if(parseInt(stockField.value) < 0)
        {
            stockField.focus();  
            valid = false;
        }
        
        if(valid)
            uploadForm(event);
        }
    function uploadForm(event) {
       
        const form = document.getElementById('upload-form');
        event.preventDefault();
        const formData = new FormData(form);
        fetch("upload_form.php", {
        method: 'POST',
        body: formData
    })
        
        .then(data => {
            if(data.status === 200) {
                alert("Successfully updated!");
                location.reload();
            } else {
                alert("Error uploading the form!");
                data.text().then( text => {
                let errors = JSON.parse(text);
               alert(errors[0]);
                });
                
                
            }
        })
        .catch(error => console.error(error));

       
}

</script>
    
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
            <p> Add new product<span>.</span></p><br>
        

      
       <br>   
       <form id = "upload-form" method="post" >
        <input type ="hidden" name = "Add_Product" value = "Add">
            
        <p><label>Product name<span>.</span> 
               <input required name = "title" type = "text" size = "50" placeholder="Product name">
        </label></p><br>
                 
         <p><label>Product description<span>.</span> 
               <input required name = "description" type = "text" size = "50" placeholder="Product description">
        </label></p><br>
               
         
            <p><label>Stock<span>.</span> 
            <input id = "stock" required type="number" min = "0" pattern="[0-9]+" name="stock" size = "50" placeholder = "Stock">
        </label></p><br>
            
            
            <p><label>Product price<span>.</span> 
            <input id = "price" required type="number" min="1" name="price" pattern="[0-9]+" size = "50" placeholder = "Product Price">
        </label></p><br>
          
            
        <label for="img">Product image<span>.</span>
             <input type="file" name = "image" id = "image-input" class="box" name="image" accept="image/jpeg, image/png, image/jpg">
        </label>
            
        <br>
        <br>    
            
           <button class="button" type = "submit" onClick = validateForm(event)> Add product </button>
            
         
        </form>
        
   
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