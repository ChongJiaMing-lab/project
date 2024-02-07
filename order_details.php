<?php include "database_connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h2 {
            text-align: center;
        }
        .order-details {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .order {
            border: 1px solid #dddddd;
            padding: 10px;
        }
        .order h3 {
            margin-bottom: 10px;
        }
        .order table {
            border-collapse: collapse;
            width: 100%;
        }
        .order th, .order td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        .order th {
            background-color: #f2f2f2;
        }

        span{
            color:blue;
        }
    </style>
</head>
<body>

<div class="order-details">
    <div class="order">
        <?php

        if (isset($_GET['oid'])) {

            $oid = $_GET['oid'];
            $result = mysqli_query($connect, "SELECT * FROM order_ WHERE order_id = $oid");
            $row = mysqli_fetch_assoc($result);
            $details = mysqli_query($connect, "SELECT * FROM order_details WHERE order_id = $oid");
            echo '<h3>Order ID: ' . $oid . '</h3>';
            echo '<table>';
            echo '<tr>';
            echo '<th>Product</th>';
            echo '<th>Quantity</th>';
            echo '<th>Unit Price</th>';
            echo '<th>Total Price</th>';
            echo '</tr>';
            while($row2 = mysqli_fetch_assoc($details))
            {

                $product = mysqli_query($connect, "SELECT * FROM product WHERE product_id = {$row2['product_id']}");
                $row3 = mysqli_fetch_assoc($product);
                echo '<tr>';
                echo '<td>' . $row3['product_name'] . '</td>';
                echo '<td>' . $row2['amount'] . '</td>';
                echo '<td>$' . $row3['product_price'] . '</td>';
                echo '<td>$' . $row2['price'] . '</td>';
                echo '</tr>';
                
            }
            echo '</table>';
            echo '<br>Name    : <span>'.$row['full_name'].'</span>';
            echo '<br>Phone Number    : <span>'.$row['phone_number'].'</span>';
            echo '<br>Address : <span>',$row['address'].'</span>';
            echo '<br>Postcode    : <span>'.$row['postcode'].'</span>';
            echo '<br>State    : <span>'.$row['state'].'</span>';
            echo '<br>Complete Time    : <span>'.$row['time'].'</span>';

        } else {
            echo 'Order not found.';
        }
        ?>
    </div>
</div>

</body>
</html>
