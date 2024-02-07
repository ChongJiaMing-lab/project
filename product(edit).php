<?php
include("database_connect.php");

if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($connect, $_GET['id']);
    $result = mysqli_query($connect, "SELECT * FROM product WHERE product_id = '$product_id'");
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Product ID not provided.";
    exit();
}

if (isset($_POST['updatebtn'])) {
    $pname = mysqli_real_escape_string($connect, $_POST['prod_name']);
    $psize = mysqli_real_escape_string($connect, $_POST['prod_size']);
    $pcategory = mysqli_real_escape_string($connect, $_POST['prod_category']);
    $pcolor = mysqli_real_escape_string($connect, $_POST['prod_color']);
    $pprice = mysqli_real_escape_string($connect, $_POST['prod_price']);
    $pstock = mysqli_real_escape_string($connect, $_POST['prod_stock']);

    $result = mysqli_query($connect, "UPDATE product 
                                      SET product_name = '$pname', 
                                          size = '$psize', 
                                          category = '$pcategory', 
                                          color = '$pcolor', 
                                          product_price = '$pprice', 
                                          product_stock = '$pstock'
                                      WHERE product_id = '$product_id'");

    if (!$result) {
        die('Error: ' . mysqli_error($connect));
    } else {
        echo "Record updated successfully";
        // Redirect to the product list page
        header("Location: product.php");
        exit();
    }
}
?>
<style>
    
    body
    {
        background-image: url("cool-background.png");
        text-align:Center;
        font-weight:bolder;
    }
    h2
    {
        font-weight:bolder;
    }
   
input[type="submit"] {
  padding: 10px 20px; 
  font-size: 16px;
  background-color: orange; 
  color: black;
  border: none; 
  border-radius: 5px;
  cursor: pointer;
  
}


input[type="submit"]:hover {
  background-color: blue;
}

form {
  max-width: 600px;
  margin: 20px auto;
  background-color: skyblue;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form p {
  margin-bottom: 15px;
}

input[type="text"],
select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 15px;
  box-sizing: border-box;
}

select {
  height: 40px;
}

    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form name="editfrm" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
        <p>Name: <input type="text" name="prod_name" value="<?php echo $row['product_name']; ?>"></p>
        <p>Clothing Size: 
        <select name="prod_size">
        <?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "SELECT * FROM size;");	
			$count = mysqli_num_rows($result);//used to count number of rows
			
			while($row = mysqli_fetch_assoc($result))
			{
			
			?>			
                
            <option value="<?php echo $row["size"]; ?>"><?php echo $row["size"]; ?></option>
                
			<?php
			
			}
			
			?>
            </select>
            
        </p>
        <p>Clothing Category: 
        <select name="prod_category">
        <?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "SELECT * FROM category;");	
			$count = mysqli_num_rows($result);//used to count number of rows
			
			while($row = mysqli_fetch_assoc($result))
			{
			
			?>			

            <option value="<?php echo $row["category"]; ?>"><?php echo $row["category"]; ?></option>
			
			<?php
			
			}
			
			?>
            </select>
        </p>

        <p>Clothing Color: 
        <select name="prod_color">
        <?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "SELECT * FROM color;");	
			$count = mysqli_num_rows($result);//used to count number of rows
			
			while($row = mysqli_fetch_assoc($result))
			{
			
			?>			
         
            <option value="<?php echo $row["color"]; ?>"><?php echo $row["color"]; ?></option>
                
			<?php
			
			}
			
			?>
            </select>
        </p>
        <p>Price: <input type="text" name="prod_price" value="<?php echo $row['product_price']; ?>"></p>
        <p>Stock: <input type="text" name="prod_stock" value="<?php echo $row['product_stock']; ?>"></p>
        <p><input type="submit" name="updatebtn" value="Update Product"></p>
    </form>
</body>
</html>