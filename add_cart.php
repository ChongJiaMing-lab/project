<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cart</title>
</head>

<style>

.product{
    display:grid;
    border: 1px black solid;
    width:70%;
    margin: 0 auto;
    text-align:center;
}

input[type="number"]{
    width:40px;
    margin: 0 auto;
}

</style>

<body>
    
    <?php include "database_connect.php" ?>

    <form name="addfrm" action="" method="post">
        <?php
		if(isset($_GET["pid"]))
            {
                $spid = $_GET["pid"];
                $result = mysqli_query($connect,"SELECT * FROM product WHERE product_id = $spid");
                $row = mysqli_fetch_assoc($result);
            }
        ?>

        <div class="product">
            <?php echo $row['product_img'] ?>;
            <br>Product Name: <?php echo $row['product_name'] ?>;
            <br>Product size: <?php echo $row['size'] ?>
            <br>Product color: <?php echo $row['color'] ?>
            <br>Product price: <?php echo $row['product_price'] ?>
            <br>Product stock: <?php echo $row['product_stock'] ?>

            <br><br>Please Select Quantity:<input type=number name='qty' placeholder=1>


        <button name='addbtn'>Add To Cart</button>
        </div>
    </form>
        <?php
        if(isset($_POST['addbtn']))
        {

 //           session_start();  
  //          $susername = $_SESSION['username'];
            $susername = 'jacky';
            $qty = $_POST['qty'];
            $stock = $row['product_stock'];
            if($qty>0 && $qty<$stock)
            {

                mysqli_query($connect,"INSERT INTO shopping_cart(username,prod_id,colour,size,amount) VALUES ('$susername', $spid, '$row[color]', '$row[size]', $qty)");
                header("location:product_list.php");
            }
            
            else{
                echo "<script>alert('Quantity cannot be less that 0 and more that stock')</script>";
            }

        }
        ?>

</body>
</html>