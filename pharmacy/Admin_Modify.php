
<?php include ("include/db.php"); ?>

<html>
<head>
<title> Lucid website </title>
<meta charset="utf-8">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" type="text/css" href="modfiy.css">

<link rel="stylesheet" type="text/css" href="cart.css">



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


</head>

<!-- header section-->

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

<body>



<div>

<section class="display-product-table">
<div class="search-container">
  <form method = "post">
    <input type="text" name = "search" placeholder="Search By ID" class="search-input">
    <button type="submit" class="search-button">Search</button>
  </form>
</div>
<a>products List</a>
<table> 
		<thead>
			<th>Product Image</th>
			<th>Product Name</th>
			<th>Product Description</th>
			<th>Product Price</th>
			<th  style="width: 10%;">Stock</th>
			<th>action</th>
		</thead>

		<?php

	if(isset($_POST["Delete"]))
	{
		$delete_id = mysqli_real_escape_string($conn, $_POST["Delete"]);
		$sql = "DELETE FROM Product WHERE Product_id = '$delete_id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo '<script language="javascript">';
			echo 'alert("Items successfully deleted!");';
			echo '</script>';
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Error. No item found with the provided ID!");';
			echo '</script>';
		}
	}
	if(isset($_POST["search"]) && !empty($_POST["search"]))
	{
		$search_id = $_POST["search"];
		$sql = "SELECT * FROM Product WHERE Product_id = '$search_id'";
	}
	else
	{
	$sql = "SELECT * FROM Product";
	}
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["Product_id"];
			$image = $row['Picture'];
			$title = $row['Product_name'];
			$price  = $row['price'];
			$description = $row['Description'];
			$stock = $row['Stock'];
		?>
		<tr>
			<td><img src="<?php echo $image; ?>"></td>
			<td><?php echo $title ?></td>
			<td><?php echo $description?></td>
			<td><?php echo $price?>$</td>
			<td><?php echo $stock?></td>
			<td>
		<form method = "post">
			<input type = "hidden" name = "Delete" value = <?php echo $id?> >
			<button class = "button" type = "submit"  onclick= "return confirm('are you sure you want to delete the selected item?');">Delete</button><br><br><br>
		</form>
			
			<button class="button" onclick = "window.location.href='Form_Page.php?id=<?php echo $id?>';">Update</button>
			
			</td>
		</tr>
		<?php }
	} ?>
</table>
</section>
</div>

<section>
<div style="position: absolute; bottom: 0px;"></div>
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