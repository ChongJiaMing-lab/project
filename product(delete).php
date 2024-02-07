<?php

include("database_connect.php");

if (isset($_REQUEST["id"])) 
{
    $product_id = $_REQUEST["id"];
    mysqli_query($connect, "DELETE FROM product WHERE product_id = $product_id");
    
    header("Location: product.php"); // Refresh the page
}

?>

<html>
<head>
    <title></title>
    <link href="design.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript">
        // create a JavaScript function named confirmation()
        function confirmation() {
            select = confirm("Do you want to delete this product?");
            return select;
        }
    </script>
</head>
<body>

<div id="wrapper">
    <div id="left">
        <?php include("product.php"); ?>
    </div>

    <div id="right">
        <h1>List of Products</h1>

        <table border="1">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Stock</th>
                <th>Product img</th>
                <th>Product Size</th>
                <th>Product color</th>
                <th>Product category</th>
            </tr>
            
            <?php
            mysqli_select_db($connect, "iwp_project");
            $result = mysqli_query($connect, "SELECT * FROM product;");    
            $count = mysqli_num_rows($result); // used to count the number of rows
            
            while ($row = mysqli_fetch_assoc($result)) {
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
                <td>
                    <a href="product(edit).php?id=<?php echo $row['product_id']; ?>" id="edit-button">Edit</a>
                    <a href="product(delete).php?id=<?php echo $row['product_id']; ?>" onclick="return confirmation();" class="deletebtn">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>

        <p> Number of records : <?php echo $count; ?></p>
    </div>
</div>

</body>
</html>
