<html>
<head>
<title> Lucid website </title>
<link rel="stylesheet" type="text/css" href="modfiy.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
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

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
<header>
<!--<input type="checkbox" name="" id="toggler">-->
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



</div>
<div class="edit-from-container">

<form id = "upload-form" method="post" class="display-product-table"  enctype="multipart/form-data">
<a style="padding-top: 100px;">Modify Product</a><br>

<?php 
    if(isset($_GET["id"]) && !empty($_GET["id"])) 
    {
        $update_id = mysqli_real_escape_string($conn, $_GET["id"]);
        $sql = "SELECT * FROM Product WHERE Product_id = '$update_id'";
        $result = mysqli_query($conn, $sql);
        // Fetch the row as an associative array
        $product = mysqli_fetch_assoc($result);
        $image = $product['Picture'];
        $title = $product['Product_name'];
        $price  = $product['price'];
        $stock = $product['Stock'];
        $description = $product['Description'];
?>
<script>
    function validateForm(event) {
        var inputs = document.getElementsByTagName("input");
        var valid = true;
        for (var i = 0; i < inputs.length; i++) 
        {
            if (inputs[i].value == "" && inputs[i].name != "image")
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
<img src="<?php echo $image ?>" alt="" style="margin-top: 50px; hight: 200; width: 200;">
<br>
<input type="hidden" name="id" value= <?php echo $update_id ?>>
<input type="hidden" name="image_title" value= <?php echo $image ?>>

<label style = "margin-left: -150px; padding-right: 2rem">Name</label>
<input required type="text" class="box" name="title" value="<?php echo $title ?>">
<br>
<label style = "margin-left: -150px; padding-right: 3rem">Stock</label>
<input id = "stock" required type="number" min = "0" class="box" pattern="[0-9]+" name="stock" value=<?php echo $stock ?>>
<br>
<label style = "margin-left: -150px; padding-right: 4rem">Price</label>
<input id = "price" required type="number" min="1" class="box" name="price" pattern="[0-9]+" value=<?php echo $price ?>>
<br>
<label style = "margin-left: -150px; padding-right: 60rem">Description</label>    
<input required type="text" class="box" name="description" value="<?php echo $description ?>">
 <br>   
<label style = "margin-left: -150px; padding-right: 2rem">Image</label>    
<input type="file" name = "image" id = "image-input" class="box" name="image" accept="image/jpeg, image/png, image/jpg">
    
<button class="button" type="submit" onclick="validateForm(event)">Update the Product</button>

</form>
</div>
<?php }?>

<div style="position: absolute; bottom: 0px;"></div>
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

<body>
</html>