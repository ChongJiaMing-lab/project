<?php
include("database_connect.php");

// Check if the form is submitted
if (isset($_POST['savebtn'])) {
    error_log("Form submitted");

    $pname = mysqli_real_escape_string($connect, $_POST['prod_name']);
    $psize = mysqli_real_escape_string($connect, $_POST['prod_size']);
    $pcategory = mysqli_real_escape_string($connect, $_POST['prod_category']);
    $pcolor = mysqli_real_escape_string($connect, $_POST['prod_color']);
    $pprice = mysqli_real_escape_string($connect, $_POST['prod_price']);
    $pstock = mysqli_real_escape_string($connect, $_POST['prod_stock']);

    if($_FILES["image"]["error"]=== 4)
    {
        echo"<script>alert('Image does not exit');</script>";
    }
    else
    {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg' , 'jpeg' , 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if(!in_array($imageExtension,$validImageExtension))
        {
            echo"<script>alert('Image does Extension');</script>";
        }
        else if($fileSize >1000000)
        {
            echo"<script>alert('Image Size Is too Large ');</script>";
        }
        else
        {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'img/'. $newImageName);
            $result = mysqli_query($connect, "INSERT INTO product 
                                      (product_name, product_price, product_stock, product_img, size, color, category) 
                                      VALUES ('$pname', '$pprice', '$pstock', '$newImageName', '$psize', '$pcolor', '$pcategory')");
            mysqli_query($connect,$query);
            if (!$result) 
            {
                die('Error: ' . mysqli_error($connect));
            } else 
            {
                echo "Record saved successfully";
        
                // Redirect to prevent form resubmission on page refresh
                header("Location: product.php");
                exit();
            }
    }
            
            
        }
       

    

   
}
?>
<!DOCTYPE html>
<html lang="en">
<style>


#container {
  width: 100%;
  height: 100%;
  padding: 10px;
}

#edit {
  padding: 5px;
  outline: none;
}

button {
  width: 300px;
  padding: 20px;
  margin: 0 3px;
  background-color: gray;
  outline: none;
  border: 1px solid black;
  box-shadow: 2px 2px 2px #3f3f3f;

}



#edit-button
{
 font-weight: bolder;
 font-size:large;
 font-family: Arial, Helvetica, sans-serif;
}

.deletebtn
{
font-weight: bolder;
 font-size:large;
 font-family: Arial, Helvetica, sans-serif;
}
button:hover {
  box-shadow: 2px 2px 3px ;
}

button:active {
  box-shadow: 1px 1px 3px ;
}

table 
{
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  
}

th, td {
  text-align: center;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

br{

    padding-top: 20px;
    padding-bottom: 20px;
}

.sidebar{
            margin: 0;
            padding: 0;
            width: 10%;
            background-color: #f1f1f1;
            float:left;
            position: fixed;
            height: 1000px;
            overflow: auto;
            text-align: center;
        }

        .welcome{
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            border:none;
        }

        .sidebar a{
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
        background-color: red;
        color: white;
        }

        .sidebar a:hover:not(.active){
        background-color: #555;
        color: white;
        } 
        div.content {
        margin-left: 10%;
        padding: 1px 16px;
        height: 1000px;
        }
body
{
    background-image:url(cool-background.png);
}

p
{
    font-weight: bolder;
 font-size:large;
 font-family: Arial, Helvetica, sans-serif;
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
  background-color: skyblue;
}

</style>

<body>

    <div class="sidebar">
        <?php include 'admin_sidebar.php' ?>
     </div>
     <div class="content">
        <div class="header">
            <img src="image logo.jpg" class="LOGO" width=200px height="40px">
        </div>
        <hr>
    

    

    <h2 style="font-weight: bolder; font-style: italic;">Manage product</h2>
<table border="1px" width="800px">

    <tr style="background-color: gray;">
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Stock</th>
        <th>Product img</th>
        <th>Product Size</th>
        <th>Product color</th>
        <th>Product catogory</th>
             
    </tr>

    
			<?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "SELECT * FROM product;");	
			$count = mysqli_num_rows($result);//used to count number of rows
			
			while($row = mysqli_fetch_assoc($result))
			{
			
			?>			

                <tr>
                    <td><?php echo $row["product_id"] ?></td>
                    <td><?php echo $row["product_name"] ?></td>
                    <td><?php echo $row["product_price"] ?></td>
                    <td><?php echo $row["product_stock"] ?></td>
                    <td><img src="img/<?php echo $row['product_img'];?>" width="200"></td>
                    <td><?php echo $row["size"] ?></td>
                    <td><?php echo $row["color"] ?></td>
                    <td><?php echo $row["category"] ?></td>
                    
                    <td><a href="product(edit).php?id=<?php echo $row['product_id']; ?>" id="edit-button"><img src="edit icon.png" style="width:40px;height :40px"alt=""></a></td>
                    <td><a href="product(delete).php?id=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="deletebtn"><img src="delete icon.png" style="width:40px;height :40px"alt=""></a>
                    </td>
                </tr>
			<?php
			
			}
			
			?>

</table>



<form name="addnewfrm" method="post" action="" enctype="multipart/form-data">

        <h1>Add New Product Detail</h1>

        
        <p>Name: <input type="text" name="prod_name"></p>
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
        <p>Price: <input type="text" name="prod_price"></p>
        <p>Stock: <input type="text" name="prod_stock"></p>
        <p>Image: <input type="file" name="image" id="image" accept=".jpg , .jpeg , .png"></p>
        
        <p><input type="submit" name="savebtn" value="Save Product" style:></p>
        
    </form>
    
</form>
</div>
</body>
</html>





