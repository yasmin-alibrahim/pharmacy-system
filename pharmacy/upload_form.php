<?php
if(isset($_FILES['image']) && !empty($_FILES['image']))
{
  $errors= array();
  $file_name = $_FILES['image']['name'];
  $file_size =$_FILES['image']['size'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  $text_1 = explode('.',$_FILES['image']['name']);
  $text_2 = end($text_1);
  $file_ext= strtolower($text_2);
  
  $extensions= array("jpeg","jpg","png");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a JPG, JPEG or PNG file.";
  }
   
  if(empty($errors) == true || !is_uploaded_file($_FILES['image']['tmp_name']))
  {
    $title = $_POST["title"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];

   
    if(is_uploaded_file($_FILES['image']['tmp_name']))
    {
     move_uploaded_file($file_tmp,$file_name);
     $image = $file_name;
    }
    else
    {
        $image = $_POST["image_title"];
    }

    if(!isset($_POST["Add_Product"]))
    {
        $id = $_POST["id"];
       
        $sql = "UPDATE Product SET Product_name = '$title', Stock = '$stock', Price = '$price', Picture = '$image' WHERE Product_id = '$id'";	 

    }
    else
    {
      $description = $_POST["description"];
      $sql = "INSERT INTO `Product` (`Product_name`, `price`, `Stock`, `Picture`, `Description`) VALUES ('$title', '$price', '$stock', '$image',' $description')";
    }

     include("include/db.php");

     $result = mysqli_query($conn, $sql);

    if(!(mysqli_affected_rows($conn)>=0))
    {
    http_response_code(422);
    $errors[] = "Error updating the database";
    echo json_encode($errors);
    exit;
    }
    
  }
  else
  {
     http_response_code(422);
     echo json_encode($errors);
     exit;
  }
}

?>
