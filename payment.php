<?php include "database_connect.php"; 
if(isset($_POST['pay']))
{
      //                  session_start();
 //                   $username = $_SESSION['username'];
$total2 = 0;
$ttotal2 = 0;
$username = 'jacky';
$currentTimestamp = time();
$currentDateTime = date("Y-m-d", $currentTimestamp);
$name = $_POST['name'];
$ph = $_POST['ph'];
$address = $_POST['address'];
$state = $_POST['state'];
$code = $_POST['code'];

    mysqli_query($connect,"INSERT INTO order_(username,full_name,phone_number,address,postcode,state,time) 
    VALUES ('$username','$name','$ph','$address',$code,'$state','$currentDateTime',)");
    $orderID = mysqli_insert_id($connect);
    echo "<script>alert('$orderID');</script>";
    $result3 = mysqli_query($connect,"SELECT * FROM shopping_cart WHERE username = '$username'");
            while($row3 = mysqli_fetch_assoc($result3))
                {
                    $result4 = mysqli_query($connect,"SELECT * FROM product WHERE product_id = $row3[prod_id]");
                    $row4 = mysqli_fetch_assoc($result4);
                    $total2 = $row4['product_price'] * $row3['amount'];
                    $ttotal2 += $total;
                    mysqli_query($connect,"INSERT INTO order_details(order_id,product_id,amount,price) 
                    VALUES($orderID,$row4[product_id],$row3[amount],$total2)");
                }
    mysqli_query($connect,"UPDATE order_ SET total = $ttotal2 WHERE order_id = $orderID");
    mysqli_query($connect,"DELETE FROM shopping_cart WHERE username = '$username'");
   header("Location:success.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Checkout</title>

    <style type="text/css">
        body {
            font-family: "comic sans ms";
            font-size: 17px;
            padding: 8px;
            background: url(../image/Background_user.png) no-repeat center fixed;
            background-size: cover;
            }
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-75 {
            flex: 75%;
        }

        .col-50 {
            flex: 50%;
        }

        .col-25 {
            flex: 25%;
        }

        .col-75,
        .col-50,
        .col-25 {
            padding: 0 16px;
        }

        .container {
            background-color: white;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
        }

        .icon-container {
            padding: 7px 0;
            font-size: 24px;
        }

        span.price {
            float: right;
            color: grey;
        }
        button{
            display:flex;
            margin-left:auto;
            font-size:15px;
        }


    </style>
</head>
<body>
    <form method='post' action="" name="billfrm">
    <h2>Checkout</h2>
    <hr>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Details</h3>

                        <br>Full Name : 
                        <br><input type="text" name="name" placeholder="Name"></br>
                        <br>Phone Number : 
                        <br><input type="text" name="ph" placeholder="xxx-xxxxxxx"></br>
                        <br>Address : 
                        <br><input type="text" name="address" placeholder="No.00, Jalan xxx, Taman xxx"></br>

                        <div class="row">
                            <div class="col-50">
                                <br>State : 
                                <br><input type="text" name="state" placeholder="Melaka"></br>
                            </div>
                            <div class="col-50">
                                <br>Postcode : 
                                <br><input type="text" name="code" placeholder="75450"></br>
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <br>Accepted Payment method
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <br>Name on card
                        <br><input type="text" id="NameCard" placeholder="ALI"></br>
                        <br>Card Number
                        <br><input type="text" id="numCard" placeholder="1111 1111 1111 1111"></br>

                        <div class="row">
                            <div class="col-50">
                                <br>Valid Thru
                                <br><input type="text" id="validThru" placeholder="12/12"></br>
                            </div>
                            <div class="col-50">
                                <br>CVV
                                <br><input type="text" id="CVV" placeholder="123"></br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-25">
            <div class="container">
                <h4>Cart
                    <span class="price" style="color:black">
                        <i class="fa fa-shopping-cart"></i>
                        <b id='item_c'>4</b>
                    </span>
                </h4>
                <?php 
                
                    $username = 'jacky';
                    $result = mysqli_query($connect,"SELECT * FROM shopping_cart WHERE username = '$username'");
                    $count = 1;
                    $ttotal = 0;

                    while($row = mysqli_fetch_assoc($result))
                    {$result2 = mysqli_query($connect,"SELECT * FROM product WHERE product_id = $row[prod_id]");
                    $row2 = mysqli_fetch_assoc($result2);
                    $amount = $row['amount'];
                    $price = $row2['product_price'];
                    $total = $price * $amount;
                    $prod_name = $row2['product_name'];
                    $ttotal += $total;

                    echo '<p>'.$count.'.'.$prod_name.'  x'.$amount.' <span class="price">RM'.$total.'</span></p>';
                    $count++;}
                    echo "<script>var i = document.getElementById('item_c').innerHTML = '".--$count."'</script>";
                ?>
                <hr>
                <p>Total <span class="price" style="color:black"><b>RM<?php echo $ttotal ?></b></span></p>
                <button name="pay">Pay Now</button>
            </div>
        </div>
    </div>
</form>
    

</body>
</html>
